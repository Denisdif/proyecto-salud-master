<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IluminacionDireccionado extends Model
{
    protected $fillable = [ 'puesto',
                            'antiguedad',
                            'direccion_completa',
                            'observaciones',
                            'voucher_id',
                            'enfermedades',
                            'transtornos_congenitos',
                            'enfermedades_profecionales',
                            'exposicion_anterior',
                            'exposicion_actual',
                            'cefaleas',
                            'vision_doble',
                            'mareo_vertigo',
                            'conjuntivitis',
                            'vision _borrosa',
                            'inseguridad_de_pie',
                            'no_centrados',
                            'pupilas_anormales',
                            'conjuntivas_anormales',
                            'corneas_anormales',
                            'motilidad_anormal',
                            'nistagmus_ausente',
                            'informe_ocular',
                            'av_correccion',
                            'av_sin_correccion'];

    public function voucher()
    {
        return $this->hasOne('App\Voucher', 'id', 'voucher_id');
    }
}
