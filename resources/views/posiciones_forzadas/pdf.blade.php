<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .tabla {
            border-collapse: collapse;
        }
        .tabla th, .tabla td {
            border: rgb(0, 0, 0) 1px solid;
        }
        tbody td {
            text-align: center;
        }
        tfoot th {
            text-align: right;
        }
        .letra11{ 
            font-size: 10px;
        }
        .subtitulo{
            font-weight: bold;
            text-decoration: underline;
            font-size: 10px;
        }
        label{
            font-weight: bold;
        }
        .hidden{
            display: none;
        }

    </style>

    <title>POSICIONES FORZADAS</title>
</head>
<body style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">Cuestionario Direccionado <br>
            Agente de Riesgo: Gestos repetitivos y posiciones forzadas <br>
            Anexo V – Resolución SRT N° 37/2010 
        </h3>

        <!-- Datos de PF -->
            <table class="letra11">
                <tbody>
                    <tr>
                        <td style="text-align: left; width: 350px">
                           <label for=""> Empresa:                   </label>    
                               {{$posiciones_forzada->voucher->paciente->origen->definicion }}  
                        </td>
                        <td style="text-align: left; width: 350px">
                           <label for=""> CUIT:                      </label>    
                               {{$posiciones_forzada->voucher->paciente->origen->cuit       }}  
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; width: 350px">
                           <label for=""> Paciente:                  </label>    
                               {{$posiciones_forzada->voucher->paciente->nombreCompleto()   }}  
                        </td>
                        <td style="text-align: left; width: 350px">
                           <label for=""> CUIL:                      </label>    
                               {{$posiciones_forzada->voucher->paciente->cuil               }}  
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; width: 350px">
                           <label for=""> Puesto:                    </label>    
                               {{$posiciones_forzada->puesto                                }}      
                        </td>
                        <td style="text-align: left; width: 350px">
                           <label for=""> Antigüedad:                </label>    
                               {{$posiciones_forzada->antiguedad                            }}      
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left; width: 350px">
                           <label for=""> Nº Horas/ días de trabajo: </label>    
                               {{$posiciones_forzada->nroTrabajo                            }}  
                        </td>
                    </tr>
                </tbody>
            </table>
        <!-- / Datos de PF -->
        <hr>
        <!-- Tarea -->
            @if ($posiciones_forzada->tarea != null)
                <table class="letra11">
                    <tbody>
                        <!-- Tiempo -->
                        <tr>
                            <td style="text-align: left; width: 350px">
                                <label for="">Tiempo de tarea:</label>                                
                                @switch($posiciones_forzada->tarea->tiempo)
                                    @case("opcion1")
                                        Esporádico.
                                        @break
                                    @case("opcion2")
                                        Continuo, mayor a 2hs y menor a 4hs.
                                        @break
                                    @case("opcion3")
                                        Continuo, mayor a 4hs.        
                                        @break
                                    @default
                                        No se selecciono ninguna opción
                                @endswitch
                            </td>
                            <!-- Ciclo -->

                            <td style="text-align: left; width: 350px">
                                <label for="">Ciclo de trabajo:</label> 
                                @switch($posiciones_forzada->tarea->ciclo )
                                    @case("opcion4")
                                        Largo (Mayor que 2 minutos)                        
                                        @break
                                    @case("opcion5")
                                        Moderado: 30 segundos - 1 a 2 minutos
                                        @break
                                    @case("opcion6")
                                        Corto: hasta 30 segundos                  
                                        @break
                                    @default
                                        No se selecciono ninguna opción
                                @endswitch
                            </td>
                        </tr>
                        <!-- Cargas -->
                        <tr>
                            <td style="text-align: left; width: 350px">
                                <label for=""> Manipulación manual de cargas:  </label>
                                @switch($posiciones_forzada->tarea->cargas )
                                    @case("opcion7")
                                        Menor a 1 Kg            
                                        @break
                                    @case("opcion8")
                                        Entre 1 Kg y 3 Kgs
                                        @break
                                    @case("opcion9")
                                        Mayor a 3 Kgs     
                                        @break
                                    @default
                                        No se cargó ninguna opción
                                @endswitch
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            <!-- Tipos de tarea -->
                <table class="letra11">
                    <tbody>
                        <tr >
                            <td colspan="4" style="text-align: left; ">
                                <p class="subtitulo">Tipo de tareas</p>
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: left; width: 315px">
                                    Movimiento de alcance repetidos por encima del hombro
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta1)
                                    X
                                @endif
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta2)
                                    X
                                @endif
                            </td>
                            <td  style="text-align: left; width: 315px">
                                    Movimiento de extensión o flexión forzados de muñeca
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: left; width: 315px">
                                    Flexión sostenida de columna
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta3)
                                    X
                                @endif
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta4)
                                    X
                                @endif
                            </td>
                            <td  style="text-align: left; width: 315px">
                                    Flexión extrema del codo 
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: left; width: 315px">
                                    El cuello se mantiene flexionado
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta5)
                                    X
                                @endif
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta6)
                                    X
                                @endif
                            </td>
                            <td  style="text-align: left; width: 315px">
                                    Giros de columna 
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: left; width: 315px">
                                    Rotación extrema del antebrazo
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta7)
                                    X
                                @endif
                            </td>
                            <td style="width: 25px; border: rgb(0, 0, 0) 1px solid;">
                                @if ($posiciones_forzada->tarea->pregunta8)
                                    X
                                @endif
                            </td>
                            <td  style="text-align: left; width: 315px">
                                    Flexión mantenida de dedos
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left">
                                @if ($posiciones_forzada->tarea->observacion_tarea != null)
                                    Otros: {{$posiciones_forzada->tarea->observacion_tarea }} 
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

            <!-- / Tipos de tarea -->
            @endif
        <!-- / Tarea -->
        <hr>
        <!-- Tabla -->
            <p class="subtitulo">Semiología del Segmento Corporal Comprometido - Relación Movilidad – Dolor Articular y estado de masa muscular relacionada: </p>
            <div style="padding-left: 5%; padding-top: 1%" >
                <table class="tabla" style="font-size: 10px">
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
        <hr>
        <!-- Dolor -->
            @if ($posiciones_forzada->dolor != null)
            <p class="subtitulo">Características del Dolor</p>
            <table class="letra11">
                <tbody>
                    <!-- Forma -->
                    <tr>
                        <td style="text-align: left; width: 350px">
                              <label for="">Por su forma de aparición:</label>
                              @switch($posiciones_forzada->dolor->forma)
                                    @case("opcion1_d")
                                        Agudo          
                                        @break
                                    @case("opcion2_d")
                                        Insidioso
                                        @break
                                    @case("opcion3_d")
                                        Ausente
                                        @break
                                    @default
                                        No se selecciono ninguna opción
                                @endswitch
                        </td>
                        <td style="text-align: left; width: 350px">
                            <label for=""> Por su evolución:  </label>
                            @switch($posiciones_forzada->dolor->evolucion)
                                @case("opcion4_d")
                                    Continuo      
                                    @break
                                @case("opcion5_d")
                                    Brotes
                                    @break
                                @case("opcion6_d")
                                    Cíclico
                                    @break
                                @default
                                    No se selecciono ninguna opción
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; width: 350px">
                           <label for=""> Puntos dolorosos:    </label> {{$posiciones_forzada->dolor->observacion1_d    }}
                        </td>
                        <td style="text-align: left; width: 350px">
                            <label for=""> Localización:         </label> {{$posiciones_forzada->dolor->observacion2_d    }} 
                         </td>
                    </tr>
                    <tr>
                        <td  style="text-align: left; width: 350px">
                            <p class="subtitulo"> Otros Signos y Síntomas Presentes en el Segmento Involucrado:  </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 style="text-align: left; width: 100px">
                            @if ($posiciones_forzada->dolor->pregunta1_d)
                                Calambres musculares.
                            @endif
                            @if ($posiciones_forzada->dolor->pregunta2_d)
                                Parestesias.
                            @endif
                            @if ($posiciones_forzada->dolor->pregunta3_d)
                                Calor.
                            @endif
                            @if ($posiciones_forzada->dolor->pregunta4_d)
                                Cambios de coloración de la piel.
                            @endif
                            @if ($posiciones_forzada->dolor->pregunta5_d)
                                Tumefacción.
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        <!-- / Dolor -->
        <hr>
        <!-- Semiológica -->
            @if ($posiciones_forzada->semiologica != null)
                <p class="subtitulo">Caracterización Semiológica: </p>
                <table class="tabla letra11">
                    <tbody>
                        <tr>
                            <td style="text-align: left; width: 100px">
                                Grado 0
                            </td>
                            <td style="text-align:centert; width: 25px">
                            @if ($posiciones_forzada->semiologica->grado == "opcion1_s")
                                x
                            @endif
                            </td>
                            <td style="text-align: left; width: 500px">
                                Ausencia de signos y síntomas     
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 100px">
                                Grado 1
                            </td>
                            <td style="text-align: center; width: 25px">
                                @if ($posiciones_forzada->semiologica->grado == "opcion2_s")
                                x
                                @endif
                            </td>
                            <td style="text-align: left; width: 500px">
                                Dolor en reposo y/o existencia de sintomatologia sugestiva   
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 100px">
                                Grado 2
                            </td>
                            <td style="text-align: center; width: 25px">
                                @if ($posiciones_forzada->semiologica->grado == "opcion3_s")
                                x
                                @endif
                            </td>
                            <td style="text-align: left; width: 500px">
                                Grado 1 mas contrac tura y/o dolor a la movilizacion
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 100px">
                                Grado 3
                            </td>
                            <td style="text-align: center; width: 25px">
                                @if ($posiciones_forzada->semiologica->grado == "opcion4_s")
                                x
                                @endif
                            </td>
                            <td style="text-align: left; width: 500px">
                                Grado 2 mas dolor a la palpación y/o percusiòn
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 100px">
                                Grado 4
                            </td>
                            <td style="text-align: center; width: 25px">
                                @if ($posiciones_forzada->semiologica->grado == "opcion5_s")
                                x
                                @endif
                            </td>
                            <td style="text-align: left; width: 500px">
                                Grado 3 mas limitacion funcional evidente clinicamente
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Observación -->
                <div class="letra11" style="padding-top: 1%">
                    <label  for="">Observaciones:</label> {{$posiciones_forzada->semiologica->observacion1_s   }}
                </div>
            @endif
        <!-- / Semiológica -->
    </div>

</body>
</html>
<!-- Codigo para reutilizar
        Firma:          {{$posiciones_forzada->firma        }} <br>


    */

    
        <table>
            <tbody>
                <tr>
                    <td style="text-align: left; width: 350px">
                          
                    </td>
                    <td style="text-align: left; width: 350px">
                       
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left; width: 350px">
                       
                    </td>
                </tr>
            </tbody>
        </table>

     Salto de pagina 
                <hr style="
                    page-break-after: always;
                    border: none;
                    margin: 0;
                    padding: 0;
                ">
         / Salto de pagina -->