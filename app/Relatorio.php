<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $primaryKey = 'id_reg';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'data_nasc',
        'email',
        'estado',
        'cidade',
        'endereco',
        'data_cadastro'
    ];
}
