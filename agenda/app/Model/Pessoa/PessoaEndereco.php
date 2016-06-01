<?php

namespace App\Model\Pessoa;

use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'estado',
        'cidade'
    ];
}
