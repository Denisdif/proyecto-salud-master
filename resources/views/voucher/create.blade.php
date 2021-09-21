@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/voucher">Indice de Vouchers</a></li>
    <li class="breadcrumb-item active">Generar Voucher</li>
@endsection

@section('content')
<div class="row">
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-dark "> <!--collapsed-card -->
                        <div class="card-header">
                            <h3 class="card-title">Estudios Generales</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" > <!--style="display: none;" -->
                            <div class="row">
                                <table class="table table-hover table-condensed table-bordered table-striped">
                                    <!--<thead>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="hidden" value=0>
                                                        <input id="allCheck" type="checkbox" value=1> 
                                                    </label>
                                                </div>   
                        
                                            </td>
                                            <th>-- Seleccionar todo --</th>
                                        </tr>                
                                    </thead>-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkbox-inline rows">
                                                        <input type="hidden" name=declaracion value=0>
                                                        <input type="checkbox" name=declaracion value=1> 
                                                    </label>
                                                </div>   
                                            </td>
                                            <th> Declaración Jurada</th>              
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkbox-inline rows">
                                                        <input type="hidden" name=hc_formulario value=0>
                                                        <input type="checkbox" name=hc_formulario value=1> 
                                                    </label>
                                                </div>   
                                            </td>
                                            <th> Historia Clínica </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkbox-inline rows">
                                                        <input type="hidden" name=posiciones_forzadas value=0>
                                                        <input type="checkbox" name=posiciones_forzadas value=1> 
                                                    </label>
                                                </div>   

                                            </td>
                                            <th> Posiciones Forzadas </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkbox-inline rows">
                                                        <input type="hidden" name=direccionado value=0>
                                                        <input type="checkbox" name=direccionado value=1> 
                                                    </label>
                                                </div>   
                                            </td>
                                            <th> Direccionamiento </th>  
                                        </tr>      
                                    </tbody>            
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
</div>

{!!Form::close()!!}

@push('scripts')
    <script>
        $(document).ready(function(){
            
            var select67 = $("#paciente_id").select2({width:'100%'});
            select67.data('select2').$selection.css('height', '34px');

            
            
        });

    </script>

@endpush

@endsection

