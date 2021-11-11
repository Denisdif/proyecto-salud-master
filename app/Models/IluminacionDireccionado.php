<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IluminacionDireccionado extends Model
{
    protected $fillable = [ 'puesto','antiguedad','direccion_completa','observaciones','voucher_id','enfermedades','transtornos_congenitos',
                            'enfermedades_profecionales','exposicion_anterior','exposicion_actual','cefaleas','vision_doble','mareo_vertigo',
                            'conjuntivitis','vision_borrosa','inseguridad_de_pie','no_centrados','pupilas_anormales','conjuntivas_anormales',
                            'corneas_anormales','motilidad_anormal','nistagmus_ausente','informe_ocular','av_correccion','av_sin_correccion'];

    public function voucher()
    {
        return $this->hasOne('App\Voucher', 'id', 'voucher_id');
    }

    public function generarDiagnostico()
    {
            // Generación de Diagnóstico
                /* La generación deldiagnostico se realiza cargando dos arrays, uno con las etiquetas y otro con los atributos.
                Luego se procede a cargar sólo los atributos que fueron cargados cuando se generó el formulario*/
                $matriz = [];
                $diagnostico = "<b>ANTECEDENTES</b><br><br>";
                //Carga variables
                    $matriz[] = [       //ANTECEDENTES
                                        $this->enfermedades,
                                        $this->transtornos_congenitos,
                                        $this->enfermedades_profecionales,
                                        $this->exposicion_anterior,
                                        $this->exposicion_actual,

                                        //EXAMEN CLINICO
                                        ' ',
                                        $this->cefaleas,
                                        $this->vision_doble,
                                        $this->mareo_vertigo,
                                        $this->conjuntivitis,
                                        $this->vision_borrosa,
                                        $this->inseguridad_de_pie,

                                        //EXAMEN OCULAR
                                        ' ',
                                        $this->no_centrados,
                                        $this->pupilas_anormales,
                                        $this->conjuntivas_anormales,
                                        $this->corneas_anormales,
                                        $this->motilidad_anormal,
                                        $this->nistagmus_ausente,
                                        $this->informe_ocular,
                                        $this->av_correccion,
                                        $this->av_sin_correccion,

                                        $this->observaciones,
                                    ];
                //
                //Carga Labels
                    $matriz[] = [  
                                    //ANTECEDENTES
                                    'Enfermedades: ',
                                    'Transtornos congenitos: ',
                                    'Enfermedades profecionales: ',
                                    'Exposicion al riesgo anterior: ',
                                    'Exposicion al riesgo actual: ',

                                    //EXAMEN CLINICO
                                    '<br><b>EXAMEN CLINICO</b><br>',
                                    'Cefaleas: ',
                                    'Visión doble: ',
                                    'Mareo / vértigo: ',
                                    'Conjuntivitis: ',
                                    'Vision borrosa: ',
                                    'Inseguridad en posición de pie: ',

                                    //EXAMEN OCULAR
                                    '<br><b>EXAMEN OCULAR</b><br>',
                                    'No centrados: ',
                                    'Pupilas anormales: ',
                                    'Conjuntivas anormales: ',
                                    'Corneas anormales: ',
                                    'Motilidad anormal: ',
                                    'Nistagmus ausente: ',
                                    'Informe ocular: ',
                                    'Agudeza visual con corrección: ',
                                    'Agudeza visual sin correccion: ',

                                    'Observaciones: ',
                        ];
                //
                //Carga de diagnostico
                for ($i=0; $i < sizeof($matriz[1]); $i++) {
                    if ($matriz[0][$i]) {
                        $diagnostico = $diagnostico.$matriz[1][$i].$matriz[0][$i]."<br>";
                    }
                };
        return $diagnostico;
    }
    
}
