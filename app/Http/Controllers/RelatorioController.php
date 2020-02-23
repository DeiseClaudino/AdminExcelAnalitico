<?php

namespace App\Http\Controllers;

use App\Relatorio;
use Illuminate\Http\Request;

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
        ->orderBy('data_cadastro', 'desc')
        ->get();

        return view('listRelatorio')->withRelatorio($relatorios);
    }


    public function uploadExcel()
    {
        return view('uploadExcel');
    }

}
