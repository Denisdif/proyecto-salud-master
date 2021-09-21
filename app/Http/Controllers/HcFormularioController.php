<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriaClinica;
use App\HcFormulario;
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
use PDF;
class HcFormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HistoriaClinica $historiaClinica)
    {
        $hc_formularios=HcFormulario::whereHistoria_clinica_id($historiaClinica->id)->get();



        return view("hc_formulario.index",compact('hc_formularios'));
    }

    public function crearPDF($id)
    {
        $hc_formulario=HcFormulario::find($id);

        $pdf = PDF::loadView('hc_formulario.pdf',[
            "hc_formulario"   =>  $hc_formulario
            ]);

        $pdf->setPaper('a4','letter');


        return $pdf->download('hc_formulario.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(HistoriaClinica $historiaClinica)
    {

        $hc=$historiaClinica->id;

        return view("hc_formulario.create",compact('hc'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $n=HcFormulario::count() + 1;

        $hc_formularios=new HcFormulario();
        $hc_formularios->firma=$request->firma;
        $hc_formularios->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
        $hc_formularios->user_id=auth()->user()->id;
        $hc_formularios->historia_clinica_id=$request->historia_clinica_id;
        $hc_formularios->save();

        //Examen Clinico
        $examen_clinico=new ExamenClinico();
        $examen_clinico->peso=$request->peso;
        $examen_clinico->estatura=$request->estatura;
        $examen_clinico->sobrepeso=$request->sobrepeso;
        $examen_clinico->imc=$request->imc;
        $examen_clinico->medicacion_actual=$request->medicacion_actual;
        $examen_clinico->hc_formulario_id=$hc_formularios->id;
        $examen_clinico->save();


        //Cardiovascular
        $cardiovascular=new Cardiovascular();
        $cardiovascular->frecuencia_cardiaca=$request->frecuencia_cardiaca;
        $cardiovascular->tension_arterial=$request->tension_arterial;
        $cardiovascular->pulso=$request->pulso;
        $cardiovascular->varices=$request->varices;
        $cardiovascular->observacion_varices=$request->observacion_varices;
        $cardiovascular->hc_formulario_id=$hc_formularios->id;
        $cardiovascular->save();


        //PIEL
        $piel=new Piel();
        $piel->pregunta1_piel=$request->pregunta1_piel;
        $piel->observacion1_piel=$request->observacion1_piel;
        $piel->vesicula=$request->vesicula;
        $piel->obs_vesicula=$request->obs_vesicula;
        $piel->ulceras=$request->ulceras;
        $piel->obs_ulceras=$request->obs_ulceras;
        $piel->fisuras=$request->fisuras;
        $piel->obs_fisuras=$request->obs_fisuras;
        $piel->prurito=$request->prurito;
        $piel->obs_prurito=$request->obs_prurito;
        $piel->eczemas=$request->eczemas;
        $piel->obs_eczemas=$request->obs_eczemas;
        $piel->dertmatitis=$request->dertmatitis;
        $piel->obs_dertmatitis=$request->obs_dertmatitis;
        $piel->eritemas=$request->eritemas;
        $piel->obs_eritemas=$request->obs_eritemas;
        $piel->petequias=$request->petequias;
        $piel->obs_petequias=$request->obs_petequias;
        $piel->tejido=$request->tejido;
        $piel->hc_formulario_id=$hc_formularios->id;
        $piel->save();

        //OSTEOARTICULAR
        $osteoarticular=new Osteoarticular();
        $osteoarticular->pregunta1_os=$request->pregunta1_os;
        $osteoarticular->observacion1_os=$request->observacion1_os;
        $osteoarticular->pregunta2_os=$request->pregunta2_os;
        $osteoarticular->observacion2_os=$request->observacion2_os;
        $osteoarticular->pregunta3_os=$request->pregunta3_os;
        $osteoarticular->observacion3_os=$request->observacion3_os;
        $osteoarticular->pregunta4_os=$request->pregunta4_os;
        $osteoarticular->observacion4_os=$request->observacion4_os;
        $osteoarticular->obervacion_os=$request->obervacion_os;
        $osteoarticular->hc_formulario_id=$hc_formularios->id;
        $osteoarticular->save();

        //COLUMNA VERTEBRAL
        $columna=new Columna();
        $columna->pregunta1_col=$request->pregunta1_col;
        $columna->observacion1_col=$request->observacion1_col;
        $columna->pregunta2_col=$request->pregunta2_col;
        $columna->observacion2_col=$request->observacion2_col;
        $columna->pregunta3_col=$request->pregunta3_col;
        $columna->observacion3_col=$request->observacion3_col;
        $columna->pregunta4_col=$request->pregunta4_col;
        $columna->observacion4_col=$request->observacion4_col;
        $columna->obervacion_col=$request->obervacion_col;
        $columna->hc_formulario_id=$hc_formularios->id;
        $columna->save();

         //CABEZA Y CUELLO
         $cabezacuello=new CabezaCuello();
         $cabezacuello->pregunta1_cc=$request->pregunta1_cc;
         $cabezacuello->observacion1_cc=$request->observacion1_cc;
         $cabezacuello->pregunta2_cc=$request->pregunta2_cc;
         $cabezacuello->observacion2_cc=$request->observacion2_cc;
         $cabezacuello->pregunta3_cc=$request->pregunta3_cc;
         $cabezacuello->observacion3_cc=$request->observacion3_cc;
         $cabezacuello->pregunta4_cc=$request->pregunta4_cc;
         $cabezacuello->observacion4_cc=$request->observacion4_cc;
         $cabezacuello->pregunta5_cc=$request->pregunta5_cc;
         $cabezacuello->observacion5_cc=$request->observacion5_cc;
         $cabezacuello->pregunta6_cc=$request->pregunta6_cc;
         $cabezacuello->observacion6_cc=$request->observacion6_cc;
         $cabezacuello->hc_formulario_id=$hc_formularios->id;
         $cabezacuello->save();

        //OFTALMOLÓGICO
        $oftalmologico=new Oftalmologico();
        $oftalmologico->pregunta1_of=$request->pregunta1_of;
        $oftalmologico->observacion1_of=$request->observacion1_of;
        $oftalmologico->pregunta2_of=$request->pregunta2_of;
        $oftalmologico->observacion2_of=$request->observacion2_of;
        $oftalmologico->pregunta3_of=$request->pregunta3_of;
        $oftalmologico->observacion3_of=$request->observacion3_of;
        $oftalmologico->pregunta4_of=$request->pregunta4_of;
        $oftalmologico->observacion4_of=$request->observacion4_of;
        $oftalmologico->pregunta5_of=$request->pregunta5_of;
        $oftalmologico->observacion5_of=$request->observacion5_of;
        $oftalmologico->pregunta6_of=$request->pregunta6_of;
        $oftalmologico->observacion6_of=$request->observacion6_of;
        $oftalmologico->pregunta7_of=$request->pregunta7_of;
        $oftalmologico->obervacion_of=$request->obervacion_of;
        $oftalmologico->hc_formulario_id=$hc_formularios->id;
        $oftalmologico->save();

        //NEUROLOGICO
        $neutologico=new Neurologico();
        $neutologico->pregunta1_neu=$request->pregunta1_neu;
        $neutologico->observacion1_neu=$request->observacion1_neu;
        $neutologico->pregunta2_neu=$request->pregunta2_neu;
        $neutologico->observacion2_neu=$request->observacion2_neu;
        $neutologico->pregunta3_neu=$request->pregunta3_neu;
        $neutologico->observacion3_neu=$request->observacion3_neu;
        $neutologico->pregunta4_neu=$request->pregunta4_neu;
        $neutologico->observacion4_neu=$request->observacion4_neu;
        $neutologico->pregunta5_neu=$request->pregunta5_neu;
        $neutologico->observacion5_neu=$request->observacion5_neu;
        $neutologico->pregunta6_neu=$request->pregunta6_neu;
        $neutologico->observacion6_neu=$request->observacion6_neu;
        $neutologico->pregunta7_neu=$request->pregunta7_neu;
        $neutologico->observacion7_neu=$request->observacion7_neu;
        $neutologico->observacion_neu=$request->observacion_neu;
        $neutologico->hc_formulario_id=$hc_formularios->id;
        $neutologico->save();


        //ODONTOLOGICO
        $odontologico=new Odontologico();
        $odontologico->pregunta1_od=$request->pregunta1_od;
        $odontologico->observacion1_od=$request->observacion1_od;
        $odontologico->pregunta2_od=$request->pregunta2_od;
        $odontologico->observacion2_od=$request->observacion2_od;
        $odontologico->pregunta3_od=$request->pregunta3_od;
        $odontologico->pregunta4_od=$request->pregunta4_od;
        $odontologico->pregunta5_od=$request->pregunta5_od;
        $odontologico->superior=$request->superior;
        $odontologico->inferior=$request->inferior;
        $odontologico->observacion_od=$request->observacion_od;
        $odontologico->hc_formulario_id=$hc_formularios->id;
        $odontologico->save();

        //TORAX Y APARTO RESPIRATORIO
        $respiratorio=new Respiratorio();
        $respiratorio->pregunta1_re=$request->pregunta1_re;
        $respiratorio->observacion1_re=$request->observacion1_re;
        $respiratorio->pregunta2_re=$request->pregunta2_re;
        $respiratorio->observacion2_re=$request->observacion2_re;
        $respiratorio->hc_formulario_id=$hc_formularios->id;
        $respiratorio->save();

        //ABDOMEN
        $abdomen=new Abdomen();
        $abdomen->pregunta1_ab=$request->pregunta1_ab;
        $abdomen->observacion1_ab=$request->observacion1_ab;
        $abdomen->pregunta2_ab=$request->pregunta2_ab;
        $abdomen->observacion2_ab=$request->observacion2_ab;
        $abdomen->pregunta3_ab=$request->pregunta3_ab;
        $abdomen->observacion3_ab=$request->observacion3_ab;
        $abdomen->pregunta4_ab=$request->pregunta4_ab;
        $abdomen->observacion4_ab=$request->observacion4_ab;
        $abdomen->pregunta5_ab=$request->pregunta5_ab;
        $abdomen->observacion5_ab=$request->observacion5_ab;
        $abdomen->pregunta6_ab=$request->pregunta6_ab;
        $abdomen->observacion6_ab=$request->observacion6_ab;
        $abdomen->observacion_ab=$request->observacion_ab;
        $abdomen->hc_formulario_id=$hc_formularios->id;
        $abdomen->save();

        //REGIONES INGUINALES
        $inguinal=new RegionInguinal();
        $inguinal->pregunta1_in=$request->pregunta1_in;
        $inguinal->observacion1_in=$request->observacion1_in;
        $inguinal->pregunta2_in=$request->pregunta2_in;
        $inguinal->observacion2_in=$request->observacion2_in;
        $inguinal->pregunta3_in=$request->pregunta3_in;
        $inguinal->observacion3_in=$request->observacion3_in;
        $inguinal->observacion_in=$request->observacion_in;
        $inguinal->hc_formulario_id=$hc_formularios->id;
        $inguinal->save();

        //GENITALES
        $genital=new Genital();
        $genital->pregunta1_ge=$request->pregunta1_ge;
        $genital->observacion1_ge=$request->observacion1_ge;
        $genital->observacion_ge=$request->observacion_ge;
        $genital->hc_formulario_id=$hc_formularios->id;
        $genital->save();

        //REGIÓN ANAL
        $reganal=new RegionAnal();
        $reganal->pregunta1_an=$request->pregunta1_an;
        $reganal->observacion1_an=$request->observacion1_an;
        $reganal->observacion_an=$request->observacion_an;
        $reganal->hc_formulario_id=$hc_formularios->id;
        $reganal->save();


        return redirect()->route('hc_formulario.index',$hc_formularios->historia_clinica_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hcFormulario  $hcFormulario
     * @return \Illuminate\Http\Response
     */
    public function show(hcFormulario $hcFormulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hcFormulario  $hcFormulario
     * @return \Illuminate\Http\Response
     */
    public function edit(hcFormulario $hcFormulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hcFormulario  $hcFormulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hcFormulario $hcFormulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hcFormulario  $hcFormulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(hcFormulario $hcFormulario)
    {
        //
    }
}
