@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/declaracion_jurada">Indice de Pacientes</a></li>
    <li class="breadcrumb-item active">Declaración jurada de Salud</li>
@endsection




@section('content')
{!!Form::open(array(
    'url'=>'declaracion_jurada',
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
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fas fa-stethoscope"></i> Declaración jurada de Salud</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- Seleccionar Medico -->
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Seleccionar Medico</label>
                                <select
                                    name="personal_clinica_id"
                                    id="personal_clinica_id"
                                    class="personal_clinica_id custom-select"
                                    >
                                    <option
                                        value="0"
                                        disabled="true"
                                        selected="true"
                                        title="-Seleccione un medico-">
                                        -Seleccione un medico-
                                    </option>
                                    @foreach ($personal_clinicas as $personal_clinica)
                                        <option value="{{$personal_clinica->id }}">{{$personal_clinica->nombreCompleto() . " - " . $personal_clinica->puesto->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--Fecha de Realización -->

                    </div>
                    <div class="row">
                        <!-- Seleccionar Voucher -->
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

                        <!--Fecha de Realización -->
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Fecha de realización</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="fecha_realizacion" placeholder="dd/mm/AAAA" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Estatura</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="estatura" placeholder="Ingrese la estatura" class="form-control" title="Ingrese la Estatura" required>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Peso</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="peso" placeholder="Ingrese el peso" class="form-control" title="Ingrese el Peso" required>
                            </div>
                        </div>
                    </div>
                    
                    <hr>


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
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Antecedentes Familiares</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">

                                    ¿Su padre vive?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1" value=1  name="su_padre_vive" checked>
                                                <label class="radio-inline" for="radioPrimary1">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary2" value=0  name="su_padre_vive">
                                                <label class="radio-inline" for="radioPrimary2">NO</label>
                                        </div>
                                    </div>

                                    ¿Su madre vive?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary3" value=1  name="su_madre_vive" checked>
                                                <label class="radio-inline" for="radioPrimary3">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary4" value=0  name="su_madre_vive">
                                                <label class="radio-inline" for="radioPrimary4">NO</label>
                                        </div>
                                    </div>
                                    ¿Su madre o padre padece alguna de las siguientes afecciones?

                                    <div class="form-group">

                                        <input type="hidden" name=cancer value=0>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" value=1 name=cancer id="todoCheck1"> Cancer
                                            <label for="todoCheck1"></label>
                                        </div>

                                        <input type="hidden" name=diabetes value=0>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" value=1 name=diabetes id="todoCheck2"> Diabetes
                                            <label for="todoCheck2"></label>
                                        </div>

                                        <input type="hidden" name=infarto value=0>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" value=1 name=infarto id="todoCheck3"> Infarto
                                            <label for="todoCheck3"></label>
                                        </div>

                                        <input type="hidden" name=hipertension_Arterial value=0>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" value=1 name=hipertension_Arterial id="todoCheck4"> Hipertension Arterial
                                            <label for="todoCheck4"></label>
                                        </div>




                                    </div>

                                    <div class="form-group">
                                        <label for="detalle">Opcional: Ingrese algun detalle</label>
                                        <input type="text" class="form-control" id="detalle"  name="detalle"  placeholder="Ingrese alguna observacion...">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Antecedentes Personales</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    ¿Fuma?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary5" value=1  name="fuma" >
                                                <label class="radio-inline" for="radioPrimary5">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary6" value=0  name="fuma" checked>
                                                <label class="radio-inline" for="radioPrimary6">NO</label>
                                        </div>
                                    </div>
                                    <div id="opcion1" style="display: none;">
                                        Opcional: ¿En que cantidad?
                                        <div class="custom-control">
                                            <input list="cantidad_paquetes" type="text" name="detalle1_p">
                                            <datalist id="cantidad_paquetes">
                                                <option value="más de 10 paquetes al día"></option>
                                                <option value="6 a 9 paquetes al día"></option>
                                                <option value="4 a 5 paquetes al día"></option>
                                                <option value="1 a 3 paquetes por día"></option>
                                                <option value="menos de 3 paquetes por día"></option>
                                            </datalist>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor1" value=observacion1_p  name="especificacion1_p" checked>
                                                <label class="radio-inline" for="valor1">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor2" value=preexistencia1_p  name="especificacion1_p">
                                                <label class="radio-inline" for="valor2">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Bebe?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary7" value=1  name="bebe" >
                                                <label class="radio-inline" for="radioPrimary7">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary8" value=0  name="bebe" checked>
                                                <label class="radio-inline" for="radioPrimary8">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion2" style="display: none;">
                                        Opcional: ¿En que cantidad?
                                        <div class="custom-control">
                                            <input list="cantidad_bebida" type="text" name="detalle2_p">
                                            <datalist id="cantidad_bebida">
                                                <option value="más de 10 bebidas por día"></option>
                                                <option value="6 a 9 bebidas por día"></option>
                                                <option value="4 a 5 bebidas por día"></option>
                                                <option value="1 a 3 bebidas por día"></option>
                                                <option value="menos de 3 bebidas por día"></option>
                                            </datalist>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor3" value=observacion2_p  name="especificacion2_p" checked>
                                                <label class="radio-inline" for="valor3">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor4" value=preexistencia2_p  name="especificacion2_p">
                                                <label class="radio-inline" for="valor4">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>




                                    ¿Act. Física?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary9" value=1  name="actividad_fisica" >
                                                <label class="radio-inline" for="radioPrimary9">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary10" value=0  name="actividad_fisica" checked>
                                                <label class="radio-inline" for="radioPrimary10">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion3" style="display: none;">
                                        Opcional: ¿En que cantidad?
                                        <div class="custom-control">
                                            <input list="cantidad_actividad" type="text" name="detalle3_p">
                                            <datalist id="cantidad_actividad">
                                                <option value="más de 6 veces por semana"></option>
                                                <option value="4 a 6 veces por semana"></option>
                                                <option value="1 a 3 veces por semana"></option>
                                            </datalist>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor5" value=observacion3_p  name="especificacion3_p" checked>
                                                <label class="radio-inline" for="valor5">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor6" value=preexistencia3_p  name="especificacion3_p">
                                                <label class="radio-inline" for="valor6">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Antecedentes de la Infancia</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                            ¿Padeció algunas de las siguientes afecciones?

                                <div class="form-group">
                                    <input type="hidden" name=sarampion value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=sarampion id="todoCheck10"> Sarampión
                                        <label for="todoCheck10"></label>
                                    </div><br>

                                    <input type="hidden" name=rebeola value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=rebeola id="todoCheck11"> Rubéola
                                        <label for="todoCheck11"></label>
                                    </div>

                                    <input type="hidden" name=epilepsia value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=epilepsia id="todoCheck12"> Epilepsias
                                        <label for="todoCheck12"></label>
                                    </div>

                                    <input type="hidden" name=varicela value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=varicela id="todoCheck13"> Varicela
                                        <label for="todoCheck13"></label>
                                    </div>

                                    <input type="hidden" name=parotiditis value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=parotiditis id="todoCheck14"> Parotiditis
                                        <label for="todoCheck14"></label>
                                    </div>

                                    <input type="hidden" name=cefalea_prolongada value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=cefalea_prolongada id="todoCheck15"> Cefalea prolongadas
                                        <label for="todoCheck15"></label>
                                    </div>

                                    <input type="hidden" name=hepatitis value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=hepatitis id="todoCheck16"> Hepatítis
                                        <label for="todoCheck16"></label>
                                    </div>

                                    <input type="hidden" name=gastritis value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=gastritis id="todoCheck17"> Gastrítis
                                        <label for="todoCheck17"></label>
                                    </div>

                                    <input type="hidden" name=ulcera_gastrica value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=ulcera_gastrica id="todoCheck18"> Ulcera Gástrica
                                        <label for="todoCheck18"></label>
                                    </div>


                                    <input type="hidden" name=hemorroide value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=hemorroide id="todoCheck19"> Hemorroides
                                        <label for="todoCheck19"></label>
                                    </div>

                                    <input type="hidden" name=hemorragias value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=hemorragias id="todoCheck20"> Hemorragia
                                        <label for="todoCheck20"></label>
                                    </div>

                                    <input type="hidden" name=neumonia value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=neumonia id="todoCheck21"> Neumonía
                                        <label for="todoCheck21"></label>
                                    </div>

                                    <input type="hidden" name=asma value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=asma id="todoCheck22"> Asma
                                        <label for="todoCheck22"></label>
                                    </div>

                                    <input type="hidden" name=tuberculosis value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=tuberculosis id="todoCheck23"> Tuberculosis
                                        <label for="todoCheck23"></label>
                                    </div>

                                    <input type="hidden" name=tos_cronica value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=tos_cronica id="todoCheck24"> Tos Crónica
                                        <label for="todoCheck24"></label>
                                    </div>

                                    <input type="hidden" name=catarro value=0>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value=1 name=catarro id="todoCheck25"> Catarro
                                        <label for="todoCheck25"></label>
                                    </div>

                                </div>

                                <div>
                                    Otras Afecciones
                                        <div class="custom-control">
                                            <input type="text" name="detalle1_m">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor7" value=observacion1_m  name="especificacion1_m" checked>
                                                <label class="radio-inline" for="valor7">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor8" value=preexistencia1_m  name="especificacion1_m">
                                                <label class="radio-inline" for="valor8">Preexistencia</label>
                                            </div>
                                        </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Antecedentes Recientes</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">


                                    ¿Enfermedad de los ojos, oidos , nariz o garganta?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary55" value=1  name="pregunta1_reciente">
                                                <label class="radio-inline" for="radioPrimary55">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary56" value=0  name="pregunta1_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary56">NO</label>
                                        </div>
                                    </div>


                                    <div id="opcion4" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle1_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor9" value=observacion1_reciente  name="especificacion1_reciente" checked>
                                                <label class="radio-inline" for="valor9">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor10" value=preexistencia1_reciente  name="especificacion1_reciente">
                                                <label class="radio-inline" for="valor10">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>
                                    ¿Mareos, desmayos, convulsiones, dolores de cabeza, parálisis o ataques, desordenes mentales o nerviosos?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary57" value=1  name="pregunta2_reciente">
                                                <label class="radio-inline" for="radioPrimary57">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary58" value=0  name="pregunta2_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary58">NO</label>
                                        </div>
                                    </div>
                                    <div id="opcion5" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle2_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor20" value=observacion2_reciente  name="especificacion2_reciente" checked>
                                                <label class="radio-inline" for="valor20">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor21" value=preexistencia2_reciente  name="especificacion2_reciente">
                                                <label class="radio-inline" for="valor21">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>
                                    ¿Insuficiencia respiratoria,  ronquera persistente, tos, asma, bronquitis, enfisema, tuberculosis o enfermedad respiratoria crónica?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary11112" value=1  name="pregunta3_reciente">
                                                <label class="radio-inline" for="radioPrimary11112">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary8888" value=0  name="pregunta3_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary8888">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion6" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle3_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor22" value=observacion3_reciente  name="especificacion3_reciente" checked>
                                                <label class="radio-inline" for="valor22">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor23" value=preexistencia3_reciente  name="especificacion3_reciente">
                                                <label class="radio-inline" for="valor23">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>



                                    ¿Dolor de pecho, palpitaciones, presión sanguínea, fiebre reumática, ataque al corazón u otra enfermedad del corazón o vasos sanguíneos?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary60" value=1  name="pregunta4_reciente">
                                                <label class="radio-inline" for="radioPrimary60">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary61" value=0  name="pregunta4_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary61">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion7" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle4_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor24" value=observacion4_reciente  name="especificacion4_reciente" checked>
                                                <label class="radio-inline" for="valor24">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor25" value=preexistencia4_reciente  name="especificacion4_reciente">
                                                <label class="radio-inline" for="valor25">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Ictericia, hemorragia intestinal, úlcera, colitis, diverticulosis, otras enfermedades del intestino, hígado o vesícula?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary99" value=1  name="pregunta5_reciente">
                                                <label class="radio-inline" for="radioPrimary99">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary908" value=0  name="pregunta5_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary908">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion8" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle5_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor28" value=observacion5_reciente  name="especificacion5_reciente" checked>
                                                <label class="radio-inline" for="valor28">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor29" value=preexistencia5_reciente  name="especificacion5_reciente">
                                                <label class="radio-inline" for="valor29">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Azúcar, sangre o pus en la orina, enfermedad del riñón, vejiga o próstata?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary635" value=1  name="pregunta6_reciente">
                                                <label class="radio-inline" for="radioPrimary635">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary646" value=0  name="pregunta6_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary646">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion9" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle6_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor88" value=observacion6_reciente  name="especificacion6_reciente" checked>
                                                <label class="radio-inline" for="valor88">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor89" value=preexistencia6_reciente  name="especificacion6_reciente">
                                                <label class="radio-inline" for="valor89">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Diabetes, Tiroides u otra enfermedad endócrinas?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary65" value=1  name="pregunta7_reciente">
                                                <label class="radio-inline" for="radioPrimary65">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary66" value=0  name="pregunta7_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary66">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion10" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle7_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor50" value=observacion7_reciente  name="especificacion7_reciente" checked>
                                                <label class="radio-inline" for="valor50">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor51" value=preexistencia7_reciente  name="especificacion7_reciente">
                                                <label class="radio-inline" for="valor51">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Gota, Afecciones musculares u óseas, incluidos columna, espalda o articulaciones?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary67" value=1  name="pregunta8_reciente">
                                                <label class="radio-inline" for="radioPrimary67">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary68" value=0  name="pregunta8_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary68">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion11" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle8_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor51" value=observacion8_reciente  name="especificacion8_reciente" checked>
                                                <label class="radio-inline" for="valor51">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor52" value=preexistencia8_reciente  name="especificacion8_reciente">
                                                <label class="radio-inline" for="valor52">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>



                                    ¿Deformidades, rengueras o amputaciones?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary69" value=1  name="pregunta9_reciente">
                                                <label class="radio-inline" for="radioPrimary69">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary70" value=0  name="pregunta9_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary70">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion12" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle9_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor53" value=observacion9_reciente  name="especificacion9_reciente" checked>
                                                <label class="radio-inline" for="valor53">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor54" value=preexistencia9_reciente  name="especificacion9_reciente">
                                                <label class="radio-inline" for="valor54">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>

                                    ¿Enfermedades de la piel ?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary71" value=1  name="pregunta10_reciente">
                                                <label class="radio-inline" for="radioPrimary71">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary72" value=0  name="pregunta10_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary72">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion13" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle10_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor55" value=observacion10_reciente  name="especificacion10_reciente" checked>
                                                <label class="radio-inline" for="valor55">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor56" value=preexistencia10_reciente  name="especificacion10_reciente">
                                                <label class="radio-inline" for="valor56">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>



                                    ¿Alergias, anemias u otras enfermedades de la sangre ?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary73" value=1  name="pregunta11_reciente">
                                                <label class="radio-inline" for="radioPrimary73">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary74" value=0  name="pregunta11_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary74">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion14" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle11_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor57" value=observacion11_reciente  name="especificacion11_reciente" checked>
                                                <label class="radio-inline" for="valor57">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor58" value=preexistencia11_reciente  name="especificacion11_reciente">
                                                <label class="radio-inline" for="valor58">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>

                                    ¿Está Ud. Actualmente bajo observación o tratamiento?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary76" value=1  name="pregunta12_reciente">
                                                <label class="radio-inline" for="radioPrimary76">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary77" value=0  name="pregunta12_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary77">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion15" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle12_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor59" value=observacion12_reciente  name="especificacion12_reciente" checked>
                                                <label class="radio-inline" for="valor59">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor60" value=preexistencia12_reciente  name="especificacion12_reciente">
                                                <label class="radio-inline" for="valor60">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    ¿Ha tenido algún cambio en su peso en el último año?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary79" value=1  name="pregunta13_reciente">
                                                <label class="radio-inline" for="radioPrimary79">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary80" value=0  name="pregunta13_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary80">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion16" style="display: none;">
                                        ¿Cuáles?
                                        <div class="custom-control">
                                            <input type="text" name="detalle13_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor61" value=observacion13_reciente  name="especificacion13_reciente" checked>
                                                <label class="radio-inline" for="valor61">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor62" value=preexistencia13_reciente  name="especificacion13_reciente">
                                                <label class="radio-inline" for="valor62">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>


                                    HERNIA
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary81" value=1  name="pregunta14_reciente">
                                                <label class="radio-inline" for="radioPrimary81">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary82" value=0  name="pregunta14_reciente" checked>
                                                <label class="radio-inline" for="radioPrimary82">NO</label>
                                        </div>
                                    </div>

                                    <div id="opcion17" style="display: none;">
                                        ¿Tipo?
                                        <div class="custom-control">
                                            <input type="text" name="detalle14_reciente">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor63" value=observacion14_reciente  name="especificacion14_reciente" checked>
                                                <label class="radio-inline" for="valor63">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor64" value=preexistencia14_reciente  name="especificacion14_reciente">
                                                <label class="radio-inline" for="valor64">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Antecedentes Quirúrjicos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    ¿Fue intervenido/a quirúrgicamente por alguna causa?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary83" value=1  name="pregunta1_q" >
                                                <label class="radio-inline" for="radioPrimary83">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary84" value=0  name="pregunta1_q" checked>
                                                <label class="radio-inline" for="radioPrimary84">NO</label>
                                        </div>
                                    </div>
                                    <div id="opcion18" style="display: none;">
                                        ¿De que?
                                        <div class="custom-control">
                                            <input type="text" name="detalle1_q">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor65" value=observacion1_q  name="especificacion1_q" checked>
                                                <label class="radio-inline" for="valor65">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor66" value=preexistencia1_q  name="especificacion1_q">
                                                <label class="radio-inline" for="valor66">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>






                                    ¿Tiene pendiente alguna cirugía?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary88" value=1  name="pregunta2_q">
                                                <label class="radio-inline" for="radioPrimary88">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary89" value=0  name="pregunta2_q" checked>
                                                <label class="radio-inline" for="radioPrimary89">NO</label>
                                        </div>
                                    </div>
                                    <div id="opcion19" style="display: none;">
                                        Por favor detallar Diagnóstico y fecha:
                                        <div class="custom-control">
                                            <textarea type="text" name="detalle2_q"></textarea>
                                        </div>
                                    </div>
                                    ¿Padece alguna otra enfermedad no especificada en el interrogatorio anterior?
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary90" value=1  name="pregunta3_q" >
                                                <label class="radio-inline" for="radioPrimary90">SI</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary91" value=0  name="pregunta3_q" checked>
                                                <label class="radio-inline" for="radioPrimary91">NO</label>
                                        </div>
                                    </div>
                                    <div id="opcion20" style="display: none;">
                                        ¿Cuál?
                                        <div class="custom-control">
                                            <input type="text" name="detalle3_q">
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor200" value=observacion3_q  name="especificacion3_q" checked>
                                                <label class="radio-inline" for="valor200">Observación</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="valor194" value=preexistencia3_q  name="especificacion3_q">
                                                <label class="radio-inline" for="valor194">Preexistencia</label>
                                            </div>
                                        </div>
                                    </div>










                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-dark">
                            <div class="card-header">
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
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group" style="text-align:center">
                <label>

                </label>
                <br>
                <a href="/declaracion_jurada">
                    <button title="Cancelar" class="btn btn-danger btn-lg" type="button"><i class="fas fa-arrow-left"></i> Cancelar</button>
                </a>
                <button title="Guardar" id="confirmar" class="btn btn-success btn-lg" type="submit"> <i class="fa fa-check"></i> Guardar</button>
            </div>
    </div>
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

            var select2 = $("#personal_clinica_id").select2({width:'100%'});
            select2.data('select2').$selection.css('height', '34px');


            $("#voucher_id").change(function(){
                mostrarDatos();
            });

            function mostrarDatos()
            {
                voucher_id=$("#voucher_id").val();
                vouchers=$("#voucher_id option:selected").text();

                var datosPaciente=null;
                var fotoPaciente=null;

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
        
        //Otros
            $('#radioPrimary5').click(function() {
                $('#opcion1').show("slow");
            });
            $('#radioPrimary6').click(function() {
                $('#opcion1').hide("slow");
            });


            $('#radioPrimary7').click(function() {
                $('#opcion2').show("slow");
            });
            $('#radioPrimary8').click(function() {
                $('#opcion2').hide("slow");
            });

            $('#radioPrimary9').click(function() {
                $('#opcion3').show("slow");
            });
            $('#radioPrimary10').click(function() {
                $('#opcion3').hide("slow");
            });


            $('#radioPrimary55').click(function() {
                $('#opcion4').show("slow");
            });
            $('#radioPrimary56').click(function() {
                $('#opcion4').hide("slow");
            });

            $('#radioPrimary57').click(function() {
                $('#opcion5').show("slow");
            });
            $('#radioPrimary58').click(function() {
                $('#opcion5').hide("slow");
            });

            $('#radioPrimary11112').click(function() {
                $('#opcion6').show("slow");
            });
            $('#radioPrimary8888').click(function() {
                $('#opcion6').hide("slow");
            });


            $('#radioPrimary60').click(function() {
                $('#opcion7').show("slow");
            });
            $('#radioPrimary61').click(function() {
                $('#opcion7').hide("slow");
            });


            $('#radioPrimary99').click(function() {
                $('#opcion8').show("slow");
            });
            $('#radioPrimary908').click(function() {
                $('#opcion8').hide("slow");
            });

            $('#radioPrimary635').click(function() {
                $('#opcion9').show("slow");
            });
            $('#radioPrimary646').click(function() {
                $('#opcion9').hide("slow");
            });

            $('#radioPrimary65').click(function() {
                $('#opcion10').show("slow");
            });
            $('#radioPrimary66').click(function() {
                $('#opcion10').hide("slow");
            });

            $('#radioPrimary67').click(function() {
                $('#opcion11').show("slow");
            });
            $('#radioPrimary68').click(function() {
                $('#opcion11').hide("slow");
            });

            $('#radioPrimary69').click(function() {
                $('#opcion12').show("slow");
            });
            $('#radioPrimary70').click(function() {
                $('#opcion12').hide("slow");
            });

            $('#radioPrimary71').click(function() {
                $('#opcion13').show("slow");
            });
            $('#radioPrimary72').click(function() {
                $('#opcion13').hide("slow");
            });

            $('#radioPrimary73').click(function() {
                $('#opcion14').show("slow");
            });
            $('#radioPrimary74').click(function() {
                $('#opcion14').hide("slow");
            });

            $('#radioPrimary76').click(function() {
                $('#opcion15').show("slow");
            });
            $('#radioPrimary77').click(function() {
                $('#opcion15').hide("slow");
            });

            $('#radioPrimary79').click(function() {
                $('#opcion16').show("slow");
            });
            $('#radioPrimary80').click(function() {
                $('#opcion16').hide("slow");
            });

            $('#radioPrimary81').click(function() {
                $('#opcion17').show("slow");
            });
            $('#radioPrimary82').click(function() {
                $('#opcion17').hide("slow");
            });


            $('#radioPrimary83').click(function() {
                $('#opcion18').show("slow");
            });
            $('#radioPrimary84').click(function() {
                $('#opcion18').hide("slow");
            });

            $('#radioPrimary88').click(function() {
                $('#opcion19').show("slow");
            });
            $('#radioPrimary89').click(function() {
                $('#opcion19').hide("slow");
            });


            $('#radioPrimary90').click(function() {
                $('#opcion20').show("slow");
            });
            $('#radioPrimary91').click(function() {
                $('#opcion20').hide("slow");
            });

        //
        });


    </script>

@endpush

@endsection

