<!-- Telefones -->
<div class="form-group">
    {!! Form::label('telefone', 'Adicionar Telefone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-5">
        {!! Form::text('add_telefone', null,
            ['class'=>'form-control',
            'data-mask'=>'(99) 9999-9999',
            'id'=>'add_telefone'])
        !!}
    </div>

    <div class="col-sm-5">
        {!!  Form::select('selecionaOperadora',
            array(
            '' => 'Operadora',
            'Fixo' => 'Fixo',
            'Claro' => 'Claro',
            'Oi' => 'Oi',
            'Tim' => 'Tim',
            'Vivo' => 'Vivo',
            'Nextel' => 'Nextel',
            'Outro' => 'Outro'),
            null,
            ['class'=>'form-control' ,
            'id' => 'selecionaOperadora',
            'onchange'=>'addTelefone(this)'])
        !!}
    </div>
</div>

<hr/>

<!-- Tabela Telefone -->
<div class="form-group" align="center">
    {!! Form::label('tabela.telefone', 'Telefones', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        <table id="tabela.telefone" style="{{isset($pessoa->contato) ? 'display: block' : 'display: none'}}" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Operadora</th>
                <th>Telefone</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody id="tabela.conteudo"></tbody>
            @if(isset($pessoa->contato))
                @foreach($pessoa->contato as $p)
                    <tr>
                        <td>{{ $p->operadora }}</td>
                        <td>{{ $p->telefone }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</div>

{!! Form::hidden('telefone[]', null,
    ['class'=>'form-control',
    'id'=>'telefone'])
!!}

{!! Form::hidden('operadora[]', null,
    ['class'=>'form-control',
    'id'=>'operadora'])
!!}

<hr/>

<!-- Email -->
<div class="form-group">
    {!! Form::label('email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('email[]', null,
          ['class'=>'form-control',
          'placeholder'=>'Ex.: ex@servidor.com, ex2@provedor.com',
          'data-role'=>'tagsinput']) !!}
    </div>
</div>

