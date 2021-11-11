<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aptitud extends Model
{
    protected $fillable = [ 'voucher_id',
                            'firma',
                            'preexistencias',
                            'aptitud_laboral',
                            'comentarios',
                          ];

    public function voucher()
    {
        return $this->hasOne('App\Voucher', 'id', 'voucher_id');
    }

}
