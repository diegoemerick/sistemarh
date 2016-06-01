<?php

namespace App\Http\Controllers\Usuario;

use App\Model\Pessoa\Pessoa;
use App\Model\Usuario\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{

    public function index()
    {
        $cadastro_pessoa = Pessoa::lists('nome', 'id');
        $usuario = Usuario::all();
        return view('usuario.lista', compact('usuario'), compact('cadastro_pessoa'));
    }

    public function criaUsuario(Request $request)
    {
        $id = $request->get('pessoa');
        $p = Pessoa::find($id);


        $nivel = $request->get('nivel');
        $login = $this->criaLogin($p->nome);
        $senha = Hash::make($this->criaLogin($p->nome).$id);

        $usuario = new Usuario();
        $usuario->pessoa_id = $id;
        $usuario->nivel = $nivel;
        $usuario->login = $login;
        $usuario->senha = $senha;
        $usuario->save();
    }

    /**
     * Recebe o nome completo da pessoa e retornar
     * somente o primeiro e o ultimo nome
     * @param $nome
     * @return string nome.sobrenome
     */
    function criaLogin($nome){
        $temp = explode(" ",$nome);

        // SE TIVER SOMENTE 1 nome retorna ele mesmo
        if(count($temp) == 1){
            return strtolower($nome);
        }else{
            $nomeSobrenome = $temp[0] . "." . $temp[count($temp)-1];
            return strtolower($nomeSobrenome);
        }
    }
}
