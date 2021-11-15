<?php

namespace App\Http\Controllers;

use App\ArchivoAdjunto;
use App\Models\VoucherEstudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Redirect;

class VoucherEstudioController extends Controller
{
    public function archivo(Request $request)
    {   
        if ($request->hasFile('anexo')) {
            $archivo = $request->file('anexo');

            if (( $archivo->guessExtension()=="pdf") or ( $archivo->guessExtension()=="bin")){

                if ($archivo->guessExtension()=="bin") {
                    $nombre = $request->estudio."_".$request->voucher_estudio_id.".pdf";
                } else {
                    $nombre = $request->estudio."_".$request->voucher_estudio_id.$archivo->getClientOriginalName();
                }
                $archivo->move(public_path().'/archivo/',$nombre);
                $ruta = public_path().'/archivo/'.$nombre;
                $archivo_adjunto = new ArchivoAdjunto();
                $archivo_adjunto->anexo = $ruta;
                $archivo_adjunto->voucher_estudio_id = $request->voucher_estudio_id;
                $archivo_adjunto->save();

                return back();
            }else{
                Session::flash('message','No se realizó la carga porque el archivo seleccionado no era un PDF');
                return back();
            }
        }
        return back();
    }

    public function show($id)
    {   
        $voucher_estudio = VoucherEstudio::find($id);
        return response()->download($voucher_estudio->archivo_adjunto->anexo);
    }
}
