<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <title>POSICIONES FORZADAS</title>
</head>
<body>
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">POSICIONES FORZADAS</h3>

        <!-- Datos de PF -->
            Codigo:         {{$posiciones_forzada->codigo       }} <br>
            Puesto:         {{$posiciones_forzada->puesto       }} <br>
            Antigüedad:     {{$posiciones_forzada->antiguedad   }} <br>
            Nro de trabajo: {{$posiciones_forzada->nroTrabajo   }} <br>
            User_id:        {{$posiciones_forzada->user_id      }} <br>
            Paciente_id:    {{$posiciones_forzada->paciente_id  }} <br>
        <!-- / Datos de PF -->

        <!-- Tarea -->
            @if ($posiciones_forzada->tarea != null)
                Tiempo:          {{$posiciones_forzada->tarea->tiempo }} <br>
                Ciclo:           {{$posiciones_forzada->tarea->ciclo }} <br>
                Observación:     {{$posiciones_forzada->tarea->observacion_tarea }} <br>
                pregunta 1:      {{$posiciones_forzada->tarea->pregunta1 }} <br>
                pregunta 2:      {{$posiciones_forzada->tarea->pregunta2 }} <br>
                pregunta 3:      {{$posiciones_forzada->tarea->pregunta3 }} <br>
                pregunta 4:      {{$posiciones_forzada->tarea->pregunta4 }} <br>
                pregunta 5:      {{$posiciones_forzada->tarea->pregunta5 }} <br>
                pregunta 6:      {{$posiciones_forzada->tarea->pregunta6 }} <br>
                pregunta 7:      {{$posiciones_forzada->tarea->pregunta7 }} <br>
                pregunta 8:      {{$posiciones_forzada->tarea->pregunta8 }} <br>
            @endif
        <!-- / Tarea -->

        <!-- Salto de pagina -->
            <hr style="
                page-break-after: always;
                border: none;
                margin: 0;
                padding: 0;
            ">
        <!-- / Salto de pagina -->

        <!-- Tabla -->
            <table class="table table-bordered">
                <!-- Titulos -->
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">Articulación</th>
                            <th scope="col">Abduc.</th>
                            <th scope="col">Adduc.</th>
                            <th scope="col">Flexión</th>
                            <th scope="col">Extens.</th>
                            <th scope="col">Rot. Externa</th>
                            <th scope="col">Rot. Interna</th>
                            <th scope="col">Irradiac.</th>
                            <th scope="col">Alt. M. Muscular</th>
                        </tr>
                    </thead>
                <!-- / Titulos -->
                <tbody>
                <!-- Hombro -->
                    <tr>
                        <th scope="row" rowspan="2">Hombro</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Hombro -->
                <!-- Codo -->
                    <tr>
                        <th scope="row" rowspan="2">Codo</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Codo -->
                <!-- Art. Muñeca -->
                    <tr>
                        <th scope="row" rowspan="2">Art. Muñeca</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Art. Muñeca -->
                <!-- Art. Mano y Dedo -->
                    <tr>
                        <th scope="row" rowspan="2">Art. Mano y Dedo</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Art. Mano y Dedo -->
                <!-- Art. cadera -->
                    <tr>
                        <th scope="row" rowspan="2">Art. cadera</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Art. cadera -->
                <!-- Art. Rodilla -->
                    <tr>
                        <th scope="row" rowspan="2">Art. Rodilla</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Art. Rodilla -->
                <!-- Art. Tobillo -->
                    <tr>
                        <th scope="row" rowspan="2">Art. Tobillo</th>
                        <td>Der.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                    <tr>
                        <td>Izq.</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                        <td style="text-align: center">x</td>
                    </tr>
                <!-- / Art. Tobillo -->
                </tbody>
            </table>
        <!-- / Tabla -->

        <!-- Dolor -->
            @if ($posiciones_forzada->dolor != null)
                forma         :    {{$posiciones_forzada->dolor->forma             }} <br>
                evolucion     :    {{$posiciones_forzada->dolor->evolucion         }} <br>
                pregunta1_d   :    {{$posiciones_forzada->dolor->pregunta1_d       }} <br>
                pregunta2_d   :    {{$posiciones_forzada->dolor->pregunta2_d       }} <br> 
                pregunta3_d   :    {{$posiciones_forzada->dolor->pregunta3_d       }} <br>
                pregunta4_d   :    {{$posiciones_forzada->dolor->pregunta4_d       }} <br>
                pregunta5_d   :    {{$posiciones_forzada->dolor->pregunta5_d       }} <br>
                observacion1_d:    {{$posiciones_forzada->dolor->observacion1_d    }} <br>
                observacion2_d:    {{$posiciones_forzada->dolor->observacion2_d    }} <br>
            @endif
        <!-- / Dolor -->

        <!-- Semiológica -->
            @if ($posiciones_forzada->semiologica != null)
                Grado:       {{$posiciones_forzada->semiologica->grado            }} <br>
                Observación: {{$posiciones_forzada->semiologica->observacion1_s   }} <br>
            @else
                Grado: <br>
                Observación: <br>
            @endif
        <!-- / Semiológica -->
    </div>

</body>
</html>

        <!-- Firma
        Firma:          {{$posiciones_forzada->firma        }} <br>-->