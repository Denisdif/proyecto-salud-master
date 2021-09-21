<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionCadera extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_cad',
        'abduccion_izquierda_cad',

        'adduccion_derecha_cad',
        'adduccion_izquierda_cad',

        'flexion_derecha_cad',
        'flexion_izquierda_cad',

        'extension_derecha_cad',
        'extension_izquierda_cad',

        'rexterna_derecha_cad',
        'rexterna_izquierda_cad',

        'rinterna_derecha_cad',
        'rinterna_izquierda_cad',

        'irradiacion_derecha_cad',
        'irradiacion_izquierda_cad',

        'alteracion_derecha_cad',
        'alteracion_izquierda_cad',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_caderas';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
