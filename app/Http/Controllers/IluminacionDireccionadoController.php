<?php
namespace App\Http\Controllers;
use App\Models\IluminacionDireccionado;
use App\Voucher;
use Illuminate\Http\Request;
use PDF;
class IluminacionDireccionadoController extends Controller
{
    public function index()
    {
        $iluminacionesDireccionados = IluminacionDireccionado::All();
        return view('direccionado_iluminacion.index', compact('iluminacionesDireccionados'));
    }

    public function crearPDF($id)
    {
        $iluminacion=IluminacionDireccionado::find($id);
        $pdf = PDF::loadView('direccionado_iluminacion.PDF',["iluminacion"   =>  $iluminacion]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('iluminacion.pdf');
    }

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

        return view('aptitud.create', compact('voucher','riesgos','estudios'));
    
        //return view('direccionado_iluminacion.create', compact('voucher'));
    }
    
    public function store(Request $request)
    {
        $iluminacion = IluminacionDireccionado::create($request->all());
        /*
            $variable = $request;
            return $variable;
        */
        return redirect()->route('iluminacion_direccionados.index');
    }
}
