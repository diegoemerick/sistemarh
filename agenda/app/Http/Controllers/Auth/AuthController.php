<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Model\Usuario\Usuario;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    protected $fillable = ['login', 'senha'];
    protected $hidden = ['senha', 'token'];

    public function authenticate()
    {
        if (Auth::attempt(['login' => Input::get('login'), 'senha' => Input::get('senha')])) {
            // Authentication passed...
            return redirect()->intended('layout.model');
        }
        else {
            return "deu errado cara";
        }
    }
}