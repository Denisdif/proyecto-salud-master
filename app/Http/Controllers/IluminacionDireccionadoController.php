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
        return view('direccionado_iluminacion.create', compact('voucher'));
    }
    
    public function store(Request $request)
    {   
        $iluminacion = IluminacionDireccionado::create($request->all());
        $iluminacion->diagnostico = $iluminacion->generarDiagnostico();
        $iluminacion->update();
        return redirect()->route('iluminacion_direccionados.index');
    }
}
