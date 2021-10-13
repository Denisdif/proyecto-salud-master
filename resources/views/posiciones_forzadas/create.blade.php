@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/posiciones_forzadas">Indice de Pacientes</a></li>
    <li class="breadcrumb-item active">Formulario de Posiciones Forzadas</li>
@endsection

@section('content')
{!!Form::open(array(
    'url'=>'posiciones_forzadas',
    'method'=>'POST',
    'autocomplete'=>'off',
    'files' => true,
))!!}

{{Form::token()}}

<style>
    .jay-signature-pad {
        position: relative;
        display: -ms-flexbox;
        -ms-flex-direction: column;
        width: 100%;
        height: 100%;
        max-width: 600px;
        max-height: 315px;
        border: 1px solid #e8e8e8;
        background-color: #fff;
        box-shadow: 0 3px 20px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
        border-radius: 15px;
        padding: 20px;
    }
    .txt-center {
        text-align: -webkit-center;
    }
</style>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header header-bg header-bg">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Formulario de Posiciones Forzadas</p>
                </div>
            </div>
            <!-- /.card-header header-bg -->
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Seleccionar Voucher -->
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Seleccionar Voucher</label>
                                <select
                                    name="voucher_id"
                                    id="voucher_id"
                                    class="voucher_id custom-select"
                                    >
                                    <option
                                        value="0"
                                        disabled="true"
                                        selected="true"
                                        title="-Seleccione un paciente-">
                                        -Seleccione un voucher-
                                    </option>
                                    @foreach ($vouchers as $voucher)
                                        <option value="{{$voucher->id }}">{{$voucher->voucherPaciente()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <!-- / Seleccionar paciente -->
                    <!-- Datos del paciente -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card  "> <!--collapsed-card -->
                                <div class="card-header header-bg">
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
                    <!-- / Datos del paciente -->
                    <!-- Datos laborales -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card  "> <!--collapsed-card -->
                                <div class="card-header header-bg">
                                    <h3 class="card-title">Datos laborales</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" > <!--style="display: none;" -->
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="observacion1">Puesto de trabajo: </label>
                                            <input type="text" class="form-control" name="puesto" placeholder="Ingrese el puesto de trabajo...">
                                        </div>
                                        <div class="form-group col">
                                            <label for="observacion1">Antigüedad (Años):</label>
                                            <input type="number" class="form-control" name="antiguedad" placeholder="Ingrese la antiguedad...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="observacion1">Nº Horas/ días de trabajo:  </label>
                                            <input type="text" class="form-control" name="nroTrabajo" placeholder="Ingrese Nº Horas/días de trabajo:">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- / Datos laborales -->
                    <!-- Tareas -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header header-bg">
                                    <h3 class="card-title">Tarea</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tarea_1">Tiempo de Tarea: </label>
                                        <div class="form-group row">
                                            <div class="col">{{ Form::radio('tiempo','opcion1') }} Esporádico             </div>
                                            <div class="col">{{ Form::radio('tiempo','opcion2') }} Continuo > 2hs y < 4hs </div>
                                            <div class="col">{{ Form::radio('tiempo','opcion3') }} Continuo > 4hs         </div>
                                        </div>
                                        <label for="tarea_2">Ciclo de trabajo: </label>
                                        <div class="form-group row">
                                            <div class="col">{{ Form::radio('ciclo','opcion4') }} Largo: < 2 minutos                     </div>
                                            <div class="col">{{ Form::radio('ciclo','opcion5') }} Moderado: 30 segundos - 1 a 2 minutos  </div>
                                            <div class="col">{{ Form::radio('ciclo','opcion6') }} Corto: hasta 30 segundos               </div>
                                        </div>
                                        <label for="tarea_3">Manipulación manual de cargas: </label>
                                        <div class="form-group row">
                                            <div class="col">{{ Form::radio('cargas','opcion7') }} Menor a 1 Kg        </div>
                                            <div class="col">{{ Form::radio('cargas','opcion8') }} Entre 1 Kg y 3 Kgs  </div>
                                            <div class="col">{{ Form::radio('cargas','opcion9') }} Mayor a 3 Kgs       </div>
                                        </div>
                                        <label for="tipo_tarea">Tipo de tarea: </label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta1" value=1 id="checkboxPrimary8">
                                                    <label for="checkboxPrimary8">Movimiento de alcance repetidos por encima del hombro</label>
                                                </div>
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta2" value=1 id="checkboxPrimary10">
                                                    <label for="checkboxPrimary10">Movimiento de extensión o flexión forzados de muñeca</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta3" value=1 id="checkboxPrimary12">
                                                    <label for="checkboxPrimary12">Flexión sostenida de columna</label>
                                                </div>
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta4" value=1 id="checkboxPrimary14">
                                                    <label for="checkboxPrimary14">Flexión extrema del codo</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta5" value=1 id="checkboxPrimary16">
                                                    <label for="checkboxPrimary16">El cuello se mantiene flexionado</label>
                                                </div>
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta6" value=1 id="checkboxPrimary18">
                                                    <label for="checkboxPrimary18">Giros de columna</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta7" value=1 id="checkboxPrimary20">
                                                    <label for="checkboxPrimary20">Rotación extrema del antebrazo</label>
                                                </div>
                                                <div class="col icheck-danger d-inline">
                                                    <input type="checkbox" name="pregunta8" value=1 id="checkboxPrimary22">
                                                    <label for="checkboxPrimary22">Flexión mantenida de dedos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="observacion_tarea">Otros, especificar: </label>
                                            <input type="text" class="form-control" id="observacion_tarea"  name="observacion_tarea"  placeholder="Ingrese alguna observacion...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- / Tareas -->
                    <!-- Semiología -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header header-bg">
                                    <h3 class="card-title">Semiología del Segmento Corporal Comprometido - Relación Movilidad – Dolor Articular y estado de masa muscular relacionada.</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <table class="table table-hover table-condensed table-bordered table-striped">
                                                    <tr>
                                                        <th colspan="2">
                                                            Articulación
                                                        </th>
                                                        <th>Abducción</th>
                                                        <th>Addución</th>
                                                        <th>Flexión</th>
                                                        <th>Extensión</th>
                                                        <th>Rot. Externa</th>
                                                        <th>Rot. Interna</th>
                                                        <th>Irradiación</th>
                                                        <th>Alt. Masa muscular</th>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="10%">Hombro</td>
                                                        <!-- Hombro_Derecha -->
                                                            <td width="5%">Der.</td> <!-- Hombro_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_h" value=1 id="checkboxPrimary34">
                                                                        <label for="checkboxPrimary34"></label>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_h" value=1 id="checkboxPrimary38">
                                                                        <label for="checkboxPrimary38"></label>
                                
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_h" value=1 id="checkboxPrimary42">
                                                                        <label for="checkboxPrimary42"></label>
                                                                        
                                                                    </div>  
                                                                </div>     
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_h" value=1 id="checkboxPrimary46">
                                                                        <label for="checkboxPrimary46"></label>
                                                                    
                                                                    </div>
                                                                </div>       
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_h" value=1 id="checkboxPrimary430">
                                                                        <label for="checkboxPrimary430"></label>
                                                                        
                                                                    </div>
                                                                </div>  
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_h" value=1 id="checkboxPrimary788">
                                                                        <label for="checkboxPrimary788"></label>
                                                                       
                                                                    </div>
                                                                </div>  
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_h" value=1 id="checkboxPrimary54">
                                                                        <label for="checkboxPrimary54"></label>
                                                                        
                                                                    </div>
                                                                </div>  
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_h" value=1 id="checkboxPrimary58">
                                                                        <label for="checkboxPrimary58"></label>
                                                                       
                                                                    </div>
                                                                </div>  
                                                            </td>
                                                        <!-- / Hombro_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- Hombro_Izquierda -->
                                                            <td width="5%">Izq.</td> <!-- Hombro_Izquierda -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">   
                                                                        <input type="checkbox" name="abduccion_izquierda_h" value=1 id="checkboxPrimary4000">
                                                                        <label for="checkboxPrimary4000"></label>
                                                                        
                                                                    </div>                                                           
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_h" value=1 id="checkboxPrimary40">
                                                                        <label for="checkboxPrimary40"></label>
                                                                        
                                                                    </div>                                
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_h" value=1 id="checkboxPrimary44">
                                                                        <label for="checkboxPrimary44"></label>
                                                                       
                                                                    </div>                                                           
                                                                </div>                                                    
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">  <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_h" value=1 id="checkboxPrimary48">
                                                                        <label for="checkboxPrimary48"></label>
                                                                       
                                                                    </div>                                                           
                                                                </div>                                                       
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">  <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_h" value=1 id="checkboxPrimary432">
                                                                        <label for="checkboxPrimary432"></label>
                                                                        
                                                                    </div>                                      
                                                                </div>                                                        
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_h" value=1 id="checkboxPrimary52">
                                                                        <label for="checkboxPrimary52"></label>
                                                                        
                                                                    </div>                                                           
                                                                </div>                                                      
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_h" value=1 id="checkboxPrimary56">
                                                                        <label for="checkboxPrimary56"></label>
                                                                       
                                                                    </div>                                                           
                                                                </div>                                                      
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_h" value=1 id="checkboxPrimary60">
                                                                        <label for="checkboxPrimary60"></label>
                                                                       
                                                                    </div>                                                           
                                                                </div>                                                      
                                                            </td>
                                                        <!-- / Hombro_Izquierda -->
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="10%">Codo</td>
                                                        <!-- Codo_Derecha -->
                                                            <td width="5%">Der.</td> <!-- Codo_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_c" value=1 id="checkboxPrimary62">
                                                                        <label for="checkboxPrimary62"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_c" value=1 id="checkboxPrimary66">
                                                                        <label for="checkboxPrimary66"></label>
                                                                       
                                                                    </div>                                                           
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_c" value=1 id="checkboxPrimary70">
                                                                        <label for="checkboxPrimary70"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_c" value=1 id="checkboxPrimary74">
                                                                        <label for="checkboxPrimary74"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_c" value=1 id="checkboxPrimary78">
                                                                        <label for="checkboxPrimary78"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_c" value=1 id="checkboxPrimary82">
                                                                        <label for="checkboxPrimary82"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_c" value=1 id="checkboxPrimary86">
                                                                        <label for="checkboxPrimary86"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_c" value=1 id="checkboxPrimary90">
                                                                        <label for="checkboxPrimary90"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Codo_Derecha -->    
                                                        </tr>
                                                        <tr>
                                                        <!-- Codo_Izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_c" value=1 id="checkboxPrimary64">
                                                                        <label for="checkboxPrimary64"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_c" value=1 id="checkboxPrimary68">
                                                                        <label for="checkboxPrimary68"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_c" value=1 id="checkboxPrimary72">
                                                                        <label for="checkboxPrimary72"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_c" value=1 id="checkboxPrimary76">
                                                                        <label for="checkboxPrimary76"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_c" value=1 id="checkboxPrimary80">
                                                                        <label for="checkboxPrimary80"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_c" value=1 id="checkboxPrimary84">
                                                                        <label for="checkboxPrimary84"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_c" value=1 id="checkboxPrimary88">
                                                                        <label for="checkboxPrimary88"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_c" value=1 id="checkboxPrimary92">
                                                                        <label for="checkboxPrimary92"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Codo_Izquierda -->
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="10%">Articulación Muñeca</td>
                                                        <!-- Muñeca_Derecha -->
                                                            <td width="5%">Der.</td> <!-- Muñeca_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_m" value=1 id="checkboxPrimary94">
                                                                        <label for="checkboxPrimary94"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_m" value=1 id="checkboxPrimary98">
                                                                        <label for="checkboxPrimary98"></label>
                                                                       
                                                                    </div>                                                                                                               
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_m" value=1 id="checkboxPrimary102">
                                                                        <label for="checkboxPrimary102"></label>
                                                                       
                                                                    </div>                                 
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_m" value=1 id="checkboxPrimary106">
                                                                        <label for="checkboxPrimary106"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_m" value=1 id="checkboxPrimary110">
                                                                        <label for="checkboxPrimary110"></label>
                                                                       
                                                                    </div>       
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_m" value=1 id="checkboxPrimary114">
                                                                        <label for="checkboxPrimary114"></label>
                                                                       
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_m" value=1 id="checkboxPrimary118">
                                                                        <label for="checkboxPrimary118"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_m" value=1 id="checkboxPrimary122">
                                                                        <label for="checkboxPrimary122"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Muñeca_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- Muñeca_izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_m" value=1 id="checkboxPrimary96">
                                                                        <label for="checkboxPrimary96"></label>
                                                                       
                                                                    </div>                                                       
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_m" value=1 id="checkboxPrimary100">
                                                                        <label for="checkboxPrimary100"></label>
                                                                       
                                                                    </div>                                           
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_m" value=1 id="checkboxPrimary104">
                                                                        <label for="checkboxPrimary104"></label>
                                                                       
                                                                    </div>            
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_m" value=1 id="checkboxPrimary108">
                                                                        <label for="checkboxPrimary108"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_m" value=1 id="checkboxPrimary112">
                                                                        <label for="checkboxPrimary112"></label>
                                                                      
                                                                    </div>                   
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_m" value=1 id="checkboxPrimary116">
                                                                        <label for="checkboxPrimary116"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_m" value=1 id="checkboxPrimary120">
                                                                        <label for="checkboxPrimary120"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_m" value=1 id="checkboxPrimary124">
                                                                        <label for="checkboxPrimary124"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Muñeca_izquierda -->
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="10%">Articulación Mano y Dedos</td>
                                                        <!-- MandoDedo_Derecha -->
                                                            <td width="5%">Der.</td> <!-- MandoDedo_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_md" value=1 id="checkboxPrimary126">
                                                                        <label for="checkboxPrimary126"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_md" value=1 id="checkboxPrimary130">
                                                                        <label for="checkboxPrimary130"></label>
                                                                       
                                                                    </div>                                                                                                             
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_md" value=1 id="checkboxPrimary134">
                                                                        <label for="checkboxPrimary134"></label>
                                                                       
                                                                    </div>                        
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_md" value=1 id="checkboxPrimary138">
                                                                        <label for="checkboxPrimary138"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_md" value=1 id="checkboxPrimary142">
                                                                        <label for="checkboxPrimary142"></label>
                                                                        
                                                                    </div>   
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_md" value=1 id="checkboxPrimary146">
                                                                        <label for="checkboxPrimary146"></label>
                                                                     
                                                                    </div>  
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_md" value=1 id="checkboxPrimary150">
                                                                        <label for="checkboxPrimary150"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_md" value=1 id="checkboxPrimary154">
                                                                        <label for="checkboxPrimary154"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / MandoDedo_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- MandoDedo_Izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_md" value=1 id="checkboxPrimary128">
                                                                        <label for="checkboxPrimary128"></label>
                                                                       
                                                                    </div>                                             
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_md" value=1 id="checkboxPrimary132">
                                                                        <label for="checkboxPrimary132"></label>
                                                                      
                                                                    </div>                                     
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_md" value=1 id="checkboxPrimary136">
                                                                        <label for="checkboxPrimary136"></label>
                                                                       
                                                                    </div>     
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_md" value=1 id="checkboxPrimary140">
                                                                        <label for="checkboxPrimary140"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_md" value=1 id="checkboxPrimary144">
                                                                        <label for="checkboxPrimary144"></label>
                                                                       
                                                                    </div>                  
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_md" value=1 id="checkboxPrimary148">
                                                                        <label for="checkboxPrimary148"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_md" value=1 id="checkboxPrimary152">
                                                                        <label for="checkboxPrimary152"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_md" value=1 id="checkboxPrimary156">
                                                                        <label for="checkboxPrimary156"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / MandoDedo_Izquierda -->
                                                    </tr>                                                
                                                    <tr>
                                                        <td rowspan="2" width="10%">Articulación Cadera</td>
                                                        <!-- Cadera_Derecha -->
                                                            <td width="5%">Der.</td> <!-- Cadera_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_cad" value=1 id="checkboxPrimary158">
                                                                        <label for="checkboxPrimary158"></label>
                                                                       
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_cad" value=1 id="checkboxPrimary162">
                                                                        <label for="checkboxPrimary162"></label>
                                                                      
                                                                    </div>                                                                                                            
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_cad" value=1 id="checkboxPrimary166">
                                                                        <label for="checkboxPrimary166"></label>
                                                                      
                                                                    </div>                  
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_cad" value=1 id="checkboxPrimary170">
                                                                        <label for="checkboxPrimary170"></label>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_cad" value=1 id="checkboxPrimary174">
                                                                        <label for="checkboxPrimary174"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_cad" value=1 id="checkboxPrimary178">
                                                                        <label for="checkboxPrimary178"></label>
                                                                     
                                                                    </div>  
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_cad" value=1 id="checkboxPrimary182">
                                                                        <label for="checkboxPrimary182"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_cad" value=1 id="checkboxPrimary186">
                                                                        <label for="checkboxPrimary186"></label>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Cadera_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- Cadera_izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_cad" value=1 id="checkboxPrimary160">
                                                                        <label for="checkboxPrimary160"></label>
                                                                      
                                                                    </div>                         
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_cad" value=1 id="checkboxPrimary164">
                                                                        <label for="checkboxPrimary164"></label>
                                                                      
                                                                    </div>                         
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_cad" value=1 id="checkboxPrimary168">
                                                                        <label for="checkboxPrimary168"></label>
                                                                       
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_cad" value=1 id="checkboxPrimary172">
                                                                        <label for="checkboxPrimary172"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_cad" value=1 id="checkboxPrimary176">
                                                                        <label for="checkboxPrimary176"></label>
                                                                     
                                                                    </div>             
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_cad" value=1 id="checkboxPrimary180">
                                                                        <label for="checkboxPrimary180"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_cad" value=1 id="checkboxPrimary184">
                                                                        <label for="checkboxPrimary184"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_cad" value=1 id="checkboxPrimary188">
                                                                        <label for="checkboxPrimary188"></label>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Cadera_izquierda -->
                                                    </tr>     
                                                    <tr>
                                                        <td rowspan="2" width="10%">Articulación Rodilla</td>
                                                        <!-- RODILLA_Derecha -->
                                                            <td width="5%">Der.</td> <!-- RODILLA_Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_rod" value=1 id="checkboxPrimary190">
                                                                        <label for="checkboxPrimary190"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_rod" value=1 id="checkboxPrimary194">
                                                                        <label for="checkboxPrimary194"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_rod" value=1 id="checkboxPrimary198">
                                                                        <label for="checkboxPrimary198"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_rod" value=1 id="checkboxPrimary202">
                                                                        <label for="checkboxPrimary202"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_rod" value=1 id="checkboxPrimary206">
                                                                        <label for="checkboxPrimary206"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_rod" value=1 id="checkboxPrimary210">
                                                                        <label for="checkboxPrimary210"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_rod" value=1 id="checkboxPrimary214">
                                                                        <label for="checkboxPrimary214"></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_rod" value=1 id="checkboxPrimary218">
                                                                        <label for="checkboxPrimary218"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / RODILLA_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- RODILLA_izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_rod" value=1 id="checkboxPrimary192">
                                                                        <label for="checkboxPrimary192"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_rod" value=1 id="checkboxPrimary196">
                                                                        <label for="checkboxPrimary196"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_rod" value=1 id="checkboxPrimary200">
                                                                        <label for="checkboxPrimary200"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_rod" value=1 id="checkboxPrimary204">
                                                                        <label for="checkboxPrimary204"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_rod" value=1 id="checkboxPrimary208">
                                                                        <label for="checkboxPrimary208"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_rod" value=1 id="checkboxPrimary212">
                                                                        <label for="checkboxPrimary212"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_rod" value=1 id="checkboxPrimary216">
                                                                        <label for="checkboxPrimary216"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_rod" value=1 id="checkboxPrimary220">
                                                                        <label for="checkboxPrimary220"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / RODILLA_izquierda -->
                                                    </tr>   
                                                    <tr>
                                                        <td rowspan="2" width="10%">Articulacion Tobillo</td>
                                                        <!-- Tobillo_Derecha -->
                                                            <td width="5%">Der.</td> <!-- _Derecha -->
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_derecha_t" value=1 id="checkboxPrimary222">
                                                                        <label for="checkboxPrimary222"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_derecha_t" value=1 id="checkboxPrimary226">
                                                                        <label for="checkboxPrimary226"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_derecha_t" value=1 id="checkboxPrimary230">
                                                                        <label for="checkboxPrimary230"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_derecha_t" value=1 id="checkboxPrimary234">
                                                                        <label for="checkboxPrimary234"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_derecha_t" value=1 id="checkboxPrimary238">
                                                                        <label for="checkboxPrimary238"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_derecha_t" value=1 id="checkboxPrimary500">
                                                                        <label for="checkboxPrimary500"></label>
                                                                      
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_derecha_t" value=1 id="checkboxPrimary900">
                                                                        <label for="checkboxPrimary900"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_derecha_t" value=1 id="checkboxPrimary904">
                                                                        <label for="checkboxPrimary904"></label>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Tobillo_Derecha -->
                                                        </tr>
                                                        <tr>
                                                        <!-- Tobillo_Izquierda -->
                                                            <td width="5%">Izq.</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Abdución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="abduccion_izquierda_t" value=1 id="checkboxPrimary224">
                                                                        <label for="checkboxPrimary224"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Addución -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="adduccion_izquierda_t" value=1 id="checkboxPrimary228">
                                                                        <label for="checkboxPrimary228"></label>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Flexión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="flexion_izquierda_t" value=1 id="checkboxPrimary232">
                                                                        <label for="checkboxPrimary232"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Extensión -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="extension_izquierda_t" value=1 id="checkboxPrimary236">
                                                                        <label for="checkboxPrimary236"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Externa -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rexterna_izquierda_t" value=1 id="checkboxPrimary240">
                                                                        <label for="checkboxPrimary240"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Rot. Interna -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="rinterna_izquierda_t" value=1 id="checkboxPrimary700">
                                                                        <label for="checkboxPrimary700"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Irradiación -->
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="irradiacion_izquierda_t" value=1 id="checkboxPrimary902">
                                                                        <label for="checkboxPrimary902"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"> <!-- Alt. Masa muscular -->             
                                                                    <div class="icheck-danger d-inline">
                                                                        <input type="checkbox" name="alteracion_izquierda_t" value=1 id="checkboxPrimary906">
                                                                        <label for="checkboxPrimary906"></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!-- / Tobillo_Izquierda -->
                                                    </tr>  
                                                </table>
                                            </div>
                                        <div class="form-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- / Semiología -->
                    <!-- Características del dolor -->
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header header-bg">
                                    <h3 class="card-title">Características del dolor.</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col" for="dolor_1">Por su forma de aparición: </label>
                                        <div class="col"> {{ Form::radio('forma','opcion1_d') }} Agudo</div>
                                        <div class="col"> {{ Form::radio('forma','opcion2_d') }} Insidioso</div>
                                        <div class="col"> {{ Form::radio('forma','opcion3_d') }} Ausente</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col" for="dolor_2">Por su evolución: </label>
                                        <div class="col"> {{ Form::radio('evolucion','opcion4_d') }} Continuo                 </div>
                                        <div class="col"> {{ Form::radio('evolucion','opcion5_d') }} Brotes                   </div>
                                        <div class="col"> {{ Form::radio('evolucion','opcion6_d') }} Cíclico                  </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="observacion1">Puntos dolorosos: </label>
                                            <input type="text" class="form-control" id="observacion1_d"  name="observacion1_d"  placeholder="Ingrese alguna observacion...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="observacion1">Localización: </label>
                                            <input type="text" class="form-control" id="observacion2_d"  name="observacion2_d"  placeholder="Ingrese alguna observacion...">
                                        </div>
                                    </div>
                                    <!-- Otros signos y sintomas presentes en el segmento involucrado -->
                                        <label for="signos_1">Otros signos y sintomas presentes en el segmento involucrado: </label>
                                        <div class="row">
                                            <div class="col icheck-danger d-inline">
                                                <input type="checkbox" name="pregunta1_d" value=1 id="checkboxPrimary24">
                                                <label for="checkboxPrimary24">Calambres musculares             </label> 
                                            </div>
                                            <div class="col icheck-danger d-inline">
                                                <input type="checkbox" name="pregunta2_d" value=1 id="checkboxPrimary26">
                                                <label for="checkboxPrimary26">Parestesias                      </label>
                                            </div>
                                            <div class="col icheck-danger d-inline">
                                                <input type="checkbox" name="pregunta3_d" value=1 id="checkboxPrimary28">
                                                <label for="checkboxPrimary28">Calor                            </label>
                                            </div>
                                            <div class="col icheck-danger d-inline">
                                                <input type="checkbox" name="pregunta4_d" value=1 id="checkboxPrimary30">
                                                <label for="checkboxPrimary30">Cambios de coloración de la piel </label>
                                            </div>
                                            <div class="col icheck-danger d-inline">
                                                <input type="checkbox" name="pregunta5_d" value=1 id="checkboxPrimary32">
                                                <label for="checkboxPrimary32">Tumefacción                      </label>
                                            </div>
                                        </div>
                                    <!-- / -->
                                    <label for="caracterizacion_1">Caracterización semiológica: </label>
                                    <div class="row">
                                        <div class="form-group col">
                                            {{ Form::radio('grado','opcion1_s') }} Grado 0: Ausencia de signos y síntomas.                                    <br>
                                            {{ Form::radio('grado','opcion2_s') }} Grado 1: Dolor en reposo y/o existencia de sintomatología sugestiva.       <br>
                                            {{ Form::radio('grado','opcion3_s') }} Grado 2: Grado 1 mas contractura y/o dolor a la movilización.              <br>
                                            {{ Form::radio('grado','opcion4_s') }} Grado 3: Grado 2 mas dolor a la palpación y/o percusión.                   <br>
                                            {{ Form::radio('grado','opcion5_s') }} Grado 4: Grado 3 mas limitación funcional evidente clínicamente.           <br>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="observacion1">Observación: </label>
                                            <input type="text" class="form-control" id="observacion1_s"  name="observacion1_s"  placeholder="Ingrese alguna observacion...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- / Características del dolor -->
                    <!-- Firma -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header header-bg">
                                    <h3 class="card-title">Firma del Paciente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div id="signature-pad" class="jay-signature-pad">
                                            <div class="jay-signature-pad--body">
                                                <canvas id="jay-signature-pad" width=550 height=200></canvas>
                                            </div>
                                            <div class="signature-pad--footer txt-center">
                                                <div class="signature-pad--actions txt-center">
                                                    <div>
                                                        <br>
                                                        <button type="button" class="button clear btn btn-dark" data-action="clear"><i class="fa fa-eraser" aria-hidden="true"></i>...Limpiar</button>
                                                        <button type="button" class="button btn btn-dark" data-action="change-color"><i class="fas fa-palette"></i> Cambiar color</button>
                                                        <!--<button type="button" class="button save btn btn-dark" data-action="save-svg"><i class="fas fa-save"></i> Guardar como SVG</button>-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="firma" id="firma">
                    <!-- / Firma -->
                </div>
            </div>
            <!-- Guardar -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                    <div class="form-group">
                        <input id="guardar" name="_token" value="{{ csrf_token() }}" type="hidden">
                            <button class="btn btn-success btn-lg btn-block" id="confirmar"type="submit"><i class="fa fa-check"> </i>Cargar al formulario</button>
                    </div>
                </div>
            <!-- / Guardar -->
         </div>
    </div>
</div>
{!!Form::close()!!}

@push('scripts')
    <script>
    $(document).ready(function(){
        //Firma
            var wrapper = document.getElementById("signature-pad");
            var clearButton = wrapper.querySelector("[data-action=clear]");
            var changeColorButton = wrapper.querySelector("[data-action=change-color]");
            var guardar = document.getElementById("confirmar");
            var canvas = wrapper.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
            // Adjust canvas coordinate space taking into account pixel ratio,
            // to make it look crisp on mobile devices.
            // This also causes canvas to be cleared.
            function resizeCanvas() {
                // When zoomed out to less than 100%, for some very strange reason,
                // some browsers report devicePixelRatio as less than 1
                // and only part of the canvas is cleared then.
                var ratio =  Math.max(window.devicePixelRatio || 1, 1);
                // This part causes the canvas to be cleared
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                // This library does not listen for canvas changes, so after the canvas is automatically
                // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
                // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
                // that the state of this library is consistent with visual state of the canvas, you
                // have to clear it manually.
                signaturePad.clear();
            }
            // On mobile devices it might make more sense to listen to orientation change,
            // rather than window resize events.
            window.onresize = resizeCanvas;
            resizeCanvas();
            function download(dataURL, filename) {
                var blob = dataURLToBlob(dataURL);
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement("a");
                a.style = "display: none";
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            }
            // One could simply use Canvas#toBlob method instead, but it's just to show
            // that it can be done using result of SignaturePad#toDataURL.
            function dataURLToBlob(dataURL) {
                var parts = dataURL.split(';base64,');
                var contentType = parts[0].split(":")[1];
                var raw = window.atob(parts[1]);
                var rawLength = raw.length;
                var uInt8Array = new Uint8Array(rawLength);
                for (var i = 0; i < rawLength; ++i) {
                    uInt8Array[i] = raw.charCodeAt(i);
                }
                return new Blob([uInt8Array], { type: contentType });
            }
            clearButton.addEventListener("click", function (event) {
                signaturePad.clear();
            });
            changeColorButton.addEventListener("click", function (event) {
                var r = Math.round(Math.random() * 255);
                var g = Math.round(Math.random() * 255);
                var b = Math.round(Math.random() * 255);
                var color = "rgb(" + r + "," + g + "," + b +")";
                signaturePad.penColor = color;
            });
            guardar.addEventListener("click", function (event) {
                if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
                } else {
                var dataURL = signaturePad.toDataURL('image/svg+xml');
                document.getElementById('firma').value = dataURL;
                //image = image.replace('data:image/png;base64,', '');
                //save(dataURL, "signature.svg");
                //var dataURL = signaturePad.toDataURL('image/svg+xml');
                //download(dataURL, "signature.svg");
                }
            });

        //
        //Voucher
            var select1 = $("#voucher_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');


            $("#voucher_id").change(function(){
                mostrarDatos();
            });

            function mostrarDatos()
            {
                voucher_id=$("#voucher_id").val();
                vouchers=$("#voucher_id option:selected").text();

                /*   Aca iría el Ajax para obtener la cantidad por Paquete*/
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('declaracion_jurada/create/traerDatosPaciente')!!}',
                    data:{'id':voucher_id},
                    success:function(data){

                        documento=data['documento'];
                        nombres=data['nombres'];
                        apellidos=data['apellidos'];
                        fecha_nacimiento=data['fecha_nacimiento'];
                        foto=data['foto'];
                        cuil=data['cuil'];
                        sexo=data['sexo'];

                        datosPaciente='<div class="added"> <input type="hidden" value="'+nombres+'"><p style="font-size:140%" class="text-left">Nombre y Apellido del paciente: '+nombres+'</p><input type="hidden" value="'+documento+'"><p style="font-size:140%" class="text-left">Documento del paciente: '+documento+'</p><input type="hidden" value="'+fecha_nacimiento+'"><p style="font-size:140%" class="text-left">Fecha de nacimiento del paciente: '+fecha_nacimiento+'</p><input type="hidden"  value="'+cuil+'"><p style="font-size:140%" class="text-left">CUIL: '+cuil+'</p><input type="hidden" value="'+sexo+'"><p style="font-size:140%" class="text-left">Sexo: '+sexo+'</p><input type="hidden" name="voucher_id" value="'+voucher_id+'"></div>';
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
                $("#voucher_id option:selected").remove();

            }
        // 
    });  
    </script>
@endpush
@endsection

