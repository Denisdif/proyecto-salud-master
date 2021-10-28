<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Iluminación Insuficiente</title>

</head>
<body style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 class="titulo" style="text-align: center">Iluminación Insuficiente: Cuestionario Direccionado</h3>
        <div>
            <p> {{$iluminacion->voucher->paciente->nombreCompleto()}} </p>
        </div>
    </div>
</body>
</html>