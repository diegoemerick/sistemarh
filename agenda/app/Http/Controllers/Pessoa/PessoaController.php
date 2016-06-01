<?php

namespace App\Http\Controllers\Pessoa;

use App\Model\Pessoa\PessoaContato;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Pessoa\Pessoa;

use Illuminate\Support\Facades\Session;

//use DB;

/**
 * Responsavel por controlar os dados referentes a pessoa
 * Class PessoaController
 * @package App\Http\Controllers\Pessoa
 */
class PessoaController extends Controller
{
	public function index()
	{
		$pessoa = Pessoa::all();
		return view('pessoa.lista', compact('pessoa'));
	}

	/**
	 * Verifica o tipo da pessoa e chama o metodo salvar
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function novaPessoa(Request $request)
	{
		$tipo = $request->get('tipo');

		if ($tipo == "PF") {
			$this->salvar($request, "fisica");
		} else if ($tipo == "PJ") {
			$this->salvar($request, "juridica");
		} else {
			return view('pessoa.cadastro');
		}

		return redirect()->back();
	}

	/**
	 * Recebe o tipo da pessoa e persiste os dados no banco
	 * @param Request $request
	 * @param $tipo
	 */
	private function salvar(Request $request, $tipo)
	{
		$tel = implode(',', $request->get('telefone'));
		$tels = explode(',', $tel);
		$op = implode(',', $request->get('operadora'));
		$operadora = explode(',', $op);

		$email = implode(',', $request->get('email'));
		$emails = explode(',', $email);

		$dados = $request->all();
		$pessoa = Pessoa::create($dados);

		$pessoa->endereco()->create($dados);
		$pessoa->$tipo()->create($dados);
		for ($i = 0; $i < count($tels); $i++) {
			$telefone = array('telefone'=>$tels[$i], 'operadora'=>$operadora[$i]);
			$pessoa->contato()->create($telefone);
		}

		for ($i = 0; $i < count($emails); $i++){
			$email = array('email'=>$emails[$i]);
			$pessoa->email()->create($email);
		}
	}

	/**
	 * Recebe o id como parâmetro e e passa uma array
	 * com todos os dados do cadastro da pessoa
	 * @param int $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function editar($id)
	{
		$pessoa = Pessoa::find($id);
		$pessoa->endereco;
		$pessoa->juridica;
		$pessoa->fisica;
		$pessoa->contato;

		return view('pessoa.cadastro', compact('pessoa'));

	}

	/**
	 * Recebe o id excluir
	 * verifica se existe no banco
	 * e apaga na model pessoa e seus relacionamentos
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function excluir($id){
		$pessoa = Pessoa::find($id);

		if ($pessoa->tipo == "PF")
		{
			$pessoa->fisica->delete();
		}
		else if ($pessoa->tipo == "PJ")
		{
			$pessoa->juridica->delete();
		}
		else {
			return redirect()->back();
		}

		$pessoa->delete();
		$pessoa->endereco->delete();
		$pessoa->contato()->delete();
		$pessoa->email()->delete();

		return redirect()->back();
	}

	/**
	 * @param Request $request
	 * @param $id
	 */
	public function atualizar(Request $request, $id){
		$pessoa = Pessoa::find($id);

		if ($request->get('tipo') == $pessoa->tipo)
		{
			if ($request->get('tipo') == "PF"){
				$pessoa->fisica->update($request->all());
			}
			else
			{
				$pessoa->juridica->update($request->all());
			}
		}
		else if ($request->get('tipo') == "PF")
		{
			$pessoa->juridica->delete();
			$pessoa->fisica()->create($request->all());
		}
		else
		{
			$pessoa->fisica->delete();
			$pessoa->juridica()->create($request->all());
		}

		$pessoa->update($request->all());
		$pessoa->endereco->update($request->all());

	}
}
