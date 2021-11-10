<?php

namespace App\Http\Controllers;

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

        $estudios = ['LABORATORIO',
                     'AUDIOMETRÍA',
                     'E.C.G',
                     'E.E.G',
                     'ESPIROMETRIA',
                     'RX DE TORAX',
                     'RX DE COLUMNA LUMBOSACRA',
                     'RX DE COLUMNA CERVICAL',
                     'RX DE MANOS / MUÑECAS',
                     'RX DE RODILLAS',
                     'PSICOTECNICO',
                     'PSICOSENSOMETRICO',];

        $historiaClinica = [];
        $aux = $voucher->historiaClinica;

        return view('aptitud.create', compact('voucher','riesgos','estudios'));
    }
}
