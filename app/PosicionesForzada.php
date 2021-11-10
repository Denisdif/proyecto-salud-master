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

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
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
}
