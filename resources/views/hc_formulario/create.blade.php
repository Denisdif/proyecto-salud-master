@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/historia_clinica">Indice de Historias Clinicas</a></li>
    <li class="breadcrumb-item active">Historia Clinica</li>
@endsection




@section('content')
{!!Form::open(array(
    'url'=>'hc_formulario',
    'method'=>'POST',
    'autocomplete'=>'off',
    'files' => true,
))!!}

{{Form::token()}}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Historia Clinica</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-12">
                    <input name="historia_clinica_id" type="hidden" value="{{$hc}}">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Examen Clínico</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                Estatura:
                                <div class="custom-control">
                                    <input type="string" name="estatura">
                                </div>
                                Peso:
                                <div class="custom-control">
                                    <input type="string" name="peso">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="sobrepeso" value=0>
                                        <input type="checkbox" name="sobrepeso" value=1> Sobrepeso
                                    </label>
                                </div>
                                IMC
                                <div class="custom-control">
                                    <input type="string" name="imc">
                                </div>
                                Medicacion actual:
                                <div class="custom-control">
                                    <input type="text" name="medicacion_actual">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                <div class="form-group">
                    <input id="guardar" name="_token" value="{{ csrf_token() }}" type="hidden">
                        <button class="btn btn-success btn-lg btn-block" id="btn_add"type="submit"><i class="fa fa-check"> </i>Cargar al formulario</button>
                </div>
            </div>
        </div>

    </div>
</div>

{!!Form::close()!!}

@push('scripts')
    <script>
        $(document).ready(function(){


        });

    </script>

@endpush

@endsection

