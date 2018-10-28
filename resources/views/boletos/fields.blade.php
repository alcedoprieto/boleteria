<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::number('valor', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Iva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva', 'Iva:') !!}
    {!! Form::number('iva', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']) !!}
</div>

<!-- Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inicio', 'Inicio:') !!}
    {!! Form::date('inicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::date('fin', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6"> 
    {!! Form::label('evento', 'Evento:') !!}
    {!! Form::select('idevento', $eventos, ['class' => 'form-control']) !!}
</div>
<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', '0') !!} 1
    </label>
</div>
<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cantidad', 'Cantidad de Boletos a Generar') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control', 'min' => '1']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('boletos.index') !!}" class="btn btn-default">Cancel</a>
</div>
