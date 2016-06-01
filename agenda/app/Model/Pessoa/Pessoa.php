<?php

namespace App\Model\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    
	protected $fillable = ['id', 'nome', 'tipo', 'inf_adicional', 'logo'];

	// O2O
	public function fisica()
	{
		return $this->hasOne('App\Model\Pessoa\PessoaFisica', 'pessoa_id');
	}

	//O2O
	public function juridica()
	{
		return $this->hasOne('App\Model\Pessoa\PessoaJuridica', 'pessoa_id');
	}

	// O2O
	public function endereco()
	{
		return $this->hasOne('App\Model\Pessoa\PessoaEndereco', 'pessoa_id');
	}

	// O2M
	public function contato()
	{
		return $this->hasMany('App\Model\Pessoa\PessoaContato', 'pessoa_id');
	}

	// O2M
	public function email()
	{
		return $this->hasMany('App\Model\Pessoa\PessoaEmail', 'pessoa_id');
	}

}
