<?php

namespace App;

use App\Models\TipoEstudio;
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
        return $this->hasMany('App\Models\VoucherEstudio', 'voucher_id', 'id');
    }
    
    public function historiaClinica()
    {
        return $this->hasOne('App\HistoriaClinica', 'voucher_id', 'id');
    }

    public function declaracionJurada()
    {
        return $this->hasOne('App\DeclaracionJurada', 'voucher_id', 'id');
    }

    public function posicionesForzadas()
    {
        return $this->hasOne('App\PosicionesForzada', 'voucher_id', 'id');
    }

    public function iluminacionDireccionado()
    {
        return $this->hasOne('App\Models\IluminacionDireccionado', 'voucher_id', 'id');
    }

    public function aptitud()
    {
        return $this->hasOne('App\Models\Aptitud', 'voucher_id', 'id');
    }

    //-------------------METODOS------------------------//

        //Devuelve todos los voucher-estudios a cargar del voucher
        public function estudiosCargar()
        {
            $estudios = [];
            foreach ($this->vouchersEstudios as $item) {
                if ($item->estudio->carga){
                    $estudios[] = $item;
                }
            }
            return $estudios;
        }
    
        //Devuelve todos los voucher-estudios a cargar del voucher
        public function estudiosCargados()
        {
            $estudios = [];
            foreach ($this->vouchersEstudios as $item) {
                if (($item->estudio->nombre !="DECLARACION JURADA")and($item->estudio->nombre !="HISTORIA CLINICA")and($item->estudio->nombre !="POSICIONES FORZADAS")and($item->estudio->nombre !="ILUMINACION")) {
                    if ($item->archivo_adjunto){
                        $estudios[] = $item;
                    }
                }
            }
            return $estudios;
        }
    
        //Devuelve todos los tipos de estudios de los estudios del voucher
        public function tiposEstudios()
        {
            $tipo_estudios = [];
            foreach (TipoEstudio::all() as $tipo) {
                $carga = false;
                foreach ($this->vouchersEstudios as $item) {
                    if ($item->estudio->tipoEstudio == $tipo){
                        $carga = true;
                    }
                }
                if ($carga){
                    $tipo_estudios[] = $tipo;
                }
            }
            return $tipo_estudios;
        }
    
        //Devuelve voucher estudio con el mismo nombre de parametro
        public function getVoucherEstudio($nombre)
        {
            $voucherEstudio = "";
            foreach ($this->vouchersEstudios as $item) {
                if ($item->estudio->nombre == $nombre) {
                    $voucherEstudio = $item;
                }
            }
            return $voucherEstudio;
        }

        //Devuelve una matriz con todos los estudios clasificados por tipo. $Estudios[tipo][estudios]
        public function getEstudiosClasificados()
        {   
            $estudiosClasificados = [];
            $tipos = $this->tiposEstudios();
            $voucher_estudios = $this->vouchersEstudios;

            //Por cada tipo
            for ($i=0; $i < sizeof($tipos); $i++) { 
                $estudiosClasificados[$i][0] = $tipos[$i];   //tipo de estudio
                $estudiosClasificados[$i][1] = [];           //estudios[]

                //Por cada estudio
                foreach ($voucher_estudios as $voucher_estudio) {
                    if ($tipos[$i]->nombre == $voucher_estudio->estudio->tipoEstudio->nombre) {
                        $estudiosClasificados[$i][1][] = $voucher_estudio->estudio;
                    }
                }
            }
            return $estudiosClasificados;
        }
}