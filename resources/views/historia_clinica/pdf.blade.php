<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">

    <style>
        @page { margin: 50px; }
            #footer
            {
                position: fixed;
                left: 0px;
                bottom: -180px;
                right: 0px;
                height: 50px;
                background-color: #357CA5;
                color: #FFFFFF;
            }
            #footer .page:after
            {
                content: counter(page, decimal);
                float: right;
                background-color: #357CA5;
                color: #FFFFFF;
            }
            table {
            width: auto;
            height: auto;
        }
    </style>

    <title>Formulario de Historia Clinica</title>
</head>
<body>

    <div id="content" class="container">
        <div style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">HISTORIA CLINICA</h3>
        <h6 style="text-align: center">{{($hc_formulario->created_at)->format('d/m/Y') }}</h6>
        <hr>
        <!-- DATOS EMPRESA -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>DATOS DE LA EMPRESA</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
              <th colspan="2">Razón Social: </th>
              <td colspan="3" style="text-align: left">{{$hc_formulario->voucher->paciente->origen->definicion}}</td>
              <th colspan="1">CUIT: </th>
              <td colspan="2" style="text-align: left">{{$hc_formulario->voucher->paciente->origen->cuit}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th width="10%">Domicilio: </th>
                <td colspan="2" width="40%" style="text-align: left">{{$hc_formulario->voucher->paciente->origen->domicilio->direccion}}</td>
            </tr>
        </table>

        <!-- DATOS PERSONALES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>DATOS DEL TRABAJADOR</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
              <th colspan="3">Apellidos y Nombres: </th>
              <td colspan="2" style="text-align: left">{{$hc_formulario->voucher->paciente->nombreCompleto()}}</td>
              <th colspan="2">Fecha de nacimiento</th>
              <td colspan="2" style="text-align: left">{{Carbon\Carbon::parse($hc_formulario->voucher->paciente->fecha_nacimiento)->format('d/m/Y') }} ({{Carbon\Carbon::parse($hc_formulario->voucher->paciente->fecha_nacimiento)->age }} años)</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="3" >Documento: </th>
                <td colspan="2" style="text-align: left">{{$hc_formulario->voucher->paciente->documentoIdentidad() }}</td>
                <th>CUIL: </th>
                <td style="text-align: left">{{$hc_formulario->voucher->paciente->cuil }}</td>
                <th>Sexo: </th>
                <td style="text-align: left">{{$hc_formulario->voucher->paciente->sexo->abreviatura }}</td>
            </tr>
        </table>

        <!-- EXAMEN CLÌNICO -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>EXAMEN CLÍNICO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
            <th colspan="">Estatura: </th>
            <td colspan="" style="text-align: left">{{$hc_formulario->examenClinico->estatura}}</td>
            <th colspan="">Peso:</th>
            <td colspan="" style="text-align: left">{{$hc_formulario->examenClinico->peso}}</td>
            <th colspan="">Sobrepeso:</th>
            <td colspan="" style="text-align: left">
                @if ($hc_formulario->examenClinico->sobrepeso==true)
                    SI
                @else
                    NO
                @endif</td>
            <th colspan="">IMC:</th>
            <td colspan="" style="text-align: left">{{$hc_formulario->examenClinico->imc}}</td>
            <th colspan="">Medicación Act.:</th>
            <td colspan="" style="text-align: left">{{$hc_formulario->examenClinico->medicacion_actual}}</td>
            </tr>
        </table>

        <!-- CARDIOVASCULAR -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>CARDIOVASCULAR</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
            <th style="width: 30%">Frecuencia Cardíaca: </th>
            <td style="text-align: left; width:15%">{{$hc_formulario->cardiovascular->frecuencia_cardiaca}}</td>
            <th style="width: 30%">Tensión Arterial:</th>
            <td  style="text-align: left; width:5%">
            @if ($hc_formulario->cardiovascular->tension_arterial==true)
                    S
                @else
                    D
                @endif</td>
            <th style="width: 10%">Pulso</th>
            <td style="text-align: left; width:10%">
                @if ($hc_formulario->cardiovascular->pulso==true)
                    N
                @else
                    A
                @endif</td>
            </tr>
            <tr style="text-align: left" valign="middle">
            <th style="width:45%">Varices:</th>
            <td style="text-align: left; width:5%">
                @if ($hc_formulario->cardiovascular->varices==true)
                        Si
                    @else
                        No
                    @endif</td>
            <th style="width:30%">Tipo</th>
            <td style="text-align: left; width:50%">{{$hc_formulario->cardiovascular->observacion_varices}}</td>
            </tr>
        </table>

        <!-- PIEL-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>PIEL</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
            <th colspan="3">¿Cicatrices patológicas visibles?</th>
            <td colspan="1" style="text-align: left">
            @if ($hc_formulario->piel->pregunta1_piel==true)
                    Si
                @else
                    No
                @endif</td>
            <th colspan="1">Obs.:</th>
            <td colspan="5" style="text-align: left">{{$hc_formulario->piel->observacion1_piel}}</td>

            </tr>
            <tr style="text-align: left" valign="middle">
            <th style="width: 10%">Vesiculas</th>
            <td  style="text-align: left; width:5%">
            @if ($hc_formulario->piel->vesicula==true)
                    Si
                @else
                    No
                @endif</td>
            <th style="width: 5%">Obs.:</th>
            <td  style="text-align: left; width:30%">{{$hc_formulario->piel->obs_vesicula}}</td>
            <th style="width: 5%"> Ulceras</th>
            <td  style="text-align: left; width:5%">
            @if ($hc_formulario->piel->ulceras==true)
                    Si
                @else
                    No
                @endif</td>
            <th style="width: 5%">Obs.:</th>
            <td  style="text-align: left; width:35%">{{$hc_formulario->piel->obs_ulceras}}</td>
            </tr>

            <tr style="text-align: left" valign="middle">
            <th style="width: 10%"> Fisuras</th>
                <td style="text-align: left; width:5%">
                @if ($hc_formulario->piel->fisuras==true)
                        Si
                    @else
                        No
                    @endif</td>
                <th style="width: 5%">Obs.:</th>
                <td style="text-align: left; width:30%">{{$hc_formulario->piel->obs_fisuras}}</td>
                <th style="width: 10%"> Prurito</th>
                <td style="text-align: left; width:5%">
                @if ($hc_formulario->piel->prurito==true)
                        Si
                    @else
                        No
                    @endif</td>
                <th style="width: 5%">Obs.:</th>
                <td style="text-align: left; width:35%">{{$hc_formulario->piel->obs_prurito}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 10%"> Eczemas</th>
                    <td style="text-align: left; width:5%">
                    @if ($hc_formulario->piel->eczemas==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <th style="width: 5%">Obs.:</th>
                    <td style="text-align: left; width:30%">>{{$hc_formulario->piel->obs_eczemas}}</td>
                    <th style="width: 10%"> Dermatitis</th>
                    <td style="text-align: left; width:5%">
                    @if ($hc_formulario->piel->dermatitis==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <th style="width: 5%">Obs.:</th>
                    <td style="text-align: left; width:35%">{{$hc_formulario->piel->obs_dermatitis}}</td>
                </tr>
                <tr style="text-align: left" valign="middle">
                    <th style="width: 10%"> Eritemas</th>
                    <td style="text-align: left; width:5%">
                    @if ($hc_formulario->piel->eritemas==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <th style="width: 5%">Obs.:</th>
                    <td style="text-align: left; width:30%">{{$hc_formulario->piel->obs_eritemas}}</td>
                    <th style="width: 10%"> Petequias</th>
                    <td style="text-align: left; width:5%">
                    @if ($hc_formulario->piel->petequias==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <th style="width: 5%">Obs.:</th>
                    <td  style="text-align: left; width:35%">{{$hc_formulario->piel->obs_petequias}}</td>
                </tr>
                <tr style="text-align: left" valign="middle">
                    <th colspan="4">Tejido Celular Subcutáneo</th>
                    <td style="text-align: left">{{$hc_formulario->piel->tejido}}</td>
                </tr>
        </table>

        <!-- OSTEOARTICULAR-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>OSTEOARTICULAR</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="3">limitaciones Funcionales</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->osteoarticular->pregunta1_os==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->osteoarticular->observacion1_os}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="3">Amputaciones</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->osteoarticular->pregunta2_os==true)
                            Si
                        @else
                            No
                        @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->osteoarticular->observacion2_os}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="3"> Movilidad y Reflejos</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->osteoarticular->pregunta3_os==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->osteoarticular->observacion3_os}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="3">Tonicidad y Fuerza Muscular Normal</th>
                <td colspan="1" style=" text-align: left">
                @if ($hc_formulario->osteoarticular->pregunta4_os==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->osteoarticular->observacion4_os}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->osteoarticular->observacion_os}}</td>
            </tr>
        </table>

        <!-- COLUMNA VERTEBRAL-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>COLUMNA VERTEBRAL</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Examen Normal</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->columna->pregunta1_col==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->columna->observacion1_col}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Contracturas</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->columna->pregunta2_col==true)
                            Si
                        @else
                            No
                        @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->columna->observacion2_col}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Puntos Dolorosos</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->columna->pregunta3_col==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->columna->observacion3_col}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Limitaciones Funcionales</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->columna->pregunta4_col==true)
                        Si
                    @else
                        No
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->columna->observacion4_col}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->columna->observacion_col}}</td>
            </tr>
        </table>

        <!--CABEZA Y CUELLO-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>CABEZA Y CUELLO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Cráneo</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->cabezaCuello->pregunta1_cc==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->cabezaCuello->observacion1_cc}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Cara</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->cabezaCuello->pregunta2_cc==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->cabezaCuello->observacion2_cc}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Nariz</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->cabezaCuello->pregunta3_cc==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->cabezaCuello->observacion3_cc}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Oídos</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->cabezaCuello->pregunta4_cc==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->cabezaCuello->observacion4_cc}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
            <th style="width: 20%">Boca</th>
            <td  style="width:5%; text-align: left">
            @if ($hc_formulario->cabezaCuello->pregunta5_cc==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
            <td  style="text-align: left; width:60%">{{$hc_formulario->cabezaCuello->observacion5_cc}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Cuello y Tiroides</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->cabezaCuello->pregunta6_cc==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->cabezaCuello->observacion6_cc}}</td>
            </tr>
        </table>

        <!--OFTALMOLOGICO-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>OFTALMOLOGICO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Cráneo</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta1_of==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->oftalmologico->observacion1_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Cara</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->oftalmologico->pregunta2_of==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->oftalmologico->observacion2_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Nariz</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta3_of==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->oftalmologico->observacion3_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Oídos</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta4_of==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->oftalmologico->observacion4_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Examen de Agudeza Visual</th>
                <th style="width: 20%">OJO DERECHO</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta5_of==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <th style="width: 20%">Valores</th>
                <td  style="text-align: left; width:60%">{{$hc_formulario->oftalmologico->observacion5_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">OJO IZQUIERDO</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta6_of==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <th style="width: 20%">Valores</th>
                <td  style="text-align: left; width:60%">{{$hc_formulario->oftalmologico->observacion6_of}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Usa Lentes</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->oftalmologico->pregunta7_of==true)
                    SI
                @else
                    NO
                @endif</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->oftalmologico->observacion_of}}</td>
            </tr>
        </table>



        <!--NEUROLOGICO-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>NEUROLOGICO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Motilidad Activa</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->neurologico->pregunta1_neu==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->neurologico->observacion1_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Motilidad Pasiva</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->neurologico->pregunta2_neu==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->neurologico->observacion2_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Sensibilidad</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->neurologico->pregunta3_neu==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->neurologico->observacion3_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Marcha</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->neurologico->pregunta4_neu==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->neurologico->observacion4_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
            <th style="width: 20%">Reflejos Osteotendinosos</th>
            <td  style="width:5%; text-align: left">
            @if ($hc_formulario->neurologico->pregunta5_neu==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
            <td  style="text-align: left; width:60%">{{$hc_formulario->neurologico->observacion5_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Pares Craneales</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->neurologico->pregunta6_neu==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->neurologico->observacion6_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Taxia</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->neurologico->pregunta7_neu==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->neurologico->observacion7_neu}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->neurologico->observacion_neu}}</td>
            </tr>
        </table>

        <!--ODONTOLOGICO-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ODONTOLOGICO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Encias y Mucosas</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->odontologico->pregunta1_od==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->odontologico->observacion1_od}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Esmalte Dental</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->odontologico->pregunta2_od==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->odontologico->observacion2_od}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Prótesis</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->odontologico->pregunta3_od==true)
                        SI
                    @else
                        NO
                    @endif</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Caries</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->odontologico->pregunta4_od==true)
                        SI
                    @else
                        NO
                    @endif</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Descripcion</th>
                <th style="width: 20%">Superior</th>
                    <td  style="text-align: left; width:60%">{{$hc_formulario->odontologico->superior}}</td>
                <th style="width: 20%">Inferior</th>
                    <td  style="text-align: left; width:60%">{{$hc_formulario->odontologico->inferior}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Faltan piezas dentales</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->odontologico->pregunta5_od==true)
                    SI
                @else
                    NO
                @endif</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->odontologico->observacion_od}}</td>
            </tr>
        </table>






        <!--TORAX Y APARATO RESPIRATORIO-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>TORAX Y APARATO RESPIRATORIO</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Caja Torácica</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->respitario->pregunta1_re==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->respitario->observacion1_re}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Pulmones</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->respitario->pregunta2_re==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->respitario->observacion2_re}}</td>
            </tr>
        </table>

        <!--ABDOMEN-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ABDOMEN</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Forma</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->abdomen->pregunta1_ab==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->abdomen->observacion1_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Hígado</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->abdomen->pregunta2_ab==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->abdomen->observacion2_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Bazo</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->abdomen->pregunta3_ab==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->abdomen->observacion3_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Colon</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->abdomen->pregunta4_ab==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->abdomen->observacion4_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
            <th style="width: 20%">Ruidos Hidroaéreos</th>
            <td  style="width:5%; text-align: left">
            @if ($hc_formulario->abdomen->pregunta5_ab==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
            <td  style="text-align: left; width:60%">{{$hc_formulario->abdomen->observacion5_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th style="width: 20%">Puño percusión</th>
                <td  style="width:5%; text-align: left">
                @if ($hc_formulario->abdomen->pregunta6_ab==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td  style="text-align: left; width:60%">{{$hc_formulario->abdomen->observacion6_ab}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">CICATRICES QUIRURGICAS:</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->abdomen->observacion_ab}}</td>
            </tr>
        </table>

        <!--REGIONES INGUINALES-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>REGIONES INGUINALES</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Tono de la pared posterior</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->regionInguinal->pregunta1_in==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->regionInguinal->observacion1_in}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Orificios Superficiales</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->regionInguinal->pregunta2_in==true)
                    NORMAL
                @else
                    ANORMAL
                @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->regionInguinal->observacion2_in}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="">Orificios Profundos</th>
                <td colspan="1" style="text-align: left">
                @if ($hc_formulario->regionInguinal->pregunta3_in==true)
                        NORMAL
                    @else
                        ANORMAL
                    @endif</td>
                <td colspan="5" style="text-align: left">{{$hc_formulario->regionInguinal->observacion3_in}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones:</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->regionInguinal->observacion_in}}</td>
            </tr>
        </table>

        <!--GENITALES-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>GENITALES</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Características</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->genital->pregunta1_ge==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <td colspan="5" style="text-align: left">{{$hc_formulario->genital->observacion1_ge}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->genital->observacion_ge}}</td>
            </tr>
        </table>

        <!--REGION ANAL-->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>REGION ANAL</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="">Características</th>
                <td colspan="1" style="text-align: left">
                    @if ($hc_formulario->regionAnal->pregunta1_an==true)
                            Si
                        @else
                            No
                        @endif</td>
                    <td colspan="5" style="text-align: left">{{$hc_formulario->regionAnal->observacion1_an}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="4">Observaciones</th>
                <td colspan="6" style="text-align: left">{{$hc_formulario->regionAnal->observacion_an}}</td>
            </tr>
        </table>
        <div class="page-break"></div>
        FORMULARIO
            <img height="50px" width="50px" src="{{$hc_formulario->voucher->paciente->imagen}}">        
    </div>
    <script src="{{public_path('js/jQuery-2.1.4.min.js')}}"></script>
 <!-- Bootstrap 3.3.5 -->
 <script src="{{ public_path('js/bootstrap.min.js') }}"></script>
   <!-- AdminLTE App -->
 <script src="{{public_path('js/app.min.js')}}"></script>
 <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 800, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
</body>
</html>