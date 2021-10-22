<?php

namespace App\Models;

use App\Voucher;
use App\Models\Estudio;
use Illuminate\Database\Eloquent\Model;

class VoucherEstudio extends Model
{
    protected $table = 'vouchers_estudios';

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function estudio()
    {
        return $this->belongsTo(Estudio::class);
    }

    public function archivo_adjunto()
    {
        return $this->hasOne('App\ArchivoAdjunto','voucher_estudio_id','id');
    }
}
