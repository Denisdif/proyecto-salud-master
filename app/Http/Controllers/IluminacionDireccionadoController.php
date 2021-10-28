<?php

namespace App\Http\Controllers;
use App\Models\IluminacionDireccionado;
use App\Voucher;
use Illuminate\Http\Request;

class IluminacionDireccionadoController extends Controller
{
    public function index()
    {
        $iluminacionesDireccionados = IluminacionDireccionado::All();

        return view('direccionado_iluminacion.index', compact('iluminacionesDireccionados'));
    }
    public function create($id)
    {
        $voucher  = Voucher::find($id);
        return view('direccionado_iluminacion.create', compact('voucher'));
    }

    public function store(Request $request)
    {
        $iluminacion = IluminacionDireccionado::create($request->all());
        return redirect()->route('iluminacion_direccionados.index');
    }
}
