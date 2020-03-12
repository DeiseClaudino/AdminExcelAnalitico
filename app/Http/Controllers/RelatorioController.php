<?php

namespace App\Http\Controllers;

use App\Relatorio;
use Illuminate\Http\Request;
use App\Charts\RelatorioChart;
use App\Imports\RelatoriosImport;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function listRelatorio(Request $request)
    {
        $relatorios = Relatorio::when($request->has('nome'), function($query) use($request){
            $query->where('nome', 'like', "%$request->nome%");
        })
        ->when($request->has('data_cadastro'), function($query) use($request){
            $query->whereDate('data_cadastro', $request->nome);
        })
        ->orderBy('nome', 'asc')
        ->orderBy('data_cadastro', 'desc')
        ->paginate(10);

        return view('listRelatorio')->withRelatorio($relatorios);
    }


    public function uploadExcel()
    {
        return view('uploadExcel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new RelatoriosImport,request()->file('file'));
           
        return back()->with('success','Relatório importado com sucesso');
    }

    public function cadastradosChart()
    {
        $dados = Relatorio::selectRaw(
            'YEAR(data_cadastro) AS ano, 
            COUNT(DISTINCT email) AS cadastrados'
        )
        ->groupBy('ano')
        ->get();
        
        if(sizeof($dados) == 0)
        {
            return abort(503, 'Não existem dados para exibição no momento.');

        }

        foreach ($dados as $dado) 
        {
            $anos[]     = $dado->ano;
            $values[]   = $dado->cadastrados;
        }

        $colors = $this->colorCharts();

        $relatorioChart = new RelatorioChart;
        $relatorioChart->minimalist(false);
        $relatorioChart->labels($anos);
        $relatorioChart->dataset('Usuários Cadastrados por ano', 'bar', $values)
        ->color($colors['borderColors'])
        ->backgroundcolor($colors['fillColors']);

        return view('analytics')->withRelatorioChart($relatorioChart);

    }

    public function colorCharts()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        
        $json = [
            'borderColors'  =>  $borderColors,
            'fillColors'    =>  $fillColors
        ];

        return $json;
    }

}
