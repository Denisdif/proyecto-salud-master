<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = ['nombre', 'tipo_estudio_id'];

    
    public function tipoEstudio()
    {
        return $this->belongsTo(TipoEstudio::class);
    }

    public function voucher()
    {
        return $this->belongsToMany(Voucher::class);
    }

}
