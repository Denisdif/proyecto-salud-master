<?php

namespace App\Http\Controllers;

use App\HistoriaClinica;
use App\Paciente;
use App\ExamenClinico;
use App\Cardiovascular;
use App\Piel;
use App\Osteoarticular;
use App\Columna;
use App\CabezaCuello;
use App\Oftalmologico;
use App\Neurologico;
use App\Odontologico;
use App\Respiratorio;
use App\Abdomen;
use App\RegionInguinal;
use App\Genital;
use App\RegionAnal;
use App\Voucher;
use App\ObraSocial;
use App\Origen;
use App\Domicilio;
use App\Ciudad;
use App\Pais;
use App\Provincia;
use App\Barrio;
use App\Calle;

use Illuminate\Http\Request;


class HistoriaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias_clinicas = HistoriaClinica::all();
        return view('historia_clinica.index',compact('historias_clinicas'));
    }

    public function crearPDF($id)
    {
    $historia_clinica=HistoriaClinica::find($id);
        $pdf = PDF::loadView('hc_formulario.pdf',[
            "historia_clinica"   =>  $historia_clinica
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->download('historia-clinica.pdf');
    }

    public function create($id)
    {
        $pacientes=Paciente::where('historia_clinica',false)->get();
        //esta variable $voucher deberia traer el voucher + nombre del paciente y dni + fecha...en el modelo y quedarte eunuco
        $voucher  = Voucher::find($id);
        $origenes = Origen::all();
        $obra_sociales = ObraSocial::all();
        $paises=Pais::all();

        return view('historia_clinica.create', compact('voucher','pacientes','origenes','obra_sociales','paises'));
    }

    public function store(Request $request)
    {
        $n=HistoriaClinica::count() + 1;
        $historia_clinica=new HistoriaClinica();
        // Generación de Diagnóstico
            /* La generación deldiagnostico se realiza cargando dos arrays, uno con las etiquetas y otro con los atributos.
            Luego se procede a cargar sólo los atributos que fueron cargados cuando se generó el formulario*/
            $matriz = [];
            $diagnostico = "<b>EXAMEN CLÍNICO</b><br><br>";
            //Carga variables
                $matriz[] = [           //Examen Clinico
                                        $request->peso,
                                        $request->estatura,
                                        $request->sobrepeso,
                                        $request->imc,
                                        $request->medicacion_actual,

                                        //Cardiovascular
                                        ' ',
                                        $request->frecuencia_cardiaca,
                                        $request->tension_arterial,
                                        $request->pulso,
                                        $request->varices,
                                        $request->observacion_varices,

                                        //Piel
                                        ' ',
                                        $request->observacion1_piel,
                                        $request->obs_vesicula,
                                        $request->obs_ulceras,
                                        $request->obs_fisuras,
                                        $request->obs_prurito,
                                        $request->obs_eczemas,
                                        $request->obs_dertmatitis,
                                        $request->obs_eritemas,
                                        $request->obs_petequias,
                                        $request->tejido,

                                        //OSTEOARTICULAR
                                        ' ',
                                        $request->observacion1_os,
                                        $request->observacion2_os,
                                        $request->observacion3_os,
                                        $request->observacion4_os,
                                        $request->observacion_os,

                                        //COLUMNA VERTEBRAL
                                        ' ',
                                        $request->observacion1_col,
                                        $request->observacion2_col,
                                        $request->observacion3_col,
                                        $request->observacion4_col,
                                        $request->observacion_col,

                                        //CABEZA Y CUELLO
                                        ' ',
                                        $request->observacion1_cc,
                                        $request->observacion2_cc,
                                        $request->observacion3_cc,
                                        $request->observacion4_cc,
                                        $request->observacion5_cc,
                                        $request->observacion6_cc,

                                        //OFTALMOLÓGICO
                                        ' ',
                                        $request->observacion1_of,
                                        $request->observacion2_of,
                                        $request->observacion3_of,
                                        $request->observacion4_of,
                                        $request->observacion5_of,
                                        $request->observacion6_of,
                                        $request->pregunta7_of,
                                        $request->observacion_of,

                                        //NEUROLOGICO
                                        ' ',
                                        $request->observacion1_neu,
                                        $request->observacion2_neu,
                                        $request->observacion3_neu,
                                        $request->observacion4_neu,
                                        $request->observacion5_neu, 
                                        $request->observacion6_neu,
                                        $request->observacion7_neu,
                                        $request->observacion_neu,

                                        //ODONTOLOGICO
                                        ' ',
                                        $request->observacion1_od,
                                        $request->observacion2_od,
                                        $request->pregunta4_od, 
                                        $request->pregunta5_od,
                                        $request->superior,
                                        $request->inferior,
                                        $request->observacion_od,

                                        //TORAX Y APARTO RESPIRATORIO
                                        ' ',
                                        $request->observacion1_re,
                                        $request->observacion2_re,

                                        //ABDOMEN
                                        ' ',
                                        $request->observacion1_ab,
                                        $request->observacion2_ab,
                                        $request->observacion3_ab,
                                        $request->observacion4_ab,
                                        $request->observacion5_ab,
                                        $request->observacion6_ab,
                                        $request->observacion_ab,

                                        //REGIONES INGUINALES
                                        ' ',
                                        $request->observacion1_in,
                                        $request->observacion2_in,
                                        $request->observacion3_in,
                                        $request->observacion_in,

                                        //GENITALES
                                        ' ',
                                        $request->observacion1_ge,
                                        $request->observacion_ge,

                                        //REGIÓN ANAL
                                        ' ',
                                        $request->observacion1_an,
                                        $request->observacion_an,
                ];
            //
            //Carga Labels
                $matriz[] = [   'Peso: ',
                                'Estatura: ',
                                'Sobrepeso:',
                                'IMC: ',
                                'Medicación adicional: ',

                                '<br><b>CARDIOVASCULAR</b><br>',
                                'Fecruencia cardíaca: ',
                                'Tensión arterial "S":',
                                'Pulso "N"',
                                'Várices: ',
                                'Tipo várices: ',

                                '<br><b>PIEL</b><br>',
                                'Cicatrices patológicas visibles: ',
                                'Vesícula: ',
                                'Ulceras: ',
                                'Fisuras: ',
                                'Prurito: ',
                                'Eczemas: ',
                                'Dermatitis: ',
                                'Eritemas: ',
                                'Petequias: ',
                                'Tejido celular subcutaneo: ',
                                
                                '<br><b>OSTEOARTICULAR</b><br>',
                                'Limitaciones funcionales: ',
                                'Amputaciones: ',
                                'Movilidad y reflejo: ',
                                'Tonicidad y fuerza muscular normal: ',
                                'Observaciones: ',

                                '<br><b>COLUMNA VERTEBRAL</b><br>',
                                'Examen normal: ',
                                'Contracturas: ',
                                'Puntos dolorosos: ',
                                'Limitaciones funcionales: ',
                                'Observaciones: ',

                                '<br><b>CABEZA Y CUELLO</b><br>',
                                'Cráneo: ',
                                'Cara: ',
                                'Nariz: ',
                                'Oídos: ',
                                'Boca: ',
                                'Cuello y Tiroides: ',

                                '<br><b>OFTALMOLÓGICO</b><br>',
                                'Pupilas: ',
                                'Corneas: ',
                                'Conjuntivas: ',
                                'Visión en colores: ',
                                'Ojo derecho: ',
                                'Ojo izquierdo: ',
                                'Usa lentes: ',
                                'Observaciones: ',

                                '<br><b>NEUROLOGICO</b><br>',
                                'Motilidad activa: ',
                                'Motilidad pasiva: ',
                                'Sensibilidad: ',
                                'Marcha: ',
                                'Reflejos osteotendinosos: ',
                                'Pares craneales: ',
                                'Taxia: ',
                                'Observaciones: ',

                                '<br><b>ODONTOLOGICO</b><br>',
                                'Encias y mucosas: ',
                                'Esmalte dental: ',
                                'Superior: ',
                                'Inferior: ',
                                'Caries: ',
                                'Faltan piezas dentarias: ',
                                'Observaciones: ',
                                
                                '<br><b>TORAX Y APARTO RESPIRATORIO</b><br>',
                                'Caja torácica: ',
                                'Pulmones: ',
                                
                                '<br><b>ABDOMEN</b><br>',
                                'Forma: ',
                                'Hígado: ',
                                'Bazo: ',
                                'Colon: ',
                                'Ruidos hidroaéreos: ',
                                'Puño percusión: ',
                                'Cicatrices quirúrjicas: ',
                                
                                '<br><b>REGIONES INGUINALES</b><br>',
                                'Tono de la pared posterior: ',
                                'Orificios superficiales: ',
                                'Orificios profundos: ',
                                'Observaciones: ',
                                
                                '<br><b>GENITALES</b><br>',
                                'Características: ',
                                'Observaciones: ',
                                
                                '<br><b>REGIÓN ANAL</b><br>',
                                'Características: ',
                                'Observaciones: ',
                                ];
                
            //
            //Carga de diagnostico
                for ($i=0; $i < sizeof($matriz[1]); $i++) {
                    if ($matriz[0][$i]) {
                        $diagnostico = $diagnostico.$matriz[1][$i].$matriz[0][$i]."<br>";
                    }
                }
                $historia_clinica->diagnostico=$diagnostico;
            //
        //

        //Historia clínica
        //$historia_clinica->firma=$request->firma;
        $historia_clinica->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
        $historia_clinica->voucher_id=$request->voucher_id;
        $historia_clinica->user_id=auth()->user()->id;
        $historia_clinica->save();

        //Actualizar datos de paciente
        $idPaciente = $historia_clinica->voucher->paciente->id;
        $paciente=Paciente::findOrFail($idPaciente);
        $paciente->obra_social_id=$request->get('obra_social_id');
        $paciente->origen_id=$request->get('origen_id');
        $paciente->update();
        //cuando la magia andaba... 
        //Paciente::find($historia_clinica->paciente_id)->update(['historia_clinica'=>true]);
        
        //Carga de tablas
            //Examen Clinico
                $examen_clinico=new ExamenClinico();
                $examen_clinico->peso=                  $request->peso                  ;
                $examen_clinico->estatura=              $request->estatura              ;
                $examen_clinico->sobrepeso=             $request->sobrepeso             ;
                $examen_clinico->imc=                   $request->imc                   ;
                $examen_clinico->medicacion_actual=     $request->medicacion_actual     ;
                $examen_clinico->historia_clinica_id=   $historia_clinica->id           ;
                $examen_clinico->save();
            //
            //Cardiovascular
                $cardiovascular=new Cardiovascular();
                $cardiovascular->frecuencia_cardiaca=         $request->frecuencia_cardiaca;
                $cardiovascular->tension_arterial=            $request->tension_arterial;
                $cardiovascular->pulso=                       $request->pulso;
                $cardiovascular->varices=                     $request->varices;
                $cardiovascular->observacion_varices=         $request->observacion_varices;
                $cardiovascular->historia_clinica_id=         $historia_clinica->id;
                $cardiovascular->save();
            //
            //PIEL
                $piel=new Piel();
                $piel->observacion1_piel=     $request->observacion1_piel;
                $piel->obs_vesicula=          $request->obs_vesicula;
                $piel->obs_ulceras=           $request->obs_ulceras;
                $piel->obs_fisuras=           $request->obs_fisuras;
                $piel->obs_prurito=           $request->obs_prurito;
                $piel->obs_eczemas=           $request->obs_eczemas;
                $piel->obs_dertmatitis=       $request->obs_dertmatitis;
                $piel->obs_eritemas=          $request->obs_eritemas;
                $piel->obs_petequias=         $request->obs_petequias;
                $piel->tejido=                $request->tejido;
                $piel->historia_clinica_id=   $historia_clinica->id;
                $piel->save();
            //
            //OSTEOARTICULAR
                $osteoarticular=new Osteoarticular();
                $osteoarticular->observacion1_os=       $request->observacion1_os;
                $osteoarticular->observacion2_os=       $request->observacion2_os;
                $osteoarticular->observacion3_os=       $request->observacion3_os;
                $osteoarticular->observacion4_os=       $request->observacion4_os;
                $osteoarticular->observacion_os=        $request->observacion_os;
                $osteoarticular->historia_clinica_id=   $historia_clinica->id;
                $osteoarticular->save();
            //
            //COLUMNA VERTEBRAL
                $columna=new Columna();
                $columna->observacion1_col=$request->observacion1_col;
                $columna->observacion2_col=$request->observacion2_col;
                $columna->observacion3_col=$request->observacion3_col;
                $columna->observacion4_col=$request->observacion4_col;
                $columna->observacion_col=$request->observacion_col;
                $columna->historia_clinica_id=$historia_clinica->id;
                $columna->save();
            //
            //CABEZA Y CUELLO
                $cabezacuello=new CabezaCuello();
                $cabezacuello->observacion1_cc=$request->observacion1_cc;
                $cabezacuello->observacion2_cc=$request->observacion2_cc;
                $cabezacuello->observacion3_cc=$request->observacion3_cc;
                $cabezacuello->observacion4_cc=$request->observacion4_cc;
                $cabezacuello->observacion5_cc=$request->observacion5_cc;
                $cabezacuello->observacion6_cc=$request->observacion6_cc;
                $cabezacuello->historia_clinica_id=$historia_clinica->id;
                $cabezacuello->save();
            //
            //OFTALMOLÓGICO
                $oftalmologico=new Oftalmologico();
                $oftalmologico->observacion1_of=$request->observacion1_of;
                $oftalmologico->observacion2_of=$request->observacion2_of;
                $oftalmologico->observacion3_of=$request->observacion3_of;
                $oftalmologico->observacion4_of=$request->observacion4_of;
                $oftalmologico->observacion5_of=$request->observacion5_of;
                $oftalmologico->observacion6_of=$request->observacion6_of;
                $oftalmologico->pregunta7_of=$request->pregunta7_of;
                $oftalmologico->observacion_of=$request->observacion_of;
                $oftalmologico->historia_clinica_id=$historia_clinica->id;
                $oftalmologico->save();
            //
            //NEUROLOGICO
                $neutologico=new Neurologico();
                $neutologico->observacion1_neu=$request->observacion1_neu;
                $neutologico->observacion2_neu=$request->observacion2_neu;
                $neutologico->observacion3_neu=$request->observacion3_neu;
                $neutologico->observacion4_neu=$request->observacion4_neu;
                $neutologico->observacion5_neu=$request->observacion5_neu;
                $neutologico->observacion6_neu=$request->observacion6_neu;
                $neutologico->observacion7_neu=$request->observacion7_neu;
                $neutologico->observacion_neu=$request->observacion_neu;
                $neutologico->historia_clinica_id=$historia_clinica->id;
                $neutologico->save();
            //
            //ODONTOLOGICO
                $odontologico=new Odontologico();
                $odontologico->observacion1_od=$request->observacion1_od;
                $odontologico->observacion2_od=$request->observacion2_od;
                $odontologico->pregunta4_od=$request->pregunta4_od;
                $odontologico->pregunta5_od=$request->pregunta5_od;
                $odontologico->superior=$request->superior;
                $odontologico->inferior=$request->inferior;
                $odontologico->observacion_od=$request->observacion_od;
                $odontologico->historia_clinica_id=$historia_clinica->id;
                $odontologico->save();
            //
            //TORAX Y APARTO RESPIRATORIO
                $respiratorio=new Respiratorio();
                $respiratorio->observacion1_re=$request->observacion1_re;
                $respiratorio->observacion2_re=$request->observacion2_re;
                $respiratorio->historia_clinica_id=$historia_clinica->id;
                $respiratorio->save();
            //
            //ABDOMEN
                $abdomen=new Abdomen();
                $abdomen->observacion1_ab=$request->observacion1_ab;
                $abdomen->observacion2_ab=$request->observacion2_ab;
                $abdomen->observacion3_ab=$request->observacion3_ab;
                $abdomen->observacion4_ab=$request->observacion4_ab;
                $abdomen->observacion5_ab=$request->observacion5_ab;
                $abdomen->observacion6_ab=$request->observacion6_ab;
                $abdomen->observacion_ab=$request->observacion_ab;
                $abdomen->historia_clinica_id=$historia_clinica->id;
                $abdomen->save();
            //
            //REGIONES INGUINALES
                $inguinal=new RegionInguinal();
                $inguinal->observacion1_in=$request->observacion1_in;
                $inguinal->observacion2_in=$request->observacion2_in;
                $inguinal->observacion3_in=$request->observacion3_in;
                $inguinal->observacion_in=$request->observacion_in;
                $inguinal->historia_clinica_id=$historia_clinica->id;
                $inguinal->save();
            //
            //GENITALES
                $genital=new Genital();
                $genital->observacion1_ge=$request->observacion1_ge;
                $genital->observacion_ge=$request->observacion_ge;
                $genital->historia_clinica_id=$historia_clinica->id;
                $genital->save();
            //
            //REGIÓN ANAL
                $reganal=new RegionAnal();
                $reganal->observacion1_an=$request->observacion1_an;
                $reganal->observacion_an=$request->observacion_an;
                $reganal->historia_clinica_id=$historia_clinica->id;
                $reganal->save();
            //
        //
        return $diagnostico;
        return redirect()->route('historia_clinica.index');
    }


    public function show(HistoriaClinica $historiaClinica)
    {
        //
    }


    public function edit(HistoriaClinica $historiaClinica)
    {
        //
    }


    public function update(Request $request, HistoriaClinica $historiaClinica)
    {
        //
    }

    public function destroy(HistoriaClinica $historiaClinica)
    {
        //
    }
}
