<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paciente;
use App\PosicionesForzada;
use App\Dolor;
use App\Tarea;
use App\Semiologica;
use App\ArticulacionHombro;
use App\ArticulacionCodo;
use App\ArticulacionMuneca;
use App\ArticulacionManoDedo;
use App\ArticulacionCadera;
use App\ArticulacionRodilla;
use App\ArticulacionTobillo;


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

        
        $pdf = PDF::loadView('posiciones_forzadas.pdf',[
            "posiciones_forzada"   =>  $posiciones_forzada
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->stream('posiciones-forzada.pdf');

        /*
        $pdf = PDF::loadView('PDFs.espirometria',[
            "posiciones_forzada"   =>  $posiciones_forzada
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->stream('posiciones-forzada.pdf');*/

        /*        
        $pdf = PDF::loadView('PDFs.audiometria',[
            "posiciones_forzada"   =>  $posiciones_forzada
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->stream('posiciones-forzada.pdf');*/
        
    }


    public function create()
    {
        $pacientes=Paciente::all();
        return view('posiciones_forzadas.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
            
            $n=PosicionesForzada::count() + 1;

            //Creo una instancia de declaracion jurada
            $posiciones_forzada=new PosicionesForzada();
            $posiciones_forzada->firma=$request->firma;
            $posiciones_forzada->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
            $posiciones_forzada->puesto=$request->puesto;
            $posiciones_forzada->antiguedad=$request->antiguedad;
            $posiciones_forzada->nroTrabajo=$request->nroTrabajo;
            $posiciones_forzada->user_id=auth()->user()->id;
            $posiciones_forzada->paciente_id=$request->paciente_id;
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
            //Hombro
                $articulacion_hombro=new ArticulacionHombro();
                //Abduccion
                    if ($request->abduccion_derecha_h) {
                        $articulacion_hombro->abduccion_derecha_h=$request->abduccion_derecha_h;
                    } else {
                        $articulacion_hombro->abduccion_derecha_h=false;
                    }
                    if ($request->abduccion_izquierda_h) {
                        $articulacion_hombro->abduccion_izquierda_h=$request->abduccion_izquierda_h;
                    } else {
                        $articulacion_hombro->abduccion_izquierda_h=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_h) {
                        $articulacion_hombro->adduccion_derecha_h=$request->adduccion_derecha_h;
                    } else {
                        $articulacion_hombro->adduccion_derecha_h=false;
                    }
                    if ($request->adduccion_izquierda_h) {
                        $articulacion_hombro->adduccion_izquierda_h=$request->adduccion_izquierda_h;
                    } else {
                        $articulacion_hombro->adduccion_izquierda_h=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_h) {
                        $articulacion_hombro->flexion_derecha_h=$request->flexion_derecha_h;
                    } else {
                        $articulacion_hombro->flexion_derecha_h=false;
                    }
                    if ($request->flexion_izquierda_h) {
                        $articulacion_hombro->flexion_izquierda_h=$request->flexion_izquierda_h;
                    } else {
                        $articulacion_hombro->flexion_izquierda_h=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_h) {
                        $articulacion_hombro->extension_derecha_h=$request->extension_derecha_h;
                    } else {
                        $articulacion_hombro->extension_derecha_h=false;
                    }
                    if ($request->extension_izquierda_h) {
                        $articulacion_hombro->extension_izquierda_h=$request->extension_izquierda_h;
                    } else {
                        $articulacion_hombro->extension_izquierda_h=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_h) {
                        $articulacion_hombro->rexterna_derecha_h=$request->rexterna_derecha_h;
                    } else {
                        $articulacion_hombro->rexterna_derecha_h=false;
                    }
                    if ($request->rexterna_izquierda_h) {
                        $articulacion_hombro->rexterna_izquierda_h=$request->rexterna_izquierda_h;
                    } else {
                        $articulacion_hombro->rexterna_izquierda_h=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_h) {
                        $articulacion_hombro->rinterna_derecha_h=$request->rinterna_derecha_h;
                    } else {
                        $articulacion_hombro->rinterna_derecha_h=false;
                    }
                    if ($request->rinterna_izquierda_h) {
                        $articulacion_hombro->rinterna_izquierda_h=$request->rinterna_izquierda_h;
                    } else {
                        $articulacion_hombro->rinterna_izquierda_h=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_h) {
                        $articulacion_hombro->irradiacion_derecha_h=$request->irradiacion_derecha_h;
                    } else {
                        $articulacion_hombro->irradiacion_derecha_h=false;
                    }
                    if ($request->irradiacion_izquierda_h) {
                        $articulacion_hombro->irradiacion_izquierda_h=$request->irradiacion_izquierda_h;
                    } else {
                        $articulacion_hombro->irradiacion_izquierda_h=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_h) {
                        $articulacion_hombro->alteracion_derecha_h=$request->alteracion_derecha_h;
                    } else {
                        $articulacion_hombro->alteracion_derecha_h=false;
                    }
                    if ($request->alteracion_izquierda_h) {
                        $articulacion_hombro->alteracion_izquierda_h=$request->alteracion_izquierda_h;
                    } else {
                        $articulacion_hombro->alteracion_izquierda_h=false;
                    }
                //

                //Guardado
                    $articulacion_hombro->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_hombro->save();
                //
            //    
            //Codo
                $articulacion_codo=new ArticulacionCodo();
                //Abduccion
                    if ($request->abduccion_derecha_c) {
                        $articulacion_codo->abduccion_derecha_c=$request->abduccion_derecha_c;
                    } else {
                        $articulacion_codo->abduccion_derecha_c=false;
                    }
                    if ($request->abduccion_izquierda_c) {
                        $articulacion_codo->abduccion_izquierda_c=$request->abduccion_izquierda_c;
                    } else {
                        $articulacion_codo->abduccion_izquierda_c=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_c) {
                        $articulacion_codo->adduccion_derecha_c=$request->adduccion_derecha_c;
                    } else {
                        $articulacion_codo->adduccion_derecha_c=false;
                    }
                    if ($request->adduccion_izquierda_c) {
                        $articulacion_codo->adduccion_izquierda_c=$request->adduccion_izquierda_c;
                    } else {
                        $articulacion_codo->adduccion_izquierda_c=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_c) {
                        $articulacion_codo->flexion_derecha_c=$request->flexion_derecha_c;
                    } else {
                        $articulacion_codo->flexion_derecha_c=false;
                    }
                    if ($request->flexion_izquierda_c) {
                        $articulacion_codo->flexion_izquierda_c=$request->flexion_izquierda_c;
                    } else {
                        $articulacion_codo->flexion_izquierda_c=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_c) {
                        $articulacion_codo->extension_derecha_c=$request->extension_derecha_c;
                    } else {
                        $articulacion_codo->extension_derecha_c=false;
                    }
                    if ($request->extension_izquierda_c) {
                        $articulacion_codo->extension_izquierda_c=$request->extension_izquierda_c;
                    } else {
                        $articulacion_codo->extension_izquierda_c=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_c) {
                        $articulacion_codo->rexterna_derecha_c=$request->rexterna_derecha_c;
                    } else {
                        $articulacion_codo->rexterna_derecha_c=false;
                    }
                    if ($request->rexterna_izquierda_c) {
                        $articulacion_codo->rexterna_izquierda_c=$request->rexterna_izquierda_c;
                    } else {
                        $articulacion_codo->rexterna_izquierda_c=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_c) {
                        $articulacion_codo->rinterna_derecha_c=$request->rinterna_derecha_c;
                    } else {
                        $articulacion_codo->rinterna_derecha_c=false;
                    }
                    if ($request->rinterna_izquierda_c) {
                        $articulacion_codo->rinterna_izquierda_c=$request->rinterna_izquierda_c;
                    } else {
                        $articulacion_codo->rinterna_izquierda_c=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_c) {
                        $articulacion_codo->irradiacion_derecha_c=$request->irradiacion_derecha_c;
                    } else {
                        $articulacion_codo->irradiacion_derecha_c=false;
                    }
                    if ($request->irradiacion_izquierda_c) {
                        $articulacion_codo->irradiacion_izquierda_c=$request->irradiacion_izquierda_c;
                    } else {
                        $articulacion_codo->irradiacion_izquierda_c=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_c) {
                        $articulacion_codo->alteracion_derecha_c=$request->alteracion_derecha_c;
                    } else {
                        $articulacion_codo->alteracion_derecha_c=false;
                    }
                    if ($request->alteracion_izquierda_c) {
                        $articulacion_codo->alteracion_izquierda_c=$request->alteracion_izquierda_c;
                    } else {
                        $articulacion_codo->alteracion_izquierda_c=false;
                    }
                //
                //Guardado
                    $articulacion_codo->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_codo->save();
                //
            //
            //Muñeca
                $articulacion_muneca=new ArticulacionMuneca();
                //Abduccion
                    if ($request->abduccion_derecha_m) {
                        $articulacion_muneca->abduccion_derecha_m=$request->abduccion_derecha_m;
                    } else {
                        $articulacion_muneca->abduccion_derecha_m=false;
                    }
                    if ($request->abduccion_izquierda_m) {
                        $articulacion_muneca->abduccion_izquierda_m=$request->abduccion_izquierda_m;
                    } else {
                        $articulacion_muneca->abduccion_izquierda_m=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_m) {
                        $articulacion_muneca->adduccion_derecha_m=$request->adduccion_derecha_m;
                    } else {
                        $articulacion_muneca->adduccion_derecha_m=false;
                    }
                    if ($request->adduccion_izquierda_m) {
                        $articulacion_muneca->adduccion_izquierda_m=$request->adduccion_izquierda_m;
                    } else {
                        $articulacion_muneca->adduccion_izquierda_m=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_m) {
                        $articulacion_muneca->flexion_derecha_m=$request->flexion_derecha_m;
                    } else {
                        $articulacion_muneca->flexion_derecha_m=false;
                    }
                    if ($request->flexion_izquierda_m) {
                        $articulacion_muneca->flexion_izquierda_m=$request->flexion_izquierda_m;
                    } else {
                        $articulacion_muneca->flexion_izquierda_m=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_m) {
                        $articulacion_muneca->extension_derecha_m=$request->extension_derecha_m;
                    } else {
                        $articulacion_muneca->extension_derecha_m=false;
                    }
                    if ($request->extension_izquierda_m) {
                        $articulacion_muneca->extension_izquierda_m=$request->extension_izquierda_m;
                    } else {
                        $articulacion_muneca->extension_izquierda_m=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_m) {
                        $articulacion_muneca->rexterna_derecha_m=$request->rexterna_derecha_m;
                    } else {
                        $articulacion_muneca->rexterna_derecha_m=false;
                    }
                    if ($request->rexterna_izquierda_m) {
                        $articulacion_muneca->rexterna_izquierda_m=$request->rexterna_izquierda_m;
                    } else {
                        $articulacion_muneca->rexterna_izquierda_m=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_m) {
                        $articulacion_muneca->rinterna_derecha_m=$request->rinterna_derecha_m;
                    } else {
                        $articulacion_muneca->rinterna_derecha_m=false;
                    }
                    if ($request->rinterna_izquierda_m) {
                        $articulacion_muneca->rinterna_izquierda_m=$request->rinterna_izquierda_m;
                    } else {
                        $articulacion_muneca->rinterna_izquierda_m=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_m) {
                        $articulacion_muneca->irradiacion_derecha_m=$request->irradiacion_derecha_m;
                    } else {
                        $articulacion_muneca->irradiacion_derecha_m=false;
                    }
                    if ($request->irradiacion_izquierda_m) {
                        $articulacion_muneca->irradiacion_izquierda_m=$request->irradiacion_izquierda_m;
                    } else {
                        $articulacion_muneca->irradiacion_izquierda_m=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_m) {
                        $articulacion_muneca->alteracion_derecha_m=$request->alteracion_derecha_m;
                    } else {
                        $articulacion_muneca->alteracion_derecha_m=false;
                    }
                    if ($request->alteracion_izquierda_m) {
                        $articulacion_muneca->alteracion_izquierda_m=$request->alteracion_izquierda_m;
                    } else {
                        $articulacion_muneca->alteracion_izquierda_m=false;
                    }
                //
                //Guardado
                    $articulacion_muneca->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_muneca->save();
                //
            //
            //ManoDedo 
                $articulacion_mano=new ArticulacionManoDedo();
                //Abduccion
                    if ($request->abduccion_derecha_md) {
                        $articulacion_mano->abduccion_derecha_md=$request->abduccion_derecha_md;
                    } else {
                        $articulacion_mano->abduccion_derecha_md=false;
                    }
                    if ($request->abduccion_izquierda_md) {
                        $articulacion_mano->abduccion_izquierda_md=$request->abduccion_izquierda_md;
                    } else {
                        $articulacion_mano->abduccion_izquierda_md=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_md) {
                        $articulacion_mano->adduccion_derecha_md=$request->adduccion_derecha_md;
                    } else {
                        $articulacion_mano->adduccion_derecha_md=false;
                    }
                    if ($request->adduccion_izquierda_md) {
                        $articulacion_mano->adduccion_izquierda_md=$request->adduccion_izquierda_md;
                    } else {
                        $articulacion_mano->adduccion_izquierda_md=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_md) {
                        $articulacion_mano->flexion_derecha_md=$request->flexion_derecha_md;
                    } else {
                        $articulacion_mano->flexion_derecha_md=false;
                    }
                    if ($request->flexion_izquierda_md) {
                        $articulacion_mano->flexion_izquierda_md=$request->flexion_izquierda_md;
                    } else {
                        $articulacion_mano->flexion_izquierda_md=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_md) {
                        $articulacion_mano->extension_derecha_md=$request->extension_derecha_md;
                    } else {
                        $articulacion_mano->extension_derecha_md=false;
                    }
                    if ($request->extension_izquierda_md) {
                        $articulacion_mano->extension_izquierda_md=$request->extension_izquierda_md;
                    } else {
                        $articulacion_mano->extension_izquierda_md=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_md) {
                        $articulacion_mano->rexterna_derecha_md=$request->rexterna_derecha_md;
                    } else {
                        $articulacion_mano->rexterna_derecha_md=false;
                    }
                    if ($request->rexterna_izquierda_md) {
                        $articulacion_mano->rexterna_izquierda_md=$request->rexterna_izquierda_md;
                    } else {
                        $articulacion_mano->rexterna_izquierda_md=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_md) {
                        $articulacion_mano->rinterna_derecha_md=$request->rinterna_derecha_md;
                    } else {
                        $articulacion_mano->rinterna_derecha_md=false;
                    }
                    if ($request->rinterna_izquierda_md) {
                        $articulacion_mano->rinterna_izquierda_md=$request->rinterna_izquierda_md;
                    } else {
                        $articulacion_mano->rinterna_izquierda_md=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_md) {
                        $articulacion_mano->irradiacion_derecha_md=$request->irradiacion_derecha_md;
                    } else {
                        $articulacion_mano->irradiacion_derecha_md=false;
                    }
                    if ($request->irradiacion_izquierda_md) {
                        $articulacion_mano->irradiacion_izquierda_md=$request->irradiacion_izquierda_md;
                    } else {
                        $articulacion_mano->irradiacion_izquierda_md=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_md) {
                        $articulacion_mano->alteracion_derecha_md=$request->alteracion_derecha_md;
                    } else {
                        $articulacion_mano->alteracion_derecha_md=false;
                    }
                    if ($request->alteracion_izquierda_md) {
                        $articulacion_mano->alteracion_izquierda_md=$request->alteracion_izquierda_md;
                    } else {
                        $articulacion_mano->alteracion_izquierda_md=false;
                    }
                //
                //Guardado
                    $articulacion_mano->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_mano->save();
                //
            //
            //Cadera
                $articulacion_cadera=new ArticulacionCadera();
                //Abduccion
                    if ($request->abduccion_derecha_cad) {
                        $articulacion_cadera->abduccion_derecha_cad=$request->abduccion_derecha_cad;
                    } else {
                        $articulacion_cadera->abduccion_derecha_cad=false;
                    }
                    if ($request->abduccion_izquierda_cad) {
                        $articulacion_cadera->abduccion_izquierda_cad=$request->abduccion_izquierda_cad;
                    } else {
                        $articulacion_cadera->abduccion_izquierda_cad=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_cad) {
                        $articulacion_cadera->adduccion_derecha_cad=$request->adduccion_derecha_cad;
                    } else {
                        $articulacion_cadera->adduccion_derecha_cad=false;
                    }
                    if ($request->adduccion_izquierda_cad) {
                        $articulacion_cadera->adduccion_izquierda_cad=$request->adduccion_izquierda_cad;
                    } else {
                        $articulacion_cadera->adduccion_izquierda_cad=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_cad) {
                        $articulacion_cadera->flexion_derecha_cad=$request->flexion_derecha_cad;
                    } else {
                        $articulacion_cadera->flexion_derecha_cad=false;
                    }
                    if ($request->flexion_izquierda_cad) {
                        $articulacion_cadera->flexion_izquierda_cad=$request->flexion_izquierda_cad;
                    } else {
                        $articulacion_cadera->flexion_izquierda_cad=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_cad) {
                        $articulacion_cadera->extension_derecha_cad=$request->extension_derecha_cad;
                    } else {
                        $articulacion_cadera->extension_derecha_cad=false;
                    }
                    if ($request->extension_izquierda_cad) {
                        $articulacion_cadera->extension_izquierda_cad=$request->extension_izquierda_cad;
                    } else {
                        $articulacion_cadera->extension_izquierda_cad=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_cad) {
                        $articulacion_cadera->rexterna_derecha_cad=$request->rexterna_derecha_cad;
                    } else {
                        $articulacion_cadera->rexterna_derecha_cad=false;
                    }
                    if ($request->rexterna_izquierda_cad) {
                        $articulacion_cadera->rexterna_izquierda_cad=$request->rexterna_izquierda_cad;
                    } else {
                        $articulacion_cadera->rexterna_izquierda_cad=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_cad) {
                        $articulacion_cadera->rinterna_derecha_cad=$request->rinterna_derecha_cad;
                    } else {
                        $articulacion_cadera->rinterna_derecha_cad=false;
                    }
                    if ($request->rinterna_izquierda_cad) {
                        $articulacion_cadera->rinterna_izquierda_cad=$request->rinterna_izquierda_cad;
                    } else {
                        $articulacion_cadera->rinterna_izquierda_cad=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_cad) {
                        $articulacion_cadera->irradiacion_derecha_cad=$request->irradiacion_derecha_cad;
                    } else {
                        $articulacion_cadera->irradiacion_derecha_cad=false;
                    }
                    if ($request->irradiacion_izquierda_cad) {
                        $articulacion_cadera->irradiacion_izquierda_cad=$request->irradiacion_izquierda_cad;
                    } else {
                        $articulacion_cadera->irradiacion_izquierda_cad=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_cad) {
                        $articulacion_cadera->alteracion_derecha_cad=$request->alteracion_derecha_cad;
                    } else {
                        $articulacion_cadera->alteracion_derecha_cad=false;
                    }
                    if ($request->alteracion_izquierda_cad) {
                        $articulacion_cadera->alteracion_izquierda_cad=$request->alteracion_izquierda_cad;
                    } else {
                        $articulacion_cadera->alteracion_izquierda_cad=false;
                    }
                //
                //Guardado
                    $articulacion_cadera->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_cadera->save();
                //
            // 
            //Rodilla
                $articulacion_rodilla=new ArticulacionRodilla();
                //Abduccion
                    if ($request->abduccion_derecha_rod) {
                        $articulacion_rodilla->abduccion_derecha_rod=$request->abduccion_derecha_rod;
                    } else {
                        $articulacion_rodilla->abduccion_derecha_rod=false;
                    }
                    if ($request->abduccion_izquierda_rod) {
                        $articulacion_rodilla->abduccion_izquierda_rod=$request->abduccion_izquierda_rod;
                    } else {
                        $articulacion_rodilla->abduccion_izquierda_rod=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_rod) {
                        $articulacion_rodilla->adduccion_derecha_rod=$request->adduccion_derecha_rod;
                    } else {
                        $articulacion_rodilla->adduccion_derecha_rod=false;
                    }
                    if ($request->adduccion_izquierda_rod) {
                        $articulacion_rodilla->adduccion_izquierda_rod=$request->adduccion_izquierda_rod;
                    } else {
                        $articulacion_rodilla->adduccion_izquierda_rod=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_rod) {
                        $articulacion_rodilla->flexion_derecha_rod=$request->flexion_derecha_rod;
                    } else {
                        $articulacion_rodilla->flexion_derecha_rod=false;
                    }
                    if ($request->flexion_izquierda_rod) {
                        $articulacion_rodilla->flexion_izquierda_rod=$request->flexion_izquierda_rod;
                    } else {
                        $articulacion_rodilla->flexion_izquierda_rod=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_rod) {
                        $articulacion_rodilla->extension_derecha_rod=$request->extension_derecha_rod;
                    } else {
                        $articulacion_rodilla->extension_derecha_rod=false;
                    }
                    if ($request->extension_izquierda_rod) {
                        $articulacion_rodilla->extension_izquierda_rod=$request->extension_izquierda_rod;
                    } else {
                        $articulacion_rodilla->extension_izquierda_rod=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_rod) {
                        $articulacion_rodilla->rexterna_derecha_rod=$request->rexterna_derecha_rod;
                    } else {
                        $articulacion_rodilla->rexterna_derecha_rod=false;
                    }
                    if ($request->rexterna_izquierda_rod) {
                        $articulacion_rodilla->rexterna_izquierda_rod=$request->rexterna_izquierda_rod;
                    } else {
                        $articulacion_rodilla->rexterna_izquierda_rod=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_rod) {
                        $articulacion_rodilla->rinterna_derecha_rod=$request->rinterna_derecha_rod;
                    } else {
                        $articulacion_rodilla->rinterna_derecha_rod=false;
                    }
                    if ($request->rinterna_izquierda_rod) {
                        $articulacion_rodilla->rinterna_izquierda_rod=$request->rinterna_izquierda_rod;
                    } else {
                        $articulacion_rodilla->rinterna_izquierda_rod=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_rod) {
                        $articulacion_rodilla->irradiacion_derecha_rod=$request->irradiacion_derecha_rod;
                    } else {
                        $articulacion_rodilla->irradiacion_derecha_rod=false;
                    }
                    if ($request->irradiacion_izquierda_rod) {
                        $articulacion_rodilla->irradiacion_izquierda_rod=$request->irradiacion_izquierda_rod;
                    } else {
                        $articulacion_rodilla->irradiacion_izquierda_rod=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_rod) {
                        $articulacion_rodilla->alteracion_derecha_rod=$request->alteracion_derecha_rod;
                    } else {
                        $articulacion_rodilla->alteracion_derecha_rod=false;
                    }
                    if ($request->alteracion_izquierda_rod) {
                        $articulacion_rodilla->alteracion_izquierda_rod=$request->alteracion_izquierda_rod;
                    } else {
                        $articulacion_rodilla->alteracion_izquierda_rod=false;
                    }
                //
                //Guardado
                    $articulacion_rodilla->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_rodilla->save();
                //
            //
            //Tobillo        
                $articulacion_tobillo=new ArticulacionTobillo();
                //Abduccion
                    if ($request->abduccion_derecha_t) {
                        $articulacion_tobillo->abduccion_derecha_t=$request->abduccion_derecha_t;
                    } else {
                        $articulacion_tobillo->abduccion_derecha_t=false;
                    }
                    if ($request->abduccion_izquierda_t) {
                        $articulacion_tobillo->abduccion_izquierda_t=$request->abduccion_izquierda_t;
                    } else {
                        $articulacion_tobillo->abduccion_izquierda_t=false;
                    }
                //
                //Adduccion
                    if ($request->adduccion_derecha_t) {
                        $articulacion_tobillo->adduccion_derecha_t=$request->adduccion_derecha_t;
                    } else {
                        $articulacion_tobillo->adduccion_derecha_t=false;
                    }
                    if ($request->adduccion_izquierda_t) {
                        $articulacion_tobillo->adduccion_izquierda_t=$request->adduccion_izquierda_t;
                    } else {
                        $articulacion_tobillo->adduccion_izquierda_t=false;
                    }
                //
                //Flexion
                    if ($request->flexion_derecha_t) {
                        $articulacion_tobillo->flexion_derecha_t=$request->flexion_derecha_t;
                    } else {
                        $articulacion_tobillo->flexion_derecha_t=false;
                    }
                    if ($request->flexion_izquierda_t) {
                        $articulacion_tobillo->flexion_izquierda_t=$request->flexion_izquierda_t;
                    } else {
                        $articulacion_tobillo->flexion_izquierda_t=false;
                    }
                //
                //Extension
                    if ($request->extension_derecha_t) {
                        $articulacion_tobillo->extension_derecha_t=$request->extension_derecha_t;
                    } else {
                        $articulacion_tobillo->extension_derecha_t=false;
                    }
                    if ($request->extension_izquierda_t) {
                        $articulacion_tobillo->extension_izquierda_t=$request->extension_izquierda_t;
                    } else {
                        $articulacion_tobillo->extension_izquierda_t=false;
                    }
                //
                //Rexterna
                    if ($request->rexterna_derecha_t) {
                        $articulacion_tobillo->rexterna_derecha_t=$request->rexterna_derecha_t;
                    } else {
                        $articulacion_tobillo->rexterna_derecha_t=false;
                    }
                    if ($request->rexterna_izquierda_t) {
                        $articulacion_tobillo->rexterna_izquierda_t=$request->rexterna_izquierda_t;
                    } else {
                        $articulacion_tobillo->rexterna_izquierda_t=false;
                    }
                //
                //Rinterna
                    if ($request->rinterna_derecha_t) {
                        $articulacion_tobillo->rinterna_derecha_t=$request->rinterna_derecha_t;
                    } else {
                        $articulacion_tobillo->rinterna_derecha_t=false;
                    }
                    if ($request->rinterna_izquierda_t) {
                        $articulacion_tobillo->rinterna_izquierda_t=$request->rinterna_izquierda_t;
                    } else {
                        $articulacion_tobillo->rinterna_izquierda_t=false;
                    }
                //
                //Irradiacion
                    if ($request->irradiacion_derecha_t) {
                        $articulacion_tobillo->irradiacion_derecha_t=$request->irradiacion_derecha_t;
                    } else {
                        $articulacion_tobillo->irradiacion_derecha_t=false;
                    }
                    if ($request->irradiacion_izquierda_t) {
                        $articulacion_tobillo->irradiacion_izquierda_t=$request->irradiacion_izquierda_t;
                    } else {
                        $articulacion_tobillo->irradiacion_izquierda_t=false;
                    }
                //
                //Alteracion
                    if ($request->alteracion_derecha_t) {
                        $articulacion_tobillo->alteracion_derecha_t=$request->alteracion_derecha_t;
                    } else {
                        $articulacion_tobillo->alteracion_derecha_t=false;
                    }
                    if ($request->alteracion_izquierda_t) {
                        $articulacion_tobillo->alteracion_izquierda_t=$request->alteracion_izquierda_t;
                    } else {
                        $articulacion_tobillo->alteracion_izquierda_t=false;
                    }
                //
                //Guardado
                    $articulacion_tobillo->posiciones_forzada_id=$posiciones_forzada->id;
                    $articulacion_tobillo->save();
                //
            //

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

            $semiologica=new Semiologica();
            $semiologica->grado=$request->grado;
            $semiologica->observacion1_s=$request->observacion1_s;
            $semiologica->posiciones_forzada_id=$posiciones_forzada->id;
            $semiologica->save();

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
