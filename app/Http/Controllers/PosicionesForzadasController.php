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

            //Tabla
                //Cada cuadro es representado por una posicion en el String
                $dolor_articular = "";
                for ($i=0; $i < 112; $i++) { 
                    $dolor_articular = $dolor_articular.$request->$i;
                }
                $posiciones_forzada->dolor_articular = $dolor_articular;
            //
            $posiciones_forzada->diagnostico = " ";
            $posiciones_forzada->save();

            //Tarea
                $tarea=new Tarea();
                $tarea->tiempo=$request->tiempo;
                $tarea->ciclo=$request->ciclo;
                $tarea->cargas=$request->cargas;
                //Preguntas
                    if ($request->pregunta1) {
                        $tarea->pregunta1 = true;     
                    } else {
                        $tarea->pregunta1 = false;
                    }
                    if ($request->pregunta2) {
                        $tarea->pregunta2 = true;     
                    } else {
                        $tarea->pregunta2 = false;
                    }
                    if ($request->pregunta3) {
                        $tarea->pregunta3 = true;     
                    } else {
                        $tarea->pregunta3 = false;
                    }
                    if ($request->pregunta4) {
                        $tarea->pregunta4 = true;     
                    } else {
                        $tarea->pregunta4 = false;
                    }
                    if ($request->pregunta5) {
                        $tarea->pregunta5 = true;     
                    } else {
                        $tarea->pregunta5 = false;
                    }
                    if ($request->pregunta6) {
                        $tarea->pregunta6 = true;     
                    } else {
                        $tarea->pregunta6 = false;
                    }
                    if ($request->pregunta7) {
                        $tarea->pregunta7 = true;     
                    } else {
                        $tarea->pregunta7 = false;
                    }
                    if ($request->pregunta8) {
                        $tarea->pregunta8 = true;     
                    } else {
                        $tarea->pregunta8 = false;
                    }
                //    
                $tarea->observacion_tarea=$request->observacion_tarea;
                $tarea->posiciones_forzada_id=$posiciones_forzada->id;
                $tarea->save();
            //
            //Dolor
                $dolor=new Dolor();
                $dolor->forma=$request->forma;
                $dolor->evolucion=$request->evolucion;
                //preguntas
                    if ($request->pregunta1_d) {
                        $dolor->pregunta1_d = true;    
                    } else {
                        $dolor->pregunta1_d = false;
                    }
                    if ($request->pregunta2_d) {
                        $dolor->pregunta2_d = true;    
                    } else {
                        $dolor->pregunta2_d = false;
                    }
                    if ($request->pregunta3_d) {
                        $dolor->pregunta3_d = true;    
                    } else {
                        $dolor->pregunta3_d = false;
                    }
                    if ($request->pregunta4_d) {
                        $dolor->pregunta4_d = true;    
                    } else {
                        $dolor->pregunta4_d = false;
                    }
                    if ($request->pregunta5_d) {
                        $dolor->pregunta5_d = true;    
                    } else {
                        $dolor->pregunta5_d = false;
                    }
                //
                $dolor->observacion1_d=$request->observacion1_d;
                $dolor->observacion2_d=$request->observacion2_d;
                $dolor->posiciones_forzada_id=$posiciones_forzada->id;
                $dolor->save();
            //
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
