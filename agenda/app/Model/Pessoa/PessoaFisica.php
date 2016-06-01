<?php

namespace App\Model\Pessoa;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    protected $fillable = ['cpf', 'data_nascimento', 'sexo'];

}
