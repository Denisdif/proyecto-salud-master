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
        .hidden{
            display: none;
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
                        <u><label for="">HISTORIA CLINICA: </label></u><br>
                        @php
                            echo $diagnosticoH;
                        @endphp
                    </td>
                </tr>
            @endif
            @if ($voucher->declaracionJurada)
                <tr>
                    <td colspan="12">
                        <u><label for="">DECLARACION JURADA: </label></u><br>
                        @php
                            echo $diagnosticoD
                        @endphp
                    </td>
                </tr>
            @endif
            @if ($voucher->posicionesForzadas)
                <tr>
                    <td colspan="12">
                        <u><label for="">POSICIONES FORZADAS: </label></u><br>
                        @php
                            echo $diagnosticoP
                        @endphp
                    </td>
                </tr>
            </table>
            <!-- Tabla -->
                <table>
                    <tr>
                        <td><label for="">Semiología del Segmento Corporal Comprometido-Relación Movilidad-Dolor Articular y estado de M.M</label> </td>
                    </tr>
                </table>
                <div style="padding-left: 5%; padding-top: 1%" >
                    <table class="tabla" style="font-size: 12px">
                        <!-- Titulos -->
                            <thead>
                                <tr>
                                    <th  scope="col" colspan="2">Articulación</th>
                                    <th style="width: 60px">Abduc.</th>
                                    <th style="width: 60px">Adduc.</th>
                                    <th style="width: 60px">Flexión</th>
                                    <th style="width: 60px">Extens.</th>
                                    <th style="width: 60px">Rot. Externa</th>
                                    <th style="width: 60px">Rot. Interna</th>
                                    <th style="width: 60px">Irradiac.</th>
                                    <th style="width: 60px">Alt. M. Muscular</th>
                                </tr>
                            </thead>
                        <!-- / Titulos -->
                        <tbody>
                            @foreach ($articulaciones as $art)
                                <!-- Iteración izquierda o derecha -->
                                @for ($i = 0; $i < 2; $i++)
                                    @if ($i == 0)
                                    <tr>
                                        <th scope="row" rowspan="2">{{$art}}</th>
                                        <td>Der.</td>
                                    @else
                                    <tr>
                                        <td>Izq.</td>
                                    @endif
                                    <!-- Iteración por cada cuadro -->
                                    @for ($j = $cuadro; $j < $cuadro+8; $j++)
                                        @if ($posiciones_forzada->dolor_articular[$j])
                                            <td style="text-align: center">x</td>
                                        @else
                                            <td style="text-align: center"></td>
                                        @endif
                                    @endfor
                                    <div class="hidden"> {{$cuadro = $cuadro + 8}} </div>
                                </tr>
                                @endfor
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            <!-- / Tabla -->
            <table>
            @endif
            @if ($voucher->iluminacionDireccionado)
                <tr>
                    <td colspan="12">
                        <u><label for="">ILUMINACION INSUFICIENTE: </label></u><br>
                        @php
                            echo $diagnosticoI
                        @endphp
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