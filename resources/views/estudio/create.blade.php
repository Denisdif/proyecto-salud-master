@extends('layouts.admin')

@section('navegacion')
    <li class="breadcrumb-item"><a href="/estudios">Índice de Estudios</a></li>
    <li class="breadcrumb-item active">Nuevo estudio</li>
@endsection

@section('content')
    {!!Form::open(array(
        'url'=>'estudios',
        'method'=>'POST',
        'autocomplete'=>'off',
        'files' => true,
    ))!!}

    {{Form::token()}}

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Nuevo estudio</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="form-group col-6">
                        <label>Seleccionar tipo de Estudio</label>
                        <select 
                            name="tipo_estudio_id"
                            id="tipo_estudio_id"
                            class="tipo_estudio_id custom-select"
                            >
                            <option
                                value="0"
                                disabled="true"
                                selected="true"
                                title="-Seleccione tipo de estudio-">
                                -Seleccione un tipo de estudio-
                            </option>
                            @foreach ($tipo_estudios as $item)
                                <option value="{{$item->id }}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        {{ Form::label('nombre') }}
                        {{ Form::text('nombre', $estudio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    
                </div>
            </div>
        <!-- Guardar -->
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                <div class="form-group">
                    <input id="guardar" name="_token" value="{{ csrf_token() }}" type="hidden">
                        <button class="btn btn-success btn-lg btn-block" id="confirmar"type="submit"><i class="fa fa-check"> </i>Cargar estudio</button>
                </div>
            </div>
        <!-- / Guardar -->
        </div>
    </div>

    {!!Form::close()!!}

    @push('scripts')
        <script>
        
        $(document).ready(function(){
            var select1 = $("#tipo_estudio_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');
        });  
        </script>
    
    @endpush
@endsection