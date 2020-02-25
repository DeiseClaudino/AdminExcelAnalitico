<?php

namespace App\Http\Controllers;

use App\Relatorio;
use Illuminate\Http\Request;
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

}
