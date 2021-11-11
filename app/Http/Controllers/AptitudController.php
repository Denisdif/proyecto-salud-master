<?php

namespace App\Http\Controllers;

use App\Models\Aptitud;
use App\Voucher;
use Illuminate\Http\Request;

class AptitudController extends Controller
{
    public function create($id)
    {
        $voucher  = Voucher::find($id);
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
        $declaracion_jurada = $voucher->declaracionJurada;
        $historia_clinica = $voucher->historiaClinica;
        $posiciones_forzadas = $voucher->posicionesForzadas;
        $iluminacion_direccionado = $voucher->iluminacionDireccionado;
        $estudios = $voucher->estudiosCargar();
        return view('aptitud.create', compact('voucher','riesgos','estudios','declaracion_jurada','historia_clinica','posiciones_forzadas','iluminacion_direccionado'));
    }

    public function store(Request $request)
    {   
        $aptitud = Aptitud::create($request->all());
        $aptitud->riesgos = implode($request->riesgos);
        $aptitud->update();
        return $aptitud;

        //return redirect()->route('voucher.show',$voucher->id);
    }
}
