<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
{
    protected $fillable = ['nombre'];

    
    public function estudios()
    {
        return $this->belongsTo(Estudio::class);
    }
}
