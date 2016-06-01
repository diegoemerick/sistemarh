<!-- Informações Adicionais -->
<div class="form-group">
        {!! Form::label('inf_adicional', 'Informações Adicionais', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::textarea('inf_adicional',
         isset($pessoa->inf_adicional) ? $pessoa->inf_adicional : null,
         ['class'=>'form-control', 'rows'=>'5','placeholder'=>'Ex.: Característica específicas']) !!}
    </div>
</div>