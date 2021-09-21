<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionMuneca extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_m',
        'abduccion_izquierda_m',

        'adduccion_derecha_m',
        'adduccion_izquierda_m',

        'flexion_derecha_m',
        'flexion_izquierda_m',

        'extension_derecha_m',
        'extension_izquierda_m',

        'rexterna_derecha_m',
        'rexterna_izquierda_m',

        'rinterna_derecha_m',
        'rinterna_izquierda_m',

        'irradiacion_derecha_m',
        'irradiacion_izquierda_m',

        'alteracion_derecha_m',
        'alteracion_izquierda_m',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_munecas';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
