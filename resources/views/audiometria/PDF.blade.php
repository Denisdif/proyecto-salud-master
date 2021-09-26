<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <title>AUDIOMETRÍA</title>
</head>
<body>

    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">ESTUDIO FUNCIONAL DE LA AUDICIÓN</h3>

        Fecha: <br>

        <!-- Datos precargados -->
            <h4 style="">DATOS DE LA EMPRESA</h4>
            Razón social:                        {{$audiometria->voucher->paciente->origen->definicion}} <br>
            <h4 style="">DATOS DE LA TRABAJADOR</h4>
            Apellido y nombre:                   {{$audiometria->voucher->paciente->nombreCompleto()}} <br>
            Fecha Nacimiento:                    {{$audiometria->voucher->paciente->fecha_nacimiento()}} <br>
            CUIL-DNI:                            {{$audiometria->voucher->paciente->cuil}} <br>
            Ambiente <br>
            Puesto de trabajo<br>
            Antigüedad en la Empresa<br>
            Audiómetro utilizado<br>
        <!-- / Datos precargados -->
        <h4 style="text-align: center">ANTECEDENTES</h4>
        En su familia hay hipoacusicos:<br>
        Nota disminución en la audición:<br>
        Usa protectores auditivos:<br>
        Se los provee la empresa:<br>
        Trabajo con ruido anteriormente<br>
        ¿Tiene acufenos?<br>
        ¿En que oido?<br>
        <h4 style="text-align: center">AUDIOGRAMA</h4>
        TABLAS<br>
        <h4 style="text-align: center">CONCLUSIÓN</h4>
        
        Firmas<br>
    </div>

</body>
</html>