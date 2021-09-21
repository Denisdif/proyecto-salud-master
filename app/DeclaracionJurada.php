<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DeclaracionJurada extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public $timestamps=true;

    protected $fillable = [
        'firma',//imagen
        'codigo',
        'personal_clinica_id',
        'voucher_id',
        'fecha_realizacion',
        'ciudad_id'];

    protected $table = 'declaracion_juradas';

    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }

  public function personalClinica()
    {
        return $this->belongsTo('App\PersonalClinica');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }

    public function antecedenteFamiliar()
    {
        return $this->hasOne('App\AntecedenteFamiliar');
    }

    public function antecedentePersonal()
    {
        return $this->hasOne('App\AntecedentePersonal');
    }

    public function antecedenteMedicoInfancia()
    {
        return $this->hasOne('App\AntecedenteMedicoInfancia');
    }

    public function antecedenteReciente()
    {
        return $this->hasOne('App\AntecedenteReciente');
    }

    public function antecedenteQuirurjico()
    {
        return $this->hasOne('App\AntecedenteQuirurjico');
    }

}
