<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionTobillo extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_t',
        'abduccion_izquierda_t',

        'adduccion_derecha_t',
        'adduccion_izquierda_t',

        'flexion_derecha_t',
        'flexion_izquierda_t',

        'extension_derecha_t',
        'extension_izquierda_t',

        'rexterna_derecha_t',
        'rexterna_izquierda_t',

        'rinterna_derecha_t',
        'rinterna_izquierda_t',

        'irradiacion_derecha_t',
        'irradiacion_izquierda_t',

        'alteracion_derecha_t',
        'alteracion_izquierda_t',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_tobillos';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
