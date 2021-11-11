<?php

namespace App\Http\Controllers;

use App\ArchivoAdjunto;
use App\Models\VoucherEstudio;
use Illuminate\Http\Request;

class VoucherEstudioController extends Controller
{
    public function archivo(Request $request)
    {   
        if ($request->hasFile('anexo')) {
            $archivo = $request->file('anexo');
            $nombre = $request->estudio."_".$request->voucher_estudio_id.".pdf";
            $archivo->move(public_path().'/archivo/',$nombre);

            $ruta = public_path().'/archivo/'.$nombre;
            $archivo_adjunto = new ArchivoAdjunto();
            $archivo_adjunto->anexo = $ruta;
            $archivo_adjunto->voucher_estudio_id = $request->voucher_estudio_id;
            $archivo_adjunto->save();
        }
        return back();
    }

    public function show($id)
    {   
        $voucher_estudio = VoucherEstudio::find($id);
        return response()->file($voucher_estudio->archivo_adjunto->anexo);
    }
}
