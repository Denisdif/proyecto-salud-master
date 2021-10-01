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
                    <!-- Hombro -->
                        <tr>
                            <th scope="row" rowspan="2">Hombro</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_hombro->abduccion_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->adduccion_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif

                            @if ($posiciones_forzada->articulacion_hombro->flexion_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->extension_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_hombro->rexterna_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->rinterna_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->irradiacion_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->alteracion_derecha_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_hombro->abduccion_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->adduccion_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif

                            @if ($posiciones_forzada->articulacion_hombro->flexion_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->extension_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_hombro->rexterna_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->rinterna_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->irradiacion_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_hombro->alteracion_izquierda_h)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Hombro -->
                    <!-- Codo -->
                        <tr>
                            <th scope="row" rowspan="2">Codo</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_codo->abduccion_derecha_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->adduccion_derecha_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif

                            @if ($posiciones_forzada->articulacion_codo->flexion_derecha_c    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->extension_derecha_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_codo->rexterna_derecha_c   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->rinterna_derecha_c   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->irradiacion_derecha_c)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->alteracion_derecha_c )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_codo->abduccion_izquierda_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->adduccion_izquierda_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif

                            @if ($posiciones_forzada->articulacion_codo->flexion_izquierda_c    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->extension_izquierda_c  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_codo->rexterna_izquierda_c   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->rinterna_izquierda_c   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->irradiacion_izquierda_c)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_codo->alteracion_izquierda_c )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Codo -->
                    <!-- Art. Muñeca -->
                        <tr>
                            <th scope="row" rowspan="2">Art. Muñeca</th>
                            <td>Der.</td>
                                @if ($posiciones_forzada->articulacion_muneca->abduccion_derecha_m  )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                
                                @if ($posiciones_forzada->articulacion_muneca->adduccion_derecha_m  )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            
                                @if ($posiciones_forzada->articulacion_muneca->flexion_derecha_m    )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                
                                @if ($posiciones_forzada->articulacion_muneca->extension_derecha_m  )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                @if ($posiciones_forzada->articulacion_muneca->rexterna_derecha_m   )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                
                                @if ($posiciones_forzada->articulacion_muneca->rinterna_derecha_m   )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                
                                @if ($posiciones_forzada->articulacion_muneca->irradiacion_derecha_m)
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                                
                                @if ($posiciones_forzada->articulacion_muneca->alteracion_derecha_m )
                                    <td style="text-align: center">x</td>
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_muneca->abduccion_izquierda_m   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_muneca->adduccion_izquierda_m   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_muneca->flexion_izquierda_m     )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_muneca->extension_izquierda_m   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_muneca->rexterna_izquierda_m    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_muneca->rinterna_izquierda_m    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_muneca->irradiacion_izquierda_m )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_muneca->alteracion_izquierda_m  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Art. Muñeca -->
                    <!-- Art. Mano y Dedo -->
                        <tr>
                            <th scope="row" rowspan="2">Art. Mano y Dedo</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_mano->abduccion_derecha_md  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->adduccion_derecha_md  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_mano->flexion_derecha_md    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->extension_derecha_md  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_mano->rexterna_derecha_md   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->rinterna_derecha_md   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->irradiacion_derecha_md)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->alteracion_derecha_md )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_mano->abduccion_izquierda_md   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->adduccion_izquierda_md   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_mano->flexion_izquierda_md     )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->extension_izquierda_md   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_mano->rexterna_izquierda_md    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->rinterna_izquierda_md    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->irradiacion_izquierda_md )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_mano->alteracion_izquierda_md  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Art. Mano y Dedo -->
                    <!-- Art. cadera -->
                        <tr>
                            <th scope="row" rowspan="2">Art. cadera</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_cadera->abduccion_derecha_cad      )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->adduccion_derecha_cad      )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_cadera->flexion_derecha_cad        )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->extension_derecha_cad      )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_cadera->rexterna_derecha_cad       )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->rinterna_derecha_cad       )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->irradiacion_derecha_cad    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->alteracion_derecha_cad     )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_cadera->abduccion_izquierda_cad   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->adduccion_izquierda_cad   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_cadera->flexion_izquierda_cad     )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->extension_izquierda_cad   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_cadera->rexterna_izquierda_cad    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->rinterna_izquierda_cad    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->irradiacion_izquierda_cad )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_cadera->alteracion_izquierda_cad  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Art. cadera -->
                    <!-- Art. Rodilla -->
                        <tr>
                            <th scope="row" rowspan="2">Art. Rodilla</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_rodilla->abduccion_derecha_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->adduccion_derecha_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_rodilla->flexion_derecha_rod    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->extension_derecha_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_rodilla->rexterna_derecha_rod   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->rinterna_derecha_rod   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->irradiacion_derecha_rod)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->alteracion_derecha_rod )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_rodilla->abduccion_izquierda_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->adduccion_izquierda_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_rodilla->flexion_izquierda_rod    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->extension_izquierda_rod  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_rodilla->rexterna_izquierda_rod   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->rinterna_izquierda_rod   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->irradiacion_izquierda_rod)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_rodilla->alteracion_izquierda_rod )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Art. Rodilla -->
                    <!-- Art. Tobillo -->
                        <tr>
                            <th scope="row" rowspan="2">Art. Tobillo</th>
                            <td>Der.</td>
                            @if ($posiciones_forzada->articulacion_tobillo->abduccion_derecha_t  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->adduccion_derecha_t  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_tobillo->flexion_derecha_t    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->extension_derecha_t  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_tobillo->rexterna_derecha_t   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->rinterna_derecha_t   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->irradiacion_derecha_t)
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->alteracion_derecha_t )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Izq.</td>
                            @if ($posiciones_forzada->articulacion_tobillo->abduccion_izquierda_t   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->adduccion_izquierda_t   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        
                            @if ($posiciones_forzada->articulacion_tobillo->flexion_izquierda_t     )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->extension_izquierda_t   )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            @if ($posiciones_forzada->articulacion_tobillo->rexterna_izquierda_t    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->rinterna_izquierda_t    )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->irradiacion_izquierda_t )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                            
                            @if ($posiciones_forzada->articulacion_tobillo->alteracion_izquierda_t  )
                                <td style="text-align: center">x</td>
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        </tr>
                    <!-- / Art. Tobillo -->
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