@extends('layout.model')

@section('titulo')
    Pessoas
@endsection

@section('pagina_atual')
    Pessoas Cadastradas
@endsection

@section('caminho_pagina')
    <li>
        <a href="#">Pessoa</a>
    </li>
    <li class="active">
        Lista
    </li>
@endsection

@section('acao')
    <div class="btn-group pull-right m-t-15">
        <a href="{{ url('pessoa/novo') }}"
                type="button"
                class="btn btn-primary">
            <i class="md md-add"></i> Novo Cadastro
        </a>
    </div>
@endsection

@section('conteudo')
    <table id="datatable-colvid" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF/ CNPJ</th>
            <th>Localização</th>
            <th>Contato</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>

        <tbody>
        @foreach($pessoa as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ isset($p->fisica->cpf) ? $p->fisica->cpf : $p->juridica->cnpj }}</td>
            <td>{{ $p->endereco->bairro.", ".$p->endereco->cidade."/".$p->endereco->estado }}</td>
            <td>313323</td>
            <td>
                <!-- Edição -->
                <a class="btn btn-success waves-effect"
                   href="{{ route('pessoa.editar', ['id'=>$p->id]) }}">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
            <td>
                <!-- Confirmar exclusão -->
                <button
                        data-toggle="modal"
                        class="btn btn-danger waves-effect"
                        data-target=".modal{{ $p->id }}">
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Modal para excluir -->
                <div class="modal fade modal{{ $p->id }}"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="mySmallModalLabel"
                     aria-hidden="true"
                     style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                <h4 class="modal-title" id="mySmallModalLabel">Excluir</h4>
                            </div>
                            <div class="modal-body">
                                Deseja Excluir {{ $p->nome }}?
                            </div>
                            <div class="modal-footer">
                                <button
                                        type="button"
                                        class="btn btn-primary
                                        waves-effect"
                                        data-dismiss="modal">Cancelar
                                </button>
                                <a
                                        href="{{ route('pessoa.excluir', ['id'=>$p->id]) }}"
                                        type="button"
                                        class="btn btn-danger waves-effect waves-light">Sim, desejo remover!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal para excluir -->
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection