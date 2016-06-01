<!-- Cep -->
<div class="form-group">
        {!! Form::label('cep', 'Cep *', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('cep',
            isset($pessoa->endereco->cep) ? $pessoa->endereco->cep : null,
            ['class'=>'form-control',
            'placeholder'=>'Informe o cep',
            'data-mask'=>'99.999-999',
            'onblur'=>'consultacep(this.value)'])
        !!}
    </div>
</div>

<!-- Logradouro / Numero -->
<div class="form-group">
        {!! Form::label('logradouro', 'Rua', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('logradouro',
        isset($pessoa->endereco->logradouro) ? $pessoa->endereco->logradouro : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: Rua Abc']) !!}
    </div>

        {!! Form::label('numero', 'Nº', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::text('numero',
         isset($pessoa->endereco->numero) ? $pessoa->endereco->numero : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: 100']) !!}
    </div>
</div>

<!-- Bairro / Complemento -->
<div class="form-group">
        {!! Form::label('bairro', 'Bairro', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('bairro',
        isset($pessoa->endereco->bairro) ? $pessoa->endereco->bairro : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: Centro']) !!}
    </div>

        {!! Form::label('complemento', 'Complemento', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('complemento',
        isset($pessoa->endereco->complemento) ? $pessoa->endereco->complemento : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: Loja, Indústria, Zona Rural']) !!}
    </div>
</div>

<div class="form-group">
        {!! Form::label('estado', 'Estado', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('estado',
        isset($pessoa->endereco->estado) ? $pessoa->endereco->estado : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: MG']) !!}
    </div>

        {!! Form::label('cidade', 'Cidade', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('cidade',
        isset($pessoa->endereco->cidade) ? $pessoa->endereco->cidade : null,
        ['class'=>'form-control', 'placeholder'=>'Ex.: Belo Horizonte']) !!}
    </div>
</div>