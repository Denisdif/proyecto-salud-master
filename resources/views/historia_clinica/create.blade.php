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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Historia Clinica</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
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
                                <option value="{{$paciente->id }}">{{$paciente->documento . " " . $paciente->nombreCompleto() }}</option>
                            @endforeach
                        </select>
                </div-->
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Seleccionar Paciente</label>
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
                                -Seleccione un paciente-
                            </option>
                            @foreach ($vouchers as $voucher)
                                <option value="{{$voucher->id }}">{{$voucher->voucherPaciente()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--div class="col-md-12">
                    <div class="card card-dark "> <!--collapsed-card -->
                        <!--div class="card-header">
                            <h3 class="card-title">Datos de la Empresa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" > <!--style="display: none;" -->
                            <!--div id="datos_paciente" class="form-group">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-dark "> <!--collapsed-card -->
                        <!--div class="card-header">
                            <h3 class="card-title">Datos del Trabajador</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" > <!--style="display: none;" -->
                            <!--div id="datos_paciente" class="form-group">

                            </div>
                        </div>
                    </div>
                </div-->
                <div class="col-md-12">
                    <div class="row">
                        <!-- Seleccionar Voucher -->
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

                        <!--Fecha de Realización -->
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

            <div class="col-md-12">
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

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">CARDIOVASCULAR</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Frecuencia cardíaca:
                            <div class="custom-control">
                                <input type="text" name="frecuencia_cardiaca">
                            </div>
                            Tensión arterial
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="tension_arterial" value=1>S</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="tension_arterial" value=0>D</label>
                                </label>
                            </div>
                            Pulso
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pulso" value=1>N</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pulso" value=0>A</label>
                                </label>
                            </div>
                            Várices
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="varices" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="varices" value=0>NO</label>
                                </label>
                            </div>
                            Tipo
                            <div class="custom-control">
                                <input type="text" name="observacion_varices">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">PIEL</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            ¿Cicatrices patológicas visibles?
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_piel" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_piel" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_piel" placeholder="descripciones">
                            </div>
                            Vesículas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="vesicula" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vesicula" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_vesicula" placeholder="descripciones">
                            </div>
                            Ulceras
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="ulceras" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ulceras" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_ulceras" placeholder="descripciones">
                            </div>
                            Fisuras
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="fisuras" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="fisuras" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_fisuras" placeholder="descripciones">
                            </div>
                            Prurito
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="prurito" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="prurito" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_prurito" placeholder="descripciones">
                            </div>
                            Eczemas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="eczemas" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eczemas" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_eczemas" placeholder="descripciones">
                            </div>
                            Dermatitis
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="dertmatitis" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="dertmatitis" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_dertmatitis" placeholder="descripciones">
                            </div>
                            Eritemas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="eritemas" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eritemas" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_eritemas" placeholder="descripciones">
                            </div>
                            Petequias
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="petequias" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="petequias" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="obs_petequias" placeholder="descripciones">
                            </div>
                            Tejido celular subcutaneo
                            <div class="custom-control">
                                <input type="text" name="tejido">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">OSTEOARTICULAR</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Limitaciones funcionales
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_os" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_os" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_os">
                            </div>
                            Amputaciones
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_os" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_os" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_os">
                            </div>
                            Movilidad y reflejo
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_os" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_os" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_os">
                            </div>
                            Tonicidad y fuerza muscular normal
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_os" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_os" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_os">
                            </div>
                           Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_os">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">COLUMNA VERTEBRAL</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Examen normal
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_col" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_col" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_col">
                            </div>
                            Contracturas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_col" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_col" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_col">
                            </div>
                           Puntos dolorosos
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_col" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_col" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_col">
                            </div>
                            Limitaciones funcionales
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_col" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_col" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_col">
                            </div>
                           Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_col">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">CABEZA Y CUELLO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Cráneo
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_cc">
                            </div>
                            Cara
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_cc">
                            </div>
                            Nariz
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_cc">
                            </div>
                            Oídos
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_cc">
                            </div>
                            Boca
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion5_cc">
                            </div>
                            Cuello y Tiroides
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_cc" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_cc" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion6_cc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">OFTALMOLÓGICO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Pupilas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_of">
                            </div>
                            Corneas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_of">
                            </div>
                            Conjuntivas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_of">
                            </div>
                            Visión en colores
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_of">
                            </div>
                            <h6>Examen de agudeza visual</h6>
                            Ojo derecho
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion5_of">
                            </div>
                            Ojo izquierdo
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_of" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_of" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion6_of">
                            </div>
                            Usa lentes
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta7_of" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta7_of" value=0>NO</label>
                                </label>
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_of">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Neurológico</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Motilidad activa
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_neu">
                            </div>
                            Motilidad pasiva
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_neu">
                            </div>
                            Sensibilidad
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_neu">
                            </div>
                            Marcha
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_neu">
                            </div>
                            Reflejos osteotendinosos
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion5_neu">
                            </div>
                            Pares craneales
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_neu" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_neu" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion6_neu">
                            </div>
                           Taxia
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta7_neu" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta7_neu" value=0>NO</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion7_neu">
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_neu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ODONTOLÓGICO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Encias y mucosas
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_od" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_od" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_od">
                            </div>
                            Esmalte dental
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_od" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_od" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_od">
                            </div>
                           Prótesis
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_od" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_od" value=0>NO</label>
                                </label>
                            </div>
                            Caries
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_od" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_od" value=0>NO</label>
                                </label>
                            </div>
                            Superior
                            <div class="custom-control">
                                <input type="text" name="superior">
                            </div>
                            Inferior
                            <div class="custom-control">
                                <input type="text" name="inferior">
                            </div>
                            Faltan piezas dentarias
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_od" value=1>SI</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_od" value=0>NO</label>
                                </label>
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_od">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">TORAX Y APARTO RESPIRATORIO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Caja torácica
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_re" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_re" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_re">
                            </div>
                            Pulmones
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_re" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_re" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_re">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ABDOMEN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Forma
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_ab">
                            </div>
                            Hígado
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_ab">
                            </div>
                            Bazo
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_ab">
                            </div>
                            Colon
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta4_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion4_ab">
                            </div>
                            Ruidos hidroaéreos
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta5_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion5_ab">
                            </div>
                            Puño percusión
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_ab" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta6_ab" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion6_ab">
                            </div>
                            Cicatrices quirúrjicas
                            <div class="custom-control">
                                <input type="text" name="observacion_ab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">REGIONES INGUINALES</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Tono de la pared posterior
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_in" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_in" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_in">
                            </div>
                            Orificios superficiales
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_in" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta2_in" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion2_in">
                            </div>
                            Orificios profundos
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_in" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta3_in" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion3_in">
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_in">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">GENITALES</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Características
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_ge" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_ge" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_ge">
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_ge">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">REGIÓN ANAL</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            Características
                            <div class="custom-control custom-radio">
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_an" value=1>Normal</label>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pregunta1_an" value=0>Anormal</label>
                                </label>
                            </div>
                            <div class="custom-control">
                                <input type="text" name="observacion1_an">
                            </div>
                            Observaciones
                            <div class="custom-control">
                                <input type="text" name="observacion_an">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

{!!Form::close()!!}

@push('scripts')
    <script>
        $(document).ready(function(){
            /*var select1 = $("#paciente_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');*/

            var select1 = $("#voucher_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '34px');
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

