<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosicionesForzada extends Model
{
    public $timestamps=true;

    protected $fillable = [
        'firma',
        'codigo',
        'puesto',
        'antiguedad',
        'nroTrabajo',
        'obsrvacion3_d',
        'user_id',
        'paciente_id'
    ];


    protected $table = 'posiciones_forzadas';

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function dolor()
    {
        return $this->hasOne(Dolor::class);
    }

    public function tarea()
    {
        return $this->hasOne(Tarea::class);
    }

    public function semiologica()
    {
        return $this->hasOne(Semiologica::class);
    }

    public function articulacion_cadera()
    {
        return $this->hasOne(ArticulacionCadera::class);
    }

    public function articulacion_codo()
    {
        return $this->hasOne(ArticulacionCodo::class);
    }

    public function articulacion_hombro()
    {
        return $this->hasOne(ArticulacionHombro::class);
    }

    public function articulacion_mano_dedo()
    {
        return $this->hasOne(ArticulacionManoDedo::class);
    }

    public function articulacion_muneca()
    {
        return $this->hasOne(ArticulacionMuneca::class);
    }

    public function articulacion_rodilla()
    {
        return $this->hasOne(ArticulacionRodilla::class);
    }

    public function articulacion_tobillo()
    {
        return $this->hasOne(ArticulacionTobillo::class);
    }
}
