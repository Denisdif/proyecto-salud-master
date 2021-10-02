<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .marco{
            border: rgb(0, 0, 0) 1px solid;
        }
        .tabla {
            border-collapse: collapse;
            padding: 3%;
        }
        .titulo{
            background-color: red;
            color: white;
        }
        .subtitulo{
            font-weight: bold;
            font-size: 20px;
        }
        .campos{
            font-size: 10px;
            font-weight: bold;
        }
        .datos{
            font-size: 10px;
        }
    </style>

    <title>VOUCHER</title>
</head>
<body style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size: 10px;">

    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center; font-size: 25px;font-weight: bold;
        text-decoration: underline;">VOUCHER</h3>
           
    </div> 
    @foreach ($tipo_estudios as $tipo)
    <div hidden style="color: white">{{$i = -1}}</div>
        <label class="subtitulo" for=""> {{ $tipo->nombre}}</label>
        <div class="marco">
        <table class="tabla">
            <tbody>
                @foreach ($voucher->vouchersEstudios as $item)
                {{$cont++}}
                @if (($tipo->id == 3) || ($tipo->id == 6))
                    @if ($item->estudio->tipo_estudio_id == $tipo->id)
                        {{$i++}} 
                        @if ($i%3 == 0)
                            <tr>
                        @endif
                        <td style="width: 240px">{{strtoupper($item->estudio->nombre)}}.  </td>
                        @if ($i%3 == 2/3)
                            </tr>
                        @endif
                    @endif
                    @if ($cont == sizeof($voucher->vouchersEstudios))
                        </tr>
                    @endif
                @endif
                @endforeach
            </tbody>
        </table>
        </div>
    @endforeach
</body>
</html>