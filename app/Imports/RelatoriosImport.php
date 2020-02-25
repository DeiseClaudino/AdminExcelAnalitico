<?php

namespace App\Imports;

use App\Relatorio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RelatoriosImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
