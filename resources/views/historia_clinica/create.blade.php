@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/historia_clinica">Indice de Historias Clinicas</a></li>
    <li class="breadcrumb-item active">Historia Clinica</li>
@endsection

@section('content')
{!!Form::open(array(
    'url'=>'historia_clinica',
    'method'=>'POST',
    'autocomplete'=>'off',
    'files' => true,
))!!}

{{Form::token()}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Historia Clinica</p>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Seleccionar Paciente</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <!-- Seleccionar Obra Social -->
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="obra_social_id">Obra Social</label>
                            <div class="form-group">
                                <select
                                    name="obra_social_id"
                                    id="obra_social_id"
                                    class="obra_social_id custom-select"
                                    required>
                                    <option
                                        value="0"
                                        disabled="true"
                                        selected="true"
                                        title="-Seleccione la obra social-">
                                        -Seleccione una obra social-
                                    </option>
                                    @foreach ($obra_sociales as $obra_social)
                                        <option
                                            value="{{$obra_social->id }}">{{$obra_social->obraSocialCompleta()}}
                                        </option>
                                    @endforeach
                                </select>
                                <a data-target="#modal-agregarObraSocial" data-toggle="modal">
                                    <button title="agregar obra social" class="btn btn-dark btn-md">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                                @include('obra_social.modalAgregarObraSocial')
                            </div>
                        </div>

                        <!--Procedencia -->
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="origen_id">Procedencia</label>
                            <div class="form-group">
                                <select
                                    name="origen_id"
                                    id="origen_id"
                                    class="origen_id custom-select"
                                    required>
                                    <option
                                        value="0"
                                        disabled="true"
                                        selected="true"
                                        title="-Seleccione la procedencia-">
                                        -Seleccione la procedencia-
                                    </option>
                                    @foreach ($origenes as $origen)
                                        <option
                                            value="{{$origen->id }}">{{$origen->definicion}}
                                        </option>
                                    @endforeach
                                </select>
                                <a data-target="#modal-agregarOrigen" data-toggle="modal">
                                    <button title="agregar procedencia" class="btn btn-dark btn-md">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                                @include('origen.modalAgregarOrigen')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Voucher -->
        <input type="number" name="voucher_id" value={{$voucher->id}} hidden>
        <!-- Examen clinico  -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Examen Clínico</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Estatura:</label>
                            <input class="form-control" type="number" name="estatura">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Peso:</label>
                            <input class="form-control" type="number" name="peso">
                        </div>
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="sobrepeso" id="sobrepeso">
                                <label for="sobrepeso">Sobrepeso</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Índice MC:</label>
                            <input class="form-control" type="number" name="imc">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Medicación actual:</label>
                            <input class="form-control" type="text" name="medicacion_actual">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cardiovascular -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CARDIOVASCULAR</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Frecuencia cardíaca:</label>
                            <input class="form-control" type="text" name="frecuencia_cardiaca">
                        </div>

                        <div class="col">
                            <label for="" class="form-label">Tipo:</label>
                            <input class="form-control" type="text" name="observacion_varices">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="tension_arterial" id="tension_arterial">
                                <label for="tension_arterial">Tensión arterial S.</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="pulso" id="pulso">
                                <label for="pulso">Pulso N.</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="varices" id="varices">
                                <label for="varices">Várices.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Piel -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Piel</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Cicatrices -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">¿Cicatrices patológicas visibles?          </label>
                            <input class="form-control" type="text" name="observacion1_piel" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Vesícula -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Vesícula                                   </label>
                            <input class="form-control" type="text" name="obs_vesicula" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Ulceras -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Ulceras                                    </label>
                            <input class="form-control" type="text" name="obs_ulceras" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Fisuras -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Fisuras                                    </label>
                            <input class="form-control" type="text" name="obs_fisuras" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Prurito -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Prurito                                    </label>
                            <input class="form-control" type="text" name="obs_prurito" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Eczemas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Eczemas                                    </label>
                            <input class="form-control" type="text" name="obs_eczemas" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Dermatitis -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Dermatitis                                 </label>
                            <input class="form-control" type="text" name="obs_dertmatitis" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Eritemas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Eritemas                                   </label>
                            <input class="form-control" type="text" name="obs_eritemas" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Petequias -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Petequias                                  </label>
                            <input class="form-control" type="text" name="obs_petequias" placeholder="descripciones">
                        </div>
                    </div>
                    <!-- Tejido celular subcutaneo -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Tejido celular subcutaneo                                  </label>
                            <input class="form-control" type="text" name="tejido" placeholder="descripciones">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Neurológico -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Neurológico</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Motilidad activa -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Motilidad activa</label>
                            <input class="form-control" type="text" name="observacion1_neu">
                        </div>
                    </div>
                    <!-- Motilidad pasiva -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Motilidad pasiva</label>
                            <input class="form-control" type="text" name="observacion2_neu">
                        </div>
                    </div>
                    <!-- Sensibilidad -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Sensibilidad</label>
                            <input class="form-control" type="text" name="observacion3_neu">
                        </div>
                    </div>
                    <!-- Marcha -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Marcha</label>
                            <input class="form-control" type="text" name="observacion4_neu">
                        </div>
                    </div>
                    <!-- Reflejos osteotendinosos -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Reflejos osteotendinosos</label>
                            <input class="form-control" type="text" name="observacion5_neu">
                        </div>
                    </div>
                    <!-- Pares craneales -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Pares craneales</label>
                            <input class="form-control" type="text" name="observacion6_neu">
                        </div>
                    </div>
                    <!-- Taxia -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Taxia</label>
                            <input class="form-control" type="text" name="observacion7_neu">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_neu">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OSTEOARTICULAR -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">OSTEOARTICULAR</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Limitaciones funcionales -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Limitaciones funcionales</label>
                            <input class="form-control" type="text" name="observacion1_os">
                        </div>
                    </div>
                    <!-- Amputaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Amputaciones</label>
                            <input class="form-control" type="text" name="observacion2_os">
                        </div>
                    </div>
                    <!-- Movilidad y reflejo -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Movilidad y reflejo</label>
                            <input class="form-control" type="text" name="observacion3_os">
                        </div>
                    </div>
                    <!-- Tonicidad y fuerza muscular normal -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Tonicidad y fuerza muscular normal</label>
                            <input class="form-control" type="text" name="observacion4_os">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_os">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COLUMNA VERTEBRAL -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">COLUMNA VERTEBRAL</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Examen normal -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Examen normal</label>
                            <input class="form-control" type="text" name="observacion1_col">
                        </div>
                    </div>
                    <!-- Contracturas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Contracturas</label>
                            <input class="form-control" type="text" name="observacion2_col">
                        </div>
                    </div>
                    <!-- Puntos dolorosos -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Puntos dolorosos</label>
                            <input class="form-control" type="text" name="observacion3_col">
                        </div>
                    </div>
                    <!-- Limitaciones funcionales -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Limitaciones funcionales</label>
                            <input class="form-control" type="text" name="observacion4_col">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_col">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CABEZA Y CUELLO -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CABEZA Y CUELLO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Cráneo -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Cráneo</label>
                            <input class="form-control" type="text" name="observacion1_cc">
                        </div>
                    </div>
                    <!-- Cara -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Cara</label>
                            <input class="form-control" type="text" name="observacion2_cc">
                        </div>
                    </div>
                    <!-- Nariz -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Nariz</label>
                            <input class="form-control" type="text" name="observacion3_cc">
                        </div>
                    </div>
                    <!-- Oídos -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Oídos</label>
                            <input class="form-control" type="text" name="observacion4_cc">
                        </div>
                    </div>  
                    <!-- Boca -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Boca</label>
                            <input class="form-control" type="text" name="observacion5_cc">
                        </div>
                    </div>   
                    <!-- Cuello y Tiroides -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Cuello y Tiroides</label>
                            <input class="form-control" type="text" name="observacion6_cc">
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
        <!-- OFTALMOLÓGICO -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">OFTALMOLÓGICO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Pupilas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Pupilas</label>
                            <input class="form-control" type="text" name="observacion1_of">
                        </div>
                    </div>
                    <!-- Corneas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Corneas</label>
                            <input class="form-control" type="text" name="observacion2_of">
                        </div>
                    </div>
                    <!-- Conjuntivas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Conjuntivas</label>
                            <input class="form-control" type="text" name="observacion3_of">
                        </div>
                    </div>
                    <!-- Visión en colores -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Visión en colores</label>
                            <input class="form-control" type="text" name="observacion4_of">
                        </div>
                    </div>
                    <!-- Ojo derecho -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Ojo derecho</label>
                            <input class="form-control" type="text" name="observacion5_of">
                        </div>
                    </div>
                    <!-- Ojo izquierdo -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Ojo izquierdo</label>
                            <input class="form-control" type="text" name="observacion6_of">
                        </div>
                    </div>
                    <!-- Usa lentes -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="pregunta7_of" id="pregunta7_of">
                                <label for="pregunta7_of">Usa lentes</label>
                            </div>
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_of">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ODONTOLÓGICO -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">ODONTOLÓGICO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Encias y mucosas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Encias y mucosas</label>
                            <input class="form-control" type="text" name="observacion1_od">
                        </div>
                    </div>
                    <!-- Esmalte dental -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Esmalte dental</label>
                            <input class="form-control" type="text" name="observacion2_od">
                        </div>
                    </div>
                    <!-- Prótesis -->
                    <h3>Prótesis</h3>
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Superior</label>
                            <input class="form-control" type="text" name="superior">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Inferior</label>
                            <input class="form-control" type="text" name="inferior">
                        </div>
                    </div>
                    <!-- Caries -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="pregunta4_od" id="pregunta4_od">
                                <label for="pregunta4_od">Caries</label>
                            </div>
                        </div>
                    </div>
                    <!-- Faltan piezas dentarias -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="icheck-danger d-inline">
                                <input value=1 type="checkbox" name="pregunta5_od" id="pregunta5_od">
                                <label for="pregunta5_od">Faltan piezas dentarias</label>
                            </div>
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_od">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABDOMEN -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">ABDOMEN</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Forma -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Forma</label>
                            <input class="form-control" type="text" name="observacion1_ab">
                        </div>
                    </div>
                    <!-- Hígado -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Hígado</label>
                            <input class="form-control" type="text" name="observacion2_ab">
                        </div>
                    </div>
                    <!-- Bazo -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Bazo</label>
                            <input class="form-control" type="text" name="observacion3_ab">
                        </div>
                    </div>
                    <!-- Colon -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Colon</label>
                            <input class="form-control" type="text" name="observacion4_ab">
                        </div>
                    </div>
                    <!-- Ruidos hidroaéreos -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Ruidos hidroaéreos</label>
                            <input class="form-control" type="text" name="observacion5_ab">
                        </div>
                    </div>
                    <!-- Puño percusión -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Puño percusión</label>
                            <input class="form-control" type="text" name="observacion6_ab">
                        </div>
                    </div>
                    <!-- Cicatrices quirúrjicas -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Cicatrices quirúrjicas</label>
                            <input class="form-control" type="text" name="observacion_ab">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- TORAX Y APARTO RESPIRATORIO -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">TORAX Y APARTO RESPIRATORIO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Caja torácica -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Caja torácica</label>
                            <input class="form-control" type="text" name="observacion1_re">
                        </div>
                    </div>
                    <!-- Pulmones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Pulmones</label>
                            <input class="form-control" type="text" name="observacion2_re">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- REGIONES INGUINALES -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">REGIONES INGUINALES</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Tono de la pared posterior -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Tono de la pared posterior</label>
                            <input class="form-control" type="text" name="observacion1_in">
                        </div>
                    </div>
                    <!-- Orificios superficiales -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Orificios superficiales</label>
                            <input class="form-control" type="text" name="observacion2_in">
                        </div>
                    </div>
                    <!-- Orificios profundos -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Orificios profundos</label>
                            <input class="form-control" type="text" name="observacion3_in">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_in">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- GENITALES -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">GENITALES</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Características -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Características</label>
                            <input class="form-control" type="text" name="observacion1_ge">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_ge">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- REGIÓN ANAL -->
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">REGIÓN ANAL</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Características -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Características</label>
                            <input class="form-control" type="text" name="observacion1_an">
                        </div>
                    </div>
                    <!-- Observaciones -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="form-label">Observaciones</label>
                            <input class="form-control" type="text" name="observacion_an">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARGA DE ARCHIVO -->
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CARGA DE ARCHIVO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <label for="">archivo</label>
                    <input name="archivo" id="archivo" type="file">
        
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                        <div class="form-group">
                            <input id="guardar" name="_token" value="{{ csrf_token() }}" type="hidden">
                                <button class="btn btn-success btn-lg btn-block" id="btn_add"type="submit"><i class="fa fa-check"> </i>Cargar al formulario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{!!Form::close()!!}

@push('scripts')
    <script>
        $(document).ready(function(){
            /*var select1 = $("#paciente_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');*/

            /*var select1 = $("#voucher_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');*/
            var select2 = $("#obra_social_id").select2({width:'100%'});
            select2.data('select2').$selection.css('height', '34px');
            var select3 = $("#origen_id").select2({width:'100%'});
            select3.data('select2').$selection.css('height', '34px');

            $("#paciente_id").change(function(){
                mostrarDatos();
            });

            function mostrarDatos()
            {
                paciente_id=$("#paciente_id").val();
                pacientes=$("#paciente_id option:selected").text();


                /*   Aca iría el Ajax para obtener la cantidad por Paquete*/
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('historia_clinica/create/traerDatosPaciente')!!}',
                    data:{'id':paciente_id},
                    success:function(data){
                        documento=data['documento'];
                        nombres=data['nombres'];
                        apellidos=data['apellidos'];
                        fecha_nacimiento=data['fecha_nacimiento'];
                        foto=data['foto'];
                        cuil=data['cuil'];
                        peso=data['peso'];
                        estatura=data['estatura'];
                        empresa=data['empresa'];
                        sexo=data['sexo'];


                        var datosPaciente='<img class="img-thumbnail" height="85px" alt="sin imagen" width="85px" src='+foto+'><input type="hidden" name="stock" value="'+nombres+'"><p style="font-size:140%" class="text-left">'+nombres+'</p><input type="hidden" name="stock" value="'+apellidos+'"><p style="font-size:140%" class="text-left">'+apellidos+'</p><input type="hidden" name="stock" value="'+documento+'"><p style="font-size:140%" class="text-left">'+documento+'</p><input type="hidden" name="stock" value="'+fecha_nacimiento+'"><p style="font-size:140%" class="text-left">'+fecha_nacimiento+'</p><input type="hidden" name="stock" value="'+cuil+'"><p style="font-size:140%" class="text-left">'+cuil+'</p><input type="hidden" name="stock" value="'+peso+'"><p style="font-size:140%" class="text-left">'+peso+'</p><input type="hidden" name="stock" value="'+estatura+'"><p style="font-size:140%" class="text-left">'+estatura+'</p><input type="hidden" name="stock" value="'+empresa+'"><p style="font-size:140%" class="text-left">'+empresa+'</p><input type="hidden" name="stock" value="'+sexo+'"><p style="font-size:140%" class="text-left">'+sexo+'</p><input type="hidden" name="paciente_id" value="'+paciente_id+'">';
                        $("#datos_paciente").append(datosPaciente);
                        eliminarDelSelect2 ();


                    },
                    error:function(){
                        console.log('no anda AJAX');
                    }
                });
                /*   Aca iría el Ajax para obtener el stock maximo y realizar el multiplicador*/

            }
                function eliminarDelSelect2 ()
                {
                    $("#paciente_id option:selected").remove();

                }

        });

    </script>

@endpush

@endsection

