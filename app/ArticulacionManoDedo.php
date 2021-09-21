<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionManoDedo extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_md',
        'abduccion_izquierda_md',

        'adduccion_derecha_md',
        'adduccion_izquierda_md',

        'flexion_derecha_md',
        'flexion_izquierda_md',

        'extension_derecha_md',
        'extension_izquierda_md',

        'rexterna_derecha_md',
        'rexterna_izquierda_md',

        'rinterna_derecha_md',
        'rinterna_izquierda_md',

        'irradiacion_derecha_md',
        'irradiacion_izquierda_md',

        'alteracion_derecha_md',
        'alteracion_izquierda_md',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_mano_dedos';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
