<?php

namespace App\Http\Controllers;

use App\ArchivoAdjunto;
use App\Models\VoucherEstudio;
use Illuminate\Http\Request;

class VoucherEstudioController extends Controller
{
    public function archivo(Request $request)
    {   
        $archivos = $request->file('anexo');

        foreach ($archivos as $item) {
            if ($item) {
                    $nombre = $request->estudio
                            ."_"
                            .$request->voucher_estudio_id
                            .$item->getClientOriginalName();
                    
                    $item->move(public_path().'/archivo/',$nombre);
                    $ruta = public_path().'/archivo/'.$nombre;
                    $archivo_adjunto = new ArchivoAdjunto();
                    $archivo_adjunto->anexo = $ruta;
                    $archivo_adjunto->voucher_estudio_id = $request->voucher_estudio_id;
                    $archivo_adjunto->save();
            }
        }
        return back();
    }

    public function show($id)
    {   
        $archivo_adjunto = ArchivoAdjunto::find($id);
        return response()->download($archivo_adjunto->anexo);
    }

}
