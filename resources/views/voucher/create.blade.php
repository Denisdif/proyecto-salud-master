@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/voucher">Indice de Vouchers</a></li>
    <li class="breadcrumb-item active">Generar Voucher</li>
@endsection

@section('content')
    <div class="container">
        @include('errors.request')
        @include('voucher.mensaje')
        {!!Form::open(array('url'=>'voucher','method'=>'POST','autocomplete'=>'off','files' => true,))!!}
        {{Form::token()}}

        <div class="card card-outline card-dark">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-voucher" aria-hidden="true"></i> Datos Vouchers</p>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!-- Paciente -->
                    <div class="form-group">
                        <label> <p style="font-size:130%">Seleccionar Paciente</p></label>
                        <select
                            name="paciente_id"
                            id="paciente_id"
                            class="paciente_id custom-select"
                            >
                            <option
                                value="0"
                                disabled="true"
                                selected="true"
                                title="-Seleccione un tipo de paciente-">
                                -Seleccione un paciente-
                            </option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{$paciente->id }}">{{$paciente->documento . " " . $paciente->nombreCompleto() . " " . $paciente->origen->definicion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-dark "> <!--collapsed-card -->
                        <div class="card-header">
                            <h3 class="card-title">Datos del Paciente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" > <!--style="display: none;" -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="datos_paciente" class="form-group">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="foto_paciente" class="form-group">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Paciente -->   
                <!-- Estudios -->
                @foreach ($tipo_estudios as $tipo)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark "> <!--collapsed-card -->
                            <div class="card-header">
                                <h3 class="card-title">{{$tipo->nombre}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" > <!--style="display: none;" -->
                                <div class="row">
                                    @foreach ($estudios as $item)
                                        @if ($item->tipo_estudio_id == $tipo->id)
                                            <div class="col-6">
                                                <div class="custom-control custom-checkbox">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="{{$item->id}}" value = 1 id="{{$item->id}}">
                                                        <label for="{{$item->id}}"> {{strtoupper($item->nombre)}} </label>
                                                    </div>
                                                </div>  
                                            </div>         
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- / Estudios-->
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group" style="text-align:center">
                <label>

                </label>
                <br>
                <a href="/voucher">
                    <button title="Cancelar" class="btn btn-danger btn-lg" type="button"><i class="fas fa-arrow-left"></i> Cancelar</button>
                </a>
                <button title="Guardar" id="confirmar" class="btn btn-success btn-lg" type="submit"> <i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div> 


{!!Form::close()!!}

@push('scripts')
    <script>
        $(document).ready(function(){
            
            var select67 = $("#paciente_id").select2({width:'100%'});
            select67.data('select2').$selection.css('height', '34px');

        });

    </script>

    <script>
        
        $(document).ready(function(){

            //Voucher
                var select1 = $("#paciente_id").select2({width:'100%'});
                select1.data('select2').$selection.css('height', '34px');


                $("#paciente_id").change(function(){
                    mostrarDatos();
                });

                function mostrarDatos()
                {
                    paciente_id=$("#paciente_id").val();
                    
                    /*   Aca iría el Ajax para obtener la cantidad por Paquete*/
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('voucher/create/traerDatosPaciente')!!}',
                        data:{'id':paciente_id},
                        success:function(data){

                            documento=data['documento'];
                            nombres=data['nombres'];
                            apellidos=data['apellidos'];
                            fecha_nacimiento=data['fecha_nacimiento'];
                            foto=data['foto'];
                            cuil=data['cuil'];
                            sexo=data['sexo'];

                            datosPaciente='<div class="added"> <input type="hidden" value="'+nombres+'"><p style="font-size:140%" class="text-left">Nombre y Apellido del paciente: '+nombres+'</p><input type="hidden" value="'+documento+'"><p style="font-size:140%" class="text-left">Documento del paciente: '+documento+'</p><input type="hidden" value="'+fecha_nacimiento+'"><p style="font-size:140%" class="text-left">Fecha de nacimiento del paciente: '+fecha_nacimiento+'</p><input type="hidden"  value="'+cuil+'"><p style="font-size:140%" class="text-left">CUIL: '+cuil+'</p><input type="hidden" value="'+sexo+'"><p style="font-size:140%" class="text-left">Sexo: '+sexo+'</p><input type="hidden" name="paciente_id" value="'+paciente_id+'"></div>';
                            fotoPaciente='<div class="added"> @if('+foto+'==null)<img class="img-thumbnail" height="85px" width="85px" src='+foto+'>@else<img class="img-thumbnail" height="350px" width="350px" src="{{ asset('imagenes/paciente/default.png')}}">@endif </div>';

                            //Limpiar datos agregadoss
                            $('.added').remove();
                            
                            $("#datos_paciente").append(datosPaciente).hide().show('slow');
                            $("#foto_paciente").append(fotoPaciente).hide().show('slow');
                        },
                        error:function(){
                            console.log('no anda AJAX');
                        }
                    });

                }
                function eliminarDelSelect2 ()
                {
                    $("#paciente_id option:selected").remove();

                }
            // 
        
        });  
    </script>

@endpush

@endsection

