@extends('layout.model')

@section('titulo')
    {{ isset($pessoa->nome)  ? 'Editar' : 'Novo'}}
@endsection
@section('pagina_atual')
    {{ isset($pessoa->nome)  ? $pessoa->nome  : 'Novo Cadastro'}}
@endsection

@section('caminho_pagina')
    <li>
        <a href="#">Pessoa</a>
    </li>
    <li class="active">
        Novo
    </li>
@endsection

@section('acao')
    <div class="btn-group pull-right m-t-15">
        <button
                type="button"
                class="btn btn-primary"
                onclick="enviarFormulario()"><i class="md md-save"></i>
                {{ isset($pessoa) ? 'Atualizar' : 'Salvar' }}
        </button> &nbsp;

        <a href="{{ url('pessoa') }}" class="btn btn-white"><i class="md md-backspace"></i> Cancelar</a>
    </div>
@endsection

@section('conteudo')
    <ul class="nav nav-tabs tabs tabs-top">
        <li class="active tab">
            <a href="#dado_pessoal" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-user"></i></span>
                <span class="hidden-xs">Dados Pessoais</span>
            </a>
        </li>
        <li class="tab">
            <a href="#endereco" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-map-marker"></i></span>
                <span class="hidden-xs">Endereço</span>
            </a>
        </li>
        <li class="tab">
            <a href="#contato" data-toggle="tab" aria-expanded="true">
                <span class="visible-xs"><i class="fa fa-phone"></i></span>
                <span class="hidden-xs">Contato</span>
            </a>
        </li>
        <li class="tab">
            <a href="#inf_adicional" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="fa fa-list"></i></span>
                <span class="hidden-xs">Informação Adicional</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">

            @if (isset($pessoa))
            {!! Form::open (array('id'=>'form.pessoa',
                'class'=> 'form-horizontal',
                'method'=>'put',
                'role'=>'form',
                'url'=>'/pessoa/'.$pessoa->id.'/atualizar')) !!}
            @else
            {!! Form::open (array('id'=>'form.pessoa',
                'class'=> 'form-horizontal',
                'method'=>'post',
                'role'=>'form',
                'url'=>'/pessoa/cadastro')) !!}
            @endif

            <div class="tab-pane active" id="dado_pessoal">
               @include('pessoa.cadastro.dado_pessoal')
            </div>

            <div class="tab-pane" id="endereco">
               @include('pessoa.cadastro.endereco')
            </div>

            <div class="tab-pane" id="contato">
               @include('pessoa.cadastro.contato')
            </div>

            <div class="tab-pane" id="inf_adicional">
               @include('pessoa.cadastro.inf_adicional')
            </div>

        {!! Form::close() !!}
    </div>

@endsection