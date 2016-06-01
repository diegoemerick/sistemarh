@extends('layout.model')

@section('titulo')
    Cadastros
@endsection
@section('pagina_atual')
    Usuários
@endsection

@section('caminho_pagina')
    <li>
        <a href="#">Usuário</a>
    </li>
    <li class="active">
        Novo
    </li>
@endsection

@section('acao')
    <div class="btn-group pull-right m-t-15">
        <button
                data-toggle="modal"
                data-target=".modal"
                type="button"
                class="btn btn-primary"
                onclick=""><i class="md md-save"></i>
            Novo
        </button>
        &nbsp;
    </div>

    <!-- Modal para escolher pessoa -->
    <div class="modal fade modal"
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
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel">Liberar Acesso</h4>
                </div>

                <!-- Cadastro de Usuário -->
                {!! Form::open(array('url' => 'usuario/cadastro', 'method' => 'post')) !!}
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            {!! Form::label('pessoa', 'Pessoa', array('class'=>'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                {!!  Form::select('pessoa',
                                    $cadastro_pessoa,
                                    null,
                                    ['class'=>'form-control select2' ,
                                    'placeholder' => 'Selecione',
                                    'onchange'=>''])
                                !!}
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group">
                            {!! Form::label('nivel', 'Nível de Acesso', array('class'=>'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                {!!  Form::select('nivel',
                                    array('admin'=>'Administrador', 'user'=>'Usuário'),
                                    null,
                                    ['class'=>'form-control' ,
                                    'placeholder' => 'Selecione'])
                                !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button
                            type="button"
                            class="btn btn-danger
                                        waves-effect"
                            data-dismiss="modal">Cancelar
                    </button>
                    {{ Form::button(
                        "<i class='fa fa-unlock-alt'></i> Criar Usuario",
                        array(
                        'class'=>'btn btn-primary',
                        'type'=>'submit'))
                    }}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <!-- /Modal para escolher pessoa -->
@endsection

@section('conteudo')
    <table id="datatable-keytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Usuário</th>
            <th>Login</th>
            <th>Nível de Acesso</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuario as $u)
        <tr>
            <td>{{ $u->senha }}</td>
            <td>{{ $u->login }}</td>
            <td>{{ $u->nivel }}</td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection