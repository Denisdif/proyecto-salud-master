<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $estudio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_estudio_id') }}
            {{ Form::text('tipo_estudio_id', $estudio->tipo_estudio_id, ['class' => 'form-control' . ($errors->has('tipo_estudio_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Estudio Id']) }}
            {!! $errors->first('tipo_estudio_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>