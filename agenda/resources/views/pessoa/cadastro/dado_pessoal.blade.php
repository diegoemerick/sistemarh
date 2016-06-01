<!-- Nome -->
<div class="form-group">
    {!! Form::label('nome', 'Nome', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::text('nome',
            isset($pessoa->nome) ? $pessoa->nome : null,
            ['class'=>'form-control', 'placeholder'=>'Informe seu nome']) !!}
    </div>
</div>

<!-- Tipo de pessoa -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo de Pessoa', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!!  Form::select('tipo',
            array('PF' => 'Pessoa Física', 'PJ' => 'Pessoa Jurídica'),
            isset($pessoa->tipo) ? $pessoa->tipo : null,
            ['class'=>'form-control' ,
            'placeholder' => 'Selecione',
            'onchange'=>'tipoPessoa(this.value)']) !!}
    </div>
</div>

<!-- Pessoa Física -->
<div id="div.pf" style="display: none">
    <!-- Cpf -->
    <div class="form-group">
        {!! Form::label('cpf', 'CPF', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('cpf',
                            isset($pessoa->fisica->cpf) ? $pessoa->fisica->cpf : null,
             ['class'=>'form-control', 'placeholder'=>'Informe o CPF', 'data-mask'=>'999.999.999-99', 'onblur'=>'verificaCpf(this.value)'])
             !!}
        </div>
    </div>

    <!-- Sexo / Data Nascimento -->
    <div class="form-group">

        {!! Form::label('sexo', 'Sexo', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <div class="radio radio-success radio-inline">
                {!! Form::radio('sexo', 'M') !!}
                {!! Form::label('sexo', 'Masculino') !!}
            </div>
            <div class="radio radio-success radio-inline">
                {!! Form::radio('sexo', 'F') !!}
                {!! Form::label('sexo', 'Feminino') !!}
            </div>
        </div>

        {!! Form::label('data_nascimento', 'Data de Nascimento', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <div class="input-group">
                {!! Form::text('data_nascimento',
                    isset($pessoa->fisica->data_nascimento) ? $pessoa->fisica->data_nascimento : null,
                    ['class'=>'form-control', 'placeholder'=>'Data de Nascimento']) !!}
                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
            </div><!-- input-group -->
        </div>

    </div>
</div>

<!-- Pessoa Jurídica -->
<div id="div.pj" style="display: none">

    <!-- Cnpj || Responsavel -->
    <div class="form-group">
        {!! Form::label('cnpj', 'CNPJ', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('cnpj',
            isset($pessoa->juridica->cnpj) ? $pessoa->juridica->cnpj : null,
            ['class'=>'form-control',
            'placeholder'=>'Informe o CNPJ',
            'data-mask'=>'99.999.999/999-99',
            'onblur'=>'verificaCnpj(this.value)']) !!}
        </div>

        {!! Form::label('responsavel', 'Responsável', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('responsavel',
            isset($pessoa->juridica->responsavel) ? $pessoa->juridica->responsavel : null,
            ['class'=>'form-control', 'placeholder'=>'Responsável pela Empresa']) !!}
        </div>
    </div>

    <!-- Razao Social -->
    <div class="form-group">
        {!! Form::label('razao_social', 'Razão Social', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::text('razao_social',
             isset($pessoa->juridica->razao_social) ? $pessoa->juridica->razao_social : null,
            ['class'=>'form-control', 'placeholder'=>'Informe a Razão Social']) !!}
        </div>
    </div>

</div>

<hr/>