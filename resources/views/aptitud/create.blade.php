@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('content')

{!!Form::open(array(
    'url'=>'aptitudes',
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
                                            <p style="font-size:100%" class="text-left"> <strong> Domicilio:          </strong> {{$voucher->paciente->domicilio ? $voucher->paciente->domicilio->direccion : " "        }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Sexo:               </strong> {{$voucher->paciente->sexo ? $voucher->paciente->sexo->definicion : " "                 }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Origen:             </strong> {{$voucher->paciente->origen ? $voucher->paciente->origen->definicion : " "             }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Cuit de origen:     </strong> {{$voucher->paciente->origen ? $voucher->paciente->origen->cuit : " "                   }} </p>      
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
                                    @for ($i = 0; $i < sizeof($riesgos); $i++)
                                    <div class="form-group col-12">
                                        <input type="text" value=0  name="riesgos[{{$i}}]" hidden>
                                        <div class="icheck-danger d-inline">
                                            <input type="checkbox" value=1 id="{{$i}}" name="riesgos[{{$i}}]">
                                            <label for="{{$i}}">{{$riesgos[$i]}}</label>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Estudios -->
                    <div class="col-12">
                        <div class="row">
                            <!-- Historia Clínica -->
                            @if ($historia_clinica)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header fondo2">
                                            Historia Clínica
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                                                <div class="col">
                                                    @php
                                                        echo $diagnosticoH;
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Declaracion Jurada -->
                            @if ($declaracion_jurada)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header fondo2">
                                            Declaracion Jurada
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                                                <div class="col">
                                                    @php
                                                        echo $diagnosticoD;
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Posiciones Forzadas -->
                            @if ($posiciones_forzadas)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header fondo2">
                                            Posiciones Forzadas
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                                                <div class="col">
                                                    @php
                                                        echo $diagnosticoP;
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Iluminacion Insuficiente -->
                            @if ($iluminacion_direccionado)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header fondo2">
                                            Iluminacion Insuficiente
                                        <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                                                <div class="col">
                                                    @php
                                                        echo $diagnosticoI;
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Estudios por cargar -->
                            @for ($i = 0; $i < sizeof($estudios); $i++)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header fondo2">
                                            {{$estudios[$i]->estudio->nombre}}
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col">
                                                    <label for="">Diagnóstico: </label>
                                                    <textarea class="form-control" name={{$i}}  cols="15" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>   
                    </div>
                    <!-- Aptitud laboral -->
                    <div class="col-12">
                        <div class="card  "> <!--collapsed-card -->
                            <div class="card-header header-bg">
                                <h3 class="card-title">Aptitud laboral</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" > 
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="icheck-danger d-inline">
                                            <input type="checkbox" value=1 id="preexistencias" name="preexistencias">
                                            <label for="preexistencias">CON PREEXISTENCIAS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label><input type="radio" name="aptitud_laboral" value="APTO “A”: TODO TIPO DE TAREAS SEGÚN EXPOSICIÓN A RIESGO DECLARADO"> APTO “A”: TODO TIPO DE TAREAS SEGÚN EXPOSICIÓN A RIESGO DECLARADO </label>
                                    </div>
                                    <div class="col-12">
                                        <label><input type="radio" name="aptitud_laboral" value="APTO “B”: TODO TIPO DE TAREAS SEGÚN EXPOSICIÓN A RIESGO DECLARADO CON PROBLEMAS MEDICOS CONTROLADOS"> APTO “B”: TODO TIPO DE TAREAS SEGÚN EXPOSICIÓN A RIESGO DECLARADO CON PROBLEMAS MEDICOS CONTROLADOS </label>
                                    </div>
                                    <div class="col-12">
                                        <label><input type="radio" name="aptitud_laboral" value="APTO “C”: CON CONDICIONANTESSEGÚNEXPOSICIÓN A RIESGO"> APTO “C”: CON CONDICIONANTESSEGÚNEXPOSICIÓN A RIESGO </label>
                                    </div>
                                    <div class="col-12">
                                        <label><input type="radio" name="aptitud_laboral" value="APTO “D”: INCONVENIENTE SU INGRESO EN EL MOMENTO ACTUAL"> APTO “D”: INCONVENIENTE SU INGRESO EN EL MOMENTO ACTUAL </label>
                                    </div>
                                    <div class="col-12">
                                        <label><input type="radio" name="aptitud_laboral" value="APTO “E”: NO APTO"> APTO “E”: NO APTO </label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="">COMENTARIOS SOBRE PATOLOGIAS NO RELACIONADAS CON EL TRABAJO: </label>
                                        <textarea class="form-control" name="comentarios" id="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
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