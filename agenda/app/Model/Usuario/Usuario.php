<?php

namespace App\Model\Usuario;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $fillable = ['login', 'senha', 'nivel'];
    protected $hidden = ['senha', 'remember_token'];


    public function pessoa()
    {
        return $this->hasOne('App\Model\Pessoa\Pessoa', 'id');
    }

}
