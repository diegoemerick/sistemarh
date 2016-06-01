<?php

namespace App\Model\Pessoa;

use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    protected $fillable = ['cnpj', 'razao_social', 'responsavel'];
}
