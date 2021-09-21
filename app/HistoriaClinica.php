<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class HistoriaClinica extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public $timestamps=true;

    protected $fillable = [
        'codigo',
        'voucher_id',
        //'firma',
        'user_id',

    ];

    protected $table = 'historia_clinicas';

    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }

    public function examenClinico()
    {
        return $this->hasOne('App\ExamenClinico');
    }

    public function cardiovascular()
    {
        return $this->hasOne('App\Cardiovascular');
    }

    public function piel()
    {
        return $this->hasOne('App\Piel');
    }

    public function osteoarticular()
    {
        return $this->hasOne('App\Osteoarticular');
    }

    public function columna()
    {
        return $this->hasOne('App\Columna');
    }

    public function cabezaCuello()
    {
        return $this->hasOne('App\CabezaCuello');
    }

    public function oftalmologico()
    {
        return $this->hasOne('App\Oftalmologico');
    }

    public function neurologico()
    {
        return $this->hasOne('App\Neurologico');
    }

    public function odontologico()
    {
        return $this->hasOne('App\Odontologico');
    }

    public function respitario()
    {
        return $this->hasOne('App\Respiratorio');
    }

    public function abdomen()
    {
        return $this->hasOne('App\Abdomen');
    }

    public function regionInguinal()
    {
        return $this->hasOne('App\RegionInguinal');
    }

    public function genital()
    {
        return $this->hasOne('App\Genital');
    }

    public function regionAnal()
    {
        return $this->hasOne('App\RegionAnal');
    }


}
