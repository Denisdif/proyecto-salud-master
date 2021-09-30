<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="styles.css">

    <title>POSICIONES FORZADAS</title>
</head>
<body>
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">POSICIONES FORZADAS</h3>

        <!-- Datos de PF -->
            Empresa:        {{$posiciones_forzada->voucher->paciente->origen->definicion         }} <br>
            CUIT:           {{$posiciones_forzada->voucher->paciente->origen->cuit               }} <br>
            Paciente:       {{$posiciones_forzada->voucher->paciente->nombreCompleto()           }} <br>
            DNI:            {{$posiciones_forzada->voucher->paciente->cuil                       }} <br>
            Puesto:         {{$posiciones_forzada->puesto                                        }} <br>
            Antigüedad:     {{$posiciones_forzada->antiguedad                                    }} <br>
            Nro de trabajo: {{$posiciones_forzada->nroTrabajo                                    }} <br>
        <!-- / Datos de PF -->

        <!-- Tarea -->
            @if ($posiciones_forzada->tarea != null)

            <!-- Tiempo -->
                <br> Tiempo de tarea:
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
            <!-- / Tiempo -->
            <!-- Ciclo -->
                <br> Ciclo de trabajo:
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
            <!-- / Ciclo -->
            <!-- Cargas -->
                <br> Manipulación manual de cargas: 
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
                <br>
            <!-- / Cargas -->
            <!-- Tipos de tarea -->

                Tipos de tareas: 
                @if ($posiciones_forzada->tarea->pregunta1)
                    Movimiento de alcance repetidos por encima del hombro <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta2)
                    Movimiento de extensión o flexión forzados de muñeca <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta3)
                    Flexión sostenida de columna <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta4)
                    Flexión extrema del codo <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta5)
                    El cuello se mantiene flexionado <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta6)
                    Giros de columna <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta7)
                    Rotación extrema del antebrazo <br>
                @endif
                @if ($posiciones_forzada->tarea->pregunta8)
                    Flexión mantenida de dedos <br>
                @endif
                @if ($posiciones_forzada->tarea->observacion_tarea != null)
                    {{$posiciones_forzada->tarea->observacion_tarea }} 
                @endif

            <!-- / Tipos de tarea -->

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
        <!-- / Tabla -->

        <!-- Dolor -->
            @if ($posiciones_forzada->dolor != null)

                <!-- Forma -->
                    <br> Por su forma de aparición:
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
                <!-- / Forma -->
                <!-- Evolucion --> 
                    <br> Por su evolución: 
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
                <!-- / Evolucion -->
                <!-- Signos --> 
                    <br> Otros Signos y Síntomas Presentes en el Segmento Involucrado:
                    @if ($posiciones_forzada->dolor->pregunta1_d)
                        <br> Calambres musculares
                    @endif
                    @if ($posiciones_forzada->dolor->pregunta2_d)
                        <br> Parestesias
                    @endif
                    @if ($posiciones_forzada->dolor->pregunta3_d)
                        <br> Calor
                    @endif
                    @if ($posiciones_forzada->dolor->pregunta4_d)
                        <br> Cambios de coloración de la piel
                    @endif
                    @if ($posiciones_forzada->dolor->pregunta5_d)
                        <br> Tumefacción
                    @endif
                <!-- / Signos -->
                <!-- Puntos -->
                    <br> Puntos dolorosos:   {{$posiciones_forzada->dolor->observacion1_d    }}
                <!-- / Puntos -->
                <!-- Localización -->
                    <br>Localización:       {{$posiciones_forzada->dolor->observacion2_d    }} 
                <!-- / Localización -->
            @endif
        <!-- / Dolor -->

        <!-- Semiológica -->
            @if ($posiciones_forzada->semiologica != null)
            <!-- Grado -->    
                <br> Grado: (Mostrar grados de referencia)
                @switch($posiciones_forzada->semiologica->grado)
                    @case("opcion1_s")
                        0: Ausencia de signos y síntomas                             
                        @break
                    @case("opcion2_s")
                        1: Dolor en reposo y/o existencia de sintomatología sugestiva
                        @break
                    @case("opcion3_s")
                        2: Grado 1 mas contractura y/o dolor a la movilización          
                        @break
                    @case("opcion4_s")
                        3: Grado 2 mas dolor a la palpación y/o percusión                 
                        @break
                    @case("opcion5_s")
                        4: Grado 3 mas limitación funcional evidente clínicamente        
                        @break
                    @default
                        No se selecciono ninguna opción
                @endswitch
            <!-- / Grado -->
            <!-- Observación -->
                <br> Observaciones: {{$posiciones_forzada->semiologica->observacion1_s   }} <br>
            <!-- / Observación -->    
            @endif
        <!-- / Semiológica -->
    </div>

</body>
</html>

        <!-- Firma
        Firma:          {{$posiciones_forzada->firma        }} <br>


    */