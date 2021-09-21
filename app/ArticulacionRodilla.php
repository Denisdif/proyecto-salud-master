<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulacionRodilla extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'abduccion_derecha_rod',
        'abduccion_izquierda_rod',

        'adduccion_derecha_rod',
        'adduccion_izquierda_rod',

        'flexion_derecha_rod',
        'flexion_izquierda_rod',

        'extension_derecha_rod',
        'extension_izquierda_rod',

        'rexterna_derecha_rod',
        'rexterna_izquierda_rod',

        'rinterna_derecha_rod',
        'rinterna_izquierda_rod',

        'irradiacion_derecha_rod',
        'irradiacion_izquierda_rod',

        'alteracion_derecha_rod',
        'alteracion_izquierda_rod',


        'posiciones_forzada_id'
    ];


    protected $table = 'articulacion_rodillas';

    public function posicionesForzada()
    {
        return $this->belongsTo('App\PosicionesForzada');
    }
}
