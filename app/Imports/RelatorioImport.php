<?php

namespace App\Imports;

use App\Relatorio;
use Maatwebsite\Excel\Concerns\ToModel;


class RelatorioImport implements ToModel
{
 
    public function model(array $row)
    {
        return new Relatorio([
            'id_reg'        =>  $row[0],
            'nome'          =>  $row[1],
            'data_nasc'     =>  $row[2],
            'email'         =>  $row[3],
            'estado'        =>  $row[4],
            'cidade'        =>  $row[5],
            'endereco'      =>  $row[6],
            'data_cadastro' =>  $row[7]
        ]);
    }
}
