<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionHombro extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_h',
        'abduccion_izquierda_h',

        'adduccion_derecha_h',
        'adduccion_izquierda_h',

        'flexion_derecha_h',
        'flexion_izquierda_h',

        'extension_derecha_h',
        'extension_izquierda_h',

        'rexterna_derecha_h',
        'rexterna_izquierda_h',

        'rinterna_derecha_h',
        'rinterna_izquierda_h',

        'irradiacion_derecha_h',
        'irradiacion_izquierda_h',

        'alteracion_derecha_h',
        'alteracion_izquierda_h',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_hombros';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
