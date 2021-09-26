<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('archivo') }}
            {{ Form::text('archivo', $audiometria->archivo, ['class' => 'form-control' . ($errors->has('archivo') ? ' is-invalid' : ''), 'placeholder' => 'Archivo']) }}
            {!! $errors->first('archivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('voucher_id') }}
            {{ Form::text('voucher_id', $audiometria->voucher_id, ['class' => 'form-control' . ($errors->has('voucher_id') ? ' is-invalid' : ''), 'placeholder' => 'Voucher Id']) }}
            {!! $errors->first('voucher_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>