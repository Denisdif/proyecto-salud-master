@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('content')

{!!Form::open(array(
    'url'=>'iluminacion_direccionados',
    'method'=>'POST',
    'autocomplete'=>'off',
    'files' => true,
))!!}

{{Form::token()}}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header header-bg header-bg">
                <div class="card-title">
                    <div class="row">
                        <div class="col">
                            <p style="font-size:130%"><i class="fas fa-stethoscope"></i>  Informe médico laboral</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header header-bg -->
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Voucher id HIDDEN -->
                    <div class="form-group">
                        <input type="number" name="voucher_id" value="{{$voucher->id }}" hidden>
                    </div>
                    <!-- Datos del paciente -->
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-header header-bg">
                                <h3 class="card-title">Datos del paciente</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="added"> <input type="hidden" value="'+nombres+'">
                                            <p style="font-size:100%" class="text-left"> <strong> Nombre completo:    </strong> {{$voucher->paciente->nombreCompleto()             }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> CUIL:               </strong> {{$voucher->paciente->cuil                         }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Fecha de nacimiento:</strong> {{$voucher->paciente->fecha_nacimiento()           }} </p> 
                                            <p style="font-size:100%" class="text-left"> <strong> Edad:               </strong> {{$voucher->paciente->edad()                       }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Domicilio:          </strong> {{$voucher->paciente->domicilio->direccion         }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Sexo:               </strong> {{$voucher->paciente->sexo->definicion             }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Origen:             </strong> {{$voucher->paciente->origen->definicion           }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Cuit de origen:     </strong> {{$voucher->paciente->origen->cuit                 }} </p>        
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="added"> 
                                            @if($voucher->paciente->imagen==null)
                                                <img class="img-thumbnail" height="200px" width="200px" src="{{ asset('imagenes/paciente/default.png')}}">
                                            @else
                                                <img class="img-thumbnail" height="200px" width="200px" src="{{$voucher->paciente->imagen}}">
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Riesgos -->
                    <div class="col-12">
                        <div class="card  "> <!--collapsed-card -->
                            <div class="card-header header-bg">
                                <h3 class="card-title">Riesgos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" > 
                                <div class="row">
                                    @foreach ($riesgos as $item)
                                        <div class="form-group col-12">
                                            <div class="icheck-danger d-inline">
                                                <input type="checkbox" value="{{$item}}" id="{{$item}}" name="riesgos[]">
                                                <label for="{{$item}}">{{$item}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Estudios -->
                    <div class="col-12">
                        <div class="row">
                        @foreach ($estudios as $item)
                            @switch($item)
                                @case("LABORATORIO")
                                    <!-- Laboratorio -->
                                    <div class="col-12">
                                        <div class="card ">
                                            <div class="card-header fondo2">
                                                {{$item}}
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Estado:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select class="form-control" name="resultados[{{$item}}][estado]" id="" placeholder="Estado">
                                                                <option value="Normal    ">Normal    </option>
                                                                <option value="Anormal   ">Anormal   </option>
                                                                <option value="No realiza">No realiza</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Hemograma:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][hemograma]" placeholder="hemograma">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Eritrosedimentación:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][eritrosedimentacion]" placeholder="Eritrosedimentación">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Glucemia:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][glucemia]" placeholder="Glucemia">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Colesterolemia:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][colesterolemia]" placeholder="Colesterolemia">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Uremia:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][uremia]" placeholder="Uremia">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Orina completa:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][orinaCompleta]" placeholder="Orina completa">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-3">
                                                            <label for="">Otros:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="resultados[{{$item}}][otros]" placeholder="Otros">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @default
                                    <!-- Otros estudios -->
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header fondo2">
                                                {{$item}}
                                            </div>
                                            <div class="card-body">
                                                <div class="row form-group">
                                                    <div class="col">
                                                        <label for="">Estado</label>
                                                        <select class="form-control" name="resultados[{{$item}}][estado]" id="" placeholder="Estado     ">
                                                            <option value="Normal    ">Normal    </option>
                                                            <option value="Anormal   ">Anormal   </option>
                                                            <option value="No realiza">No realiza</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col">
                                                        <label for="">Diagnóstico</label>
                                                        <input type="text" class="form-control" name="resultados[{{$item}}][diagnostico]" placeholder="Diagnóstico">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endswitch
                        @endforeach
                        </div>   
                    </div>
                </div>
                <!-- Guardar -->
                <div class="form-group">
                    <input id="guardar" name="_token" value="{{ csrf_token() }}" type="hidden">
                        <button class="btn btn-success btn-lg btn-block" id="confirmar"type="submit"><i class="fa fa-check"> </i>Cargar al formulario</button>
                </div>
            </div>
         </div>
    </div>
</div>

{!!Form::close()!!}

@push('scripts')
    <script>

    </script>
@endpush
@endsection