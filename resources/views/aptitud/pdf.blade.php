<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            border-bottom:  0.1px solid rgb(202, 202, 202);
            padding: 3px;
            font-size: 12px;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">INFORME MEDICO LABORAL</h3>
        <!-- DECLARACION DE RIESGOS -->
        <table class="table table-condensed table-hover" >
            <tr>
                <td style="text-align: center; background-color: brown; color: #FFFFFF;width: 710px" colspan="12">DECLARACION DE RIESGOS</td>
            </tr>
            @for ($i = 0; $i < strlen($voucher->aptitud->riesgos); $i++)
                @if ($voucher->aptitud->riesgos[$i] == "1")
                    <tr style="text-align: left;">
                        <td colspan="11">
                            {{$riesgos[$i]}}
                        </td>
                        <td colspan="1">
                            <label for="">Si</label>
                        </td>
                    </tr>
                @else
                    <tr style="text-align: left;">
                        <td colspan="11">
                            {{$riesgos[$i]}}
                        </td>
                        <td colspan="1">
                            <label for="">No</label>
                        </td>
                    </tr>
                @endif
            @endfor
        </table>
        <!-- RESULTADOS DE ESTUDIOS -->
        <table class="table table-condensed table-hover" >
            <tr>
                <td style="text-align: center; background-color: brown; color: #FFFFFF;width: 710px" colspan="12">RESULTADOS DE ESTUDIOS</td>
            </tr>
            <!-- Estudios por sistema -->
            @if ($voucher->historiaClinica)
                <tr>
                    <td colspan="12">
                        <label for="">HISTORIA CLINICA: </label>
                        {{$voucher->historiaClinica->diagnostico}}
                    </td>
                </tr>
            @endif
            @if ($voucher->declaracionJurada)
                <tr>
                    <td colspan="12">
                        <label for="">DECLARACION JURADA: </label>
                        {{$voucher->declaracionJurada->diagnostico}}
                    </td>
                </tr>
            @endif
            @if ($voucher->posicionesForzadas)
                <tr>
                    <td colspan="12">
                        <label for="">POSICIONES FORZADAS: </label>
                        {{$voucher->posicionesForzadas->diagnostico}}
                    </td>
                </tr>
            @endif
            @if ($voucher->iluminacionDireccionado)
                <tr>
                    <td colspan="12">
                        <label for="">ILUMINACION INSUFICIENTE: </label>
                        {{$voucher->iluminacionDireccionado->diagnostico}}
                    </td>
                </tr>
            @endif
            <!-- Estudios por cargar -->
            @foreach ($voucher->estudiosCargar() as $item)
                @if ($item->archivo_adjunto)
                    <tr>
                        <td colspan="12">
                            <label for="">{{$item->estudio->nombre}}: </label>
                            {{$item->archivo_adjunto->diagnostico}}
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <!-- APTITUD LABORAL -->
        <table class="table table-condensed table-hover" >
            <tr>
                <td style="text-align: center; background-color: brown; color: #FFFFFF;width: 710px" colspan="12">APTITUD LABORAL</td>
            </tr>
            <tr>
                <td colspan="12">
                    @if ($voucher->aptitud->preexistencias)
                        Con preexistencias
                    @else
                        Sin preexistencias
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    {{$voucher->aptitud->aptitud_laboral}}
                </td>
            </tr>
        </table>
        <!-- COMENTARIOS -->
        <table class="table table-condensed table-hover" >
            <tr>
                <td style="text-align: center; background-color: brown; color: #FFFFFF;width: 710px" colspan="12">COMENTARIOS SOBRE PATOLOGIAS NO RELACIONADAS CON EL TRABAJO</td>
            </tr>
            <tr>
                <td colspan="12">
                    @if ($voucher->aptitud->comentarios)
                        {{$voucher->aptitud->comentarios}}
                    @else
                        Sin comentarios.
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>
</html>