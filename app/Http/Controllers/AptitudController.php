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
        $voucher  = Voucher::find($id);

        //Carga de riesgos
        $riesgos = ['RIESGO COD. 01: SIN EXPOSICIÓN A AGENTES O ACTIVIDADES DE RIESGO ESPECÍFICOS.',
                    'RIESGO COD. 02: SUSTANCIAS QUÍMICAS (POLVOS, HUMOS, VAPORES O GASES).',
                    'RIESGO COD. 03: RUIDO.',
                    'RIESGO COD. 04: VIBRACIONES TRANSMITIDAS AL CUERPO ENTERO.',
                    'RIESGO COD. 05: VIBRACIONES TRANSMITIDAS A LA EXTREMIDAD SUPERIOR.',
                    'RIESGO COD. 06: VIBRACIONES TRANSMITIDAS A LA EXTREMIDAD INFERIOR.',
                    'RIESGO COD. 07: POSICIONES FORZADAS Y GESTOS REPETITIVOS.',
                    'RIESGO COD. 08: TRABAJO EN ALTURA.',
                    'RIESGO COD. 09: INGRESO EN ESPACIOS CONFINADOS.',
                    'RIESGO COD. 10: OPERACIÓN DE VEHÍCULOS MOTORIZADOS.',];

        //Carga de estudios de sistema
        $declaracion_jurada = $voucher->declaracionJurada;
        $historia_clinica = $voucher->historiaClinica;
        $posiciones_forzadas = $voucher->posicionesForzadas;
        $iluminacion_direccionado = $voucher->iluminacionDireccionado;

        //Carga de estudios cargados
        $estudios = $voucher->estudiosCargados();
        return view('aptitud.create', compact('voucher','riesgos','estudios','declaracion_jurada','historia_clinica','posiciones_forzadas','iluminacion_direccionado'));
    }

    public function crearPDF($id)
    {   
        $voucher= Voucher::find($id);
        $aptitud= $voucher->aptitud;
        //Carga de riesgos
        $riesgos = ['RIESGO COD. 01: SIN EXPOSICIÓN A AGENTES O ACTIVIDADES DE RIESGO ESPECÍFICOS.',
                    'RIESGO COD. 02: SUSTANCIAS QUÍMICAS (POLVOS, HUMOS, VAPORES O GASES).',
                    'RIESGO COD. 03: RUIDO.',
                    'RIESGO COD. 04: VIBRACIONES TRANSMITIDAS AL CUERPO ENTERO.',
                    'RIESGO COD. 05: VIBRACIONES TRANSMITIDAS A LA EXTREMIDAD SUPERIOR.',
                    'RIESGO COD. 06: VIBRACIONES TRANSMITIDAS A LA EXTREMIDAD INFERIOR.',
                    'RIESGO COD. 07: POSICIONES FORZADAS Y GESTOS REPETITIVOS.',
                    'RIESGO COD. 08: TRABAJO EN ALTURA.',
                    'RIESGO COD. 09: INGRESO EN ESPACIOS CONFINADOS.',
                    'RIESGO COD. 10: OPERACIÓN DE VEHÍCULOS MOTORIZADOS.',];
        //

        $ruta = public_path().'/archivo/'."APTITUD".$aptitud->id.".pdf";
        $pdf = PDF::loadView('aptitud.pdf',["voucher" => $voucher, "riesgos" => $riesgos]);
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

        //PDF
        $ruta = public_path().'/archivo/'."APTITUD".$aptitud->id.".pdf";
        $pdf = PDF::loadView('aptitud.pdf',["voucher"   =>  $voucher]);
        $pdf->setPaper('a4','letter');
        $pdf->save($ruta);
        $aptitud->pdf = $ruta;

        $aptitud->update();

        return redirect()->route('voucher.show',$voucher->id);
    }
}
