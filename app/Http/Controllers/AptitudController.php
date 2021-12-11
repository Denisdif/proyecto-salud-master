<?php

namespace App\Http\Controllers;

use App\Models\Aptitud;
use App\Voucher;
use Illuminate\Http\Request;
use PDF;

class AptitudController extends Controller
{

    public function create($id)
    {   
        $aptitud = new Aptitud(); 
        $voucher  = Voucher::find($id);

        //Carga de riesgos
        $riesgos = $aptitud->riesgos();

        //Carga de estudios de sistema
        $declaracion_jurada = $voucher->declaracionJurada;
        $historia_clinica = $voucher->historiaClinica;
        $posiciones_forzadas = $voucher->posicionesForzadas;
        $iluminacion_direccionado = $voucher->iluminacionDireccionado;

        $diagnosticoD = " ";
        $diagnosticoH = " ";
        $diagnosticoP = " ";
        $diagnosticoI = " ";

        if ($declaracion_jurada) {
            $diagnosticoD = $declaracion_jurada->generarDiagnostico();
        }
        if ($historia_clinica) {
            $diagnosticoH = $historia_clinica->generarDiagnostico();
        }
        if ($posiciones_forzadas) {
            $diagnosticoP = $posiciones_forzadas->generarDiagnostico();
        }
        if ($iluminacion_direccionado) {
            $diagnosticoI = $iluminacion_direccionado->generarDiagnostico();
        }

        //Carga de estudios cargados
        $estudios = $voucher->estudiosCargados();
        return view('aptitud.create', compact('voucher','riesgos','estudios',
                                              'declaracion_jurada','historia_clinica','posiciones_forzadas','iluminacion_direccionado',
                                              'diagnosticoD','diagnosticoH','diagnosticoP','diagnosticoI' ));
    }

    public function crearPDF($id)
    {   
        $voucher= Voucher::find($id);
        $aptitud= $voucher->aptitud;
        
        //Carga de riesgos
        $riesgos = $aptitud->riesgos();
        //
        //Carga de estudios de sistema
            $declaracion_jurada = $voucher->declaracionJurada;
            $historia_clinica = $voucher->historiaClinica;
            $posiciones_forzadas = $voucher->posicionesForzadas;
            $articulaciones = ['Hombro','Codo','Muñeca','Mano y dedos','Cadera','Rodilla','Tobillo'];
            $cuadro = 0;
            $iluminacion_direccionado = $voucher->iluminacionDireccionado;

            $diagnosticoD = " ";
            $diagnosticoH = " ";
            $diagnosticoP = " ";
            $diagnosticoI = " ";

            if ($declaracion_jurada) {
                $diagnosticoD = $declaracion_jurada->generarDiagnostico();
            }
            if ($historia_clinica) {
                $diagnosticoH = $historia_clinica->generarDiagnostico();
            }
            if ($posiciones_forzadas) {
                $diagnosticoP = $posiciones_forzadas->generarDiagnostico();
            }
            if ($iluminacion_direccionado) {
                $diagnosticoI = $iluminacion_direccionado->generarDiagnostico();
            }
        //

        $pdf = PDF::loadView('aptitud.pdf',["voucher" => $voucher, "riesgos" => $riesgos,
                                            "diagnosticoD" => $diagnosticoD,"diagnosticoH" => $diagnosticoH,
                                            "diagnosticoP" => $diagnosticoP,"diagnosticoI" => $diagnosticoI,
                                            "articulaciones" => $articulaciones, "cuadro" => $cuadro, "posiciones_forzada"=>$posiciones_forzadas]);
        $pdf->setPaper('a4','letter');

        return $pdf->stream('aptitud.pdf');
        
    }

    public function store(Request $request)
    {   
        //Obtener voucher
        $voucher= Voucher::find($request->voucher_id);

        //Cargar Aptitud
        $aptitud = Aptitud::create($request->all());
        $aptitud->riesgos = implode($request->riesgos);

        //Guardar diagnosticos de estudios cargados
        $estudios = $voucher->estudiosCargados();
        for ($i=0; $i < sizeof($estudios); $i++) {
            if ($estudios[$i]->archivo_adjunto) {
                $archivo = $estudios[$i]->archivo_adjunto;
                $archivo->diagnostico = $request->$i;
                $archivo->save();
            }
        }

        //Carga de estudios de sistema
            $declaracion_jurada = $voucher->declaracionJurada;
            $historia_clinica = $voucher->historiaClinica;
            $posiciones_forzadas = $voucher->posicionesForzadas;
            $iluminacion_direccionado = $voucher->iluminacionDireccionado;

            if ($declaracion_jurada) {
                $diagnosticoD = $declaracion_jurada->generarDiagnostico();
            }
            if ($historia_clinica) {
                $diagnosticoH = $historia_clinica->generarDiagnostico();
            }
            if ($posiciones_forzadas) {
                $diagnosticoP = $posiciones_forzadas->generarDiagnostico();
            }
            if ($iluminacion_direccionado) {
                $diagnosticoI = $iluminacion_direccionado->generarDiagnostico();
            }
        //
            /*
        //PDF
        $ruta = public_path().'/archivo/'."APTITUD".$aptitud->id.".pdf";
        $pdf = PDF::loadView('aptitud.pdf',["voucher"   =>  $voucher]);
        $pdf->setPaper('a4','letter');
        $pdf->save($ruta);
        $aptitud->pdf = $ruta;*/

        $aptitud->update();

        return redirect()->route('voucher.show',$voucher->id);
    }
}
