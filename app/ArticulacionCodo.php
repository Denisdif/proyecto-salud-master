<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionCodo extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_c',
        'abduccion_izquierda_c',

        'adduccion_derecha_c',
        'adduccion_izquierda_c',

        'flexion_derecha_c',
        'flexion_izquierda_c',

        'extension_derecha_c',
        'extension_izquierda_c',

        'rexterna_derecha_c',
        'rexterna_izquierda_c',

        'rinterna_derecha_c',
        'rinterna_izquierda_c',

        'irradiacion_derecha_c',
        'irradiacion_izquierda_c',

        'alteracion_derecha_c',
        'alteracion_izquierda_c',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_codos';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }




}
