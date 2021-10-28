<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;

class IluminacionDireccionadoController extends Controller
{
    public function create($id)
    {
        $voucher  = Voucher::find($id);
        return view('direccionado_iluminacion.create', compact('voucher'));
    }
}
