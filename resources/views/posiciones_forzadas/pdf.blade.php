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

        Firma:          {{$posiciones_forzada->firma        }} <br>
        Codigo:         {{$posiciones_forzada->codigo       }} <br>
        Puesto:         {{$posiciones_forzada->puesto       }} <br>
        Antigüedad:     {{$posiciones_forzada->antiguedad   }} <br>
        Nro de trabajo: {{$posiciones_forzada->nroTrabajo   }} <br>
        User_id:        {{$posiciones_forzada->user_id      }} <br>
        Paciente_id:    {{$posiciones_forzada->paciente_id  }} <br>

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
                        <th scope="col">Irrad.</th>
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
    </div>

</body>
</html>