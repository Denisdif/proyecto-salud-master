<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Voucher extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'codigo',
        'user_id', 
        'paciente_id',
        'declaracion',
        'hc_formulario',
        'posiciones_forzadas',
        'direccionado'
    ];

    /*HAS es si tiene el id el otro
    BELONG es si el id lo tengo yo*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function voucherPaciente()
    {
        return $this->created_at->format('d/m/Y') . " - " . $this->paciente->nombreCompleto() . " - " . $this->paciente->documento;
    }

    public function vouchersEstudios()
    {
        return $this->hasMany('App\Models\VouchersEstudio', 'estudio_id', 'id');
    }
    
}