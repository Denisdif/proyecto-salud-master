<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paciente;
use App\PosicionesForzada;
use App\Dolor;
use App\Tarea;
use App\Semiologica;
use App\Voucher;
use PDF;
use Carbon\Carbon;

class PosicionesForzadasController extends Controller
{
    public function traerDatosPaciente(Request $request)
    {
        $paciente=Paciente::find($request->id);

        $retorno = [
            'nombres'           =>  $paciente->nombreCompleto(),
            'cuil'              =>  $paciente->cuil,
            'empresa'           =>  $paciente->empresa->razon_social,
        ];
        return response()->json($retorno);
    }

    public function index()
    {
        $posiciones_forzadas = PosicionesForzada::all();
        return view('posiciones_forzadas.index',compact('posiciones_forzadas'));
    }

    //cuando todo funcione probar con compact
    public function crearPDF($id)
    {
        $posiciones_forzada=PosicionesForzada::find($id);
        $articulaciones = ['Hombro','Codo','Muñeca','Mano y dedos','Cadera','Rodilla','Tobillo'];
        $cuadro = 0;
        $pdf = PDF::loadView('posiciones_forzadas.pdf',[
            "posiciones_forzada"   =>  $posiciones_forzada,
            "articulaciones"       =>  $articulaciones,
            "cuadro"               =>  $cuadro
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->stream('posiciones-forzada.pdf');
    }

    public function create($id)
    {
        $pacientes= Paciente::all();
        $voucher  = Voucher::find($id);
        $articulaciones = ['Hombro','Codo','Muñeca','Mano y dedos','Cadera','Rodilla','Tobillo'];
        $cuadro = 0;
        return view('posiciones_forzadas.create', compact('pacientes','articulaciones','voucher','cuadro'));
    }

    public function store(Request $request)
    {          
            $n=PosicionesForzada::count() + 1;
            $posiciones_forzada=new PosicionesForzada();
            $posiciones_forzada->firma=$request->firma;
            $posiciones_forzada->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
            $posiciones_forzada->puesto=$request->puesto;
            $posiciones_forzada->antiguedad=$request->antiguedad;
            $posiciones_forzada->nroTrabajo=$request->nroTrabajo;
            $posiciones_forzada->user_id=auth()->user()->id;
            $posiciones_forzada->voucher_id=$request->voucher_id;

            // Generación de Diagnóstico
                /* La generación deldiagnostico se realiza cargando dos arrays, uno con las etiquetas y otro con los atributos.
                Luego se procede a cargar sólo los atributos que fueron cargados cuando se generó el formulario*/
                $matriz = [];
                $diagnostico = "<b>TAREAS</b><br><br>";
                //Carga variables
                    $matriz[] = [       //TAREAS
                                        $request->tiempo,
                                        $request->ciclo,
                                        $request->cargas,

                                        //TIPO DE TAREAS
                                        ' ',
                                        $request->pregunta1,
                                        $request->pregunta2,
                                        $request->pregunta3,
                                        $request->pregunta4,
                                        $request->pregunta5,
                                        $request->pregunta6,
                                        $request->pregunta7,
                                        $request->pregunta8,
                                        $request->observacion_tarea,
                                        
                                        //DOLOR
                                        ' ',
                                        $request->forma,
                                        $request->evolucion,
                                        $request->pregunta1_d,
                                        $request->pregunta2_d,
                                        $request->pregunta3_d,
                                        $request->pregunta4_d,
                                        $request->pregunta5_d,
                                        $request->observacion1_d,
                                        $request->observacion2_d,
                                        
                                        //CARACTERIZACIÓN SEMIOLÓGICA
                                        ' ',
                                        $request->grado,
                                        $request->observacion1_s
                                    ];
                //
                //Carga Labels
                    $matriz[] = [  
                                    'Tiempo de Tarea: ',
                                    'Ciclo de trabajo: ',
                                    'Manipulación manual de cargas: ',

                                    '<br><b>TIPO DE TAREAS</b><br>',
                                    'Movimiento de alcance repetidos por encima del hombro',
                                    'Movimiento de extensión o flexión forzados de muñeca',
                                    'Flexión sostenida de columna',
                                    'Flexión extrema del codo',
                                    'El cuello se mantiene flexionado',
                                    'Giros de columna',
                                    'Rotación extrema del antebrazo',
                                    'Flexión mantenida de dedos',
                                    'Otros: ',

                                    '<br><b>DOLOR</b><br>',
                                    'Por su forma de aparición: ',
                                    'Por su evolución: ',
                                    'Calambres musculares',
                                    'Parestesias',
                                    'Calor',
                                    'Cambios de coloración de la piel',
                                    'Tumefacción',
                                    'Puntos dolorosos: ',
                                    'Localización: ',

                                    '<br><b>CARACTERIZACIÓN SEMIOLÓGICA</b><br>',
                                    'Grado: ',
                                    'Observación: ',
                        ];
                //
                //Carga de diagnostico
                for ($i=0; $i < sizeof($matriz[1]); $i++) {
                    if ($matriz[0][$i]) {
                        $diagnostico = $diagnostico.$matriz[1][$i].$matriz[0][$i]."<br>";
                    }
                };
            
            $posiciones_forzada->diagnostico = $diagnostico;

            //Tabla articulaciones
                //Cada cuadro es representado por una posicion en el String
                $dolor_articular = "";
                for ($i=0; $i < 112; $i++) { 
                    $dolor_articular = $dolor_articular.$request->$i;
                }
            $posiciones_forzada->dolor_articular = $dolor_articular;
            
            $posiciones_forzada->save();
            
            //Tablas secundarias
                //Tarea
                $tarea=new Tarea();
                $tarea->tiempo=$request->tiempo;
                $tarea->ciclo=$request->ciclo;
                $tarea->cargas=$request->cargas;
                $tarea->pregunta1 = $request->pregunta1;     
                $tarea->pregunta2 = $request->pregunta2;     
                $tarea->pregunta3 = $request->pregunta3;     
                $tarea->pregunta4 = $request->pregunta4;     
                $tarea->pregunta5 = $request->pregunta5;     
                $tarea->pregunta6 = $request->pregunta6;     
                $tarea->pregunta7 = $request->pregunta7;     
                $tarea->pregunta8 = $request->pregunta8;        
                $tarea->observacion_tarea=$request->observacion_tarea;
                $tarea->posiciones_forzada_id=$posiciones_forzada->id;
                $tarea->save();
                //Dolor
                $dolor=new Dolor();
                $dolor->forma = $request->forma;
                $dolor->evolucion = $request->evolucion;
                $dolor->pregunta1_d = $request->pregunta1_d;    
                $dolor->pregunta2_d = $request->pregunta2_d;    
                $dolor->pregunta3_d = $request->pregunta3_d;    
                $dolor->pregunta4_d = $request->pregunta4_d;    
                $dolor->pregunta5_d = $request->pregunta5_d;    
                $dolor->observacion1_d= $request->observacion1_d;
                $dolor->observacion2_d= $request->observacion2_d;
                $dolor->posiciones_forzada_id=$posiciones_forzada->id;
                $dolor->save();
                //Semiologica
                $semiologica=new Semiologica();
                $semiologica->grado=$request->grado;
                $semiologica->observacion1_s=$request->observacion1_s;
                $semiologica->posiciones_forzada_id=$posiciones_forzada->id;
                $semiologica->save();
            //
        return redirect()->route('posiciones_forzadas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
