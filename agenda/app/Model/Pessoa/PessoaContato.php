<?php

namespace App\Model\Pessoa;

use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    protected $fillable = ['telefone', 'operadora'];
}
