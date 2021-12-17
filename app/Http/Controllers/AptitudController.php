<?php

namespace App\Http\Controllers;

use App\Models\Aptitud;
use App\Voucher;
use Carbon\Carbon;
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
        $aptitudModel = new Aptitud(); 
        $voucher = Voucher::find($id);

        //Carga de riesgos
        $riesgos = $aptitudModel->riesgos();

        $pdf = PDF::loadView('aptitud.pdf',["voucher" => $voucher, "riesgos" => $riesgos]);
        $pdf->setPaper('a4','letter');

        return $pdf->stream('aptitud.pdf');
        
    }

    public function store(Request $request)
    {   
        $aptitudModel = new Aptitud(); 
        //Obtener voucher
        $voucher = Voucher::find($request->voucher_id);
        //Crear objeto aptitud
        $aptitud = ["riesgos" => implode($request->riesgos),
                    "comentarios" => $request->comentarios,
                    "aptitud_laboral" => $request->aptitud_laboral,
                    "fecha" => new Carbon(),
                    "preexistencias" => $request->preexistencias,
                    "observaciones" => $request->observaciones
        ];
        //Generar PDF
        $pdf = PDF::loadView('aptitud.pdf',["voucher" => $voucher, 
                                            "riesgos" => $aptitudModel->riesgos(), 
                                            "aptitud" => $aptitud]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('aptitud.pdf');
        /*
        //Cargar Aptitud
        $aptitud = Aptitud::create($request->all());
        $aptitud->riesgos = implode($request->riesgos);
        $aptitud->update();

        return redirect()->route('voucher.show',$voucher->id);*/
    }
}
