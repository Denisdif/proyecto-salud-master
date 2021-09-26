<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <title>ESPIROMETRIA</title>
</head>
<body>

    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">ESPIROMETRIA</h3>

        Fecha: <br>
        <!-- Datos precargados -->
        <h4 style="">DATOS DE LA EMPRESA</h4>
        Razón social:                        {{$espiriometria->voucher->paciente->origen->definicion}}  <br>
        <h4 style="">DATOS DE LA TRABAJADOR</h4>
        Apellido y nombre:                   {{$espiriometria->voucher->paciente->nombreCompleto()}}    <br>
        Fecha Nacimiento:                    {{$espiriometria->voucher->paciente->fecha_nacimiento()}}  <br>
        CUIL-DNI:                            {{$espiriometria->voucher->paciente->cuil}}                <br>
        Edad:                                {{$espiriometria->voucher->paciente->edad()}}              <br>
        Altura<br>
        Peso<br>
        <!-- / Datos precargados -->
        Oximetría<br>
        Satura al %<br>
        Frecuencia cardíaca<br>
        <h4 style="text-align: center">DECLARACIÓN JURADA</h4>
        Fumador<br>
        Exfumador<br>
        Cantidad<br>
        Antecedentes<br>
        Usa Broncodilatador<br>
        Problemas para realizar el estudio<br>
        Actualmente problemas respiratorios<br>
        Utiliza elementos de protección respiratoria<br>
        Observaciones<br>
        Firmas<br>
    </div>

</body>
</html>