<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\DeclaracionJurada;
use App\AntecedenteFamiliar;
use App\AntecedenteMedicoInfancia;
use App\AntecedentePersonal;
use App\AntecedenteQuirurjico;
use App\AntecedenteReciente;
use App\Voucher;
use App\PersonalClinica;

use PDF;
use Carbon\Carbon;

class DeclaracionJuradaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:listar declaraciones_juradas|crear declaracion_jurada|editar declaracion_jurada|eliminar declaracion_jurada', ['only' => ['index','store']]);
         $this->middleware('permission:crear declaracion_jurada', ['only' => ['create','store']]);
         $this->middleware('permission:editar declaracion_jurada', ['only' => ['edit','update']]);
         $this->middleware('permission:eliminar declaracion_jurada', ['only' => ['destroy']]);
    }

    public function traerDatosPaciente(Request $request)
    {


        $voucher=Voucher::find($request->id);

        $retorno = [
            'documento'         =>  number_format( (intval($voucher->paciente->documento)/1000), 3, '.', '.'),
            'nombres'           =>  $voucher->paciente->nombreCompleto(),
            'fecha_nacimiento'  =>  Carbon::parse($voucher->paciente->fecha_nacimiento)->format('d/m/Y'),
            'foto'              =>  asset('imagenes/paciente/'.$voucher->paciente->foto),
            'cuil'              =>  $voucher->paciente->cuil,
            'sexo'              =>  $voucher->paciente->sexo->definicion,
        ];
        return response()->json($retorno);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $declaraciones_juradas = DeclaracionJurada::all();
        return view('declaracion_jurada.index',compact('declaraciones_juradas'));
    }

    //cuando todo funcione probar con compact
    public function crearPDF($id)
    {
    $declaracion_jurada=DeclaracionJurada::find($id);

        $pdf = PDF::loadView('declaracion_jurada.pdf',[
            "declaracion_jurada"   =>  $declaracion_jurada
            ]);

        $pdf->setPaper('a4','letter');

        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vouchers=Voucher::all();
        //trae a los puestos que no sean amdinistradores ni secretarias
        $personal_clinicas = PersonalClinica::whereNotIn('puesto_id', [1,2])->get();
        return view('declaracion_jurada.create', compact('vouchers','personal_clinicas'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $voucher=Voucher::find($request->voucher_id);
            $paciente=Paciente::find($voucher->paciente_id);
            $paciente->peso=$request->peso;
            $paciente->estatura=$request->estatura;
            $paciente->update();            
        
            $n=DeclaracionJurada::count() + 1;

            //Creo una instancia de declaracion jurada
            $declaracion_jurada=new DeclaracionJurada();
            $declaracion_jurada->firma=$request->firma;
            $declaracion_jurada->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
            $declaracion_jurada->personal_clinica_id=$request->personal_clinica_id;
            $declaracion_jurada->voucher_id=$request->voucher_id;
            $declaracion_jurada->ciudad_id=18; //Todos a Puerto Rico
            $declaracion_jurada->fecha_realizacion=$request->fecha_realizacion;
            $declaracion_jurada->save();

            $antecedente_familiar=new AntecedenteFamiliar();
            $antecedente_familiar->su_padre_vive=$request->su_padre_vive;
            $antecedente_familiar->su_madre_vive=$request->su_madre_vive;
            $antecedente_familiar->cancer=$request->cancer;
            $antecedente_familiar->diabetes=$request->diabetes;
            $antecedente_familiar->infarto=$request->infarto;
            $antecedente_familiar->hipertension_Arterial=$request->hipertension_Arterial;
            $antecedente_familiar->detalle=$request->detalle;
            $antecedente_familiar->declaracion_jurada_id=$declaracion_jurada->id;
            $antecedente_familiar->save();



            $antecedente_personal=new AntecedentePersonal();
            $antecedente_personal->fuma=$request->fuma;
            $antecedente_personal->bebe=$request->bebe;
            $antecedente_personal->actividad_fisica=$request->actividad_fisica;
            $antecedente_personal->detalle1_p=$request->detalle1_p;
            $antecedente_personal->especificacion1_p=$request->especificacion1_p;
            $antecedente_personal->detalle2_p=$request->detalle2_p;
            $antecedente_personal->especificacion2_p=$request->especificacion2_p;
            $antecedente_personal->detalle3_p=$request->detalle3_p;
            $antecedente_personal->especificacion3_p=$request->especificacion3_p;
            $antecedente_personal->declaracion_jurada_id=$declaracion_jurada->id;
            $antecedente_personal->save();

            $antecedente_medico_infancia=new AntecedenteMedicoInfancia();
            $antecedente_medico_infancia->sarampion=$request->sarampion;
            $antecedente_medico_infancia->rebeola=$request->rebeola;
            $antecedente_medico_infancia->epilepsia=$request->epilepsia;
            $antecedente_medico_infancia->varicela=$request->varicela;
            $antecedente_medico_infancia->parotiditis=$request->parotiditis;
            $antecedente_medico_infancia->cefalea_prolongada=$request->cefalea_prolongada;
            $antecedente_medico_infancia->hepatitis=$request->hepatitis;
            $antecedente_medico_infancia->gastritis=$request->gastritis;
            $antecedente_medico_infancia->ulcera_gastrica=$request->ulcera_gastrica;
            $antecedente_medico_infancia->hemorroide=$request->hemorroide;
            $antecedente_medico_infancia->hemorragias=$request->hemorragias;
            $antecedente_medico_infancia->neumonia=$request->neumonia;
            $antecedente_medico_infancia->asma=$request->asma;
            $antecedente_medico_infancia->tuberculosis=$request->tuberculosis;
            $antecedente_medico_infancia->tos_cronica=$request->tos_cronica;
            $antecedente_medico_infancia->catarro=$request->catarro;
            $antecedente_medico_infancia->detalle1_m=$request->detalle1_m;
            $antecedente_medico_infancia->especificacion1_m=$request->especificacion1_m;
            $antecedente_medico_infancia->declaracion_jurada_id=$declaracion_jurada->id;
            $antecedente_medico_infancia->save();


            $antecedente_reciente=new AntecedenteReciente();
            $antecedente_reciente->pregunta1_reciente=$request->pregunta1_reciente;
            $antecedente_reciente->detalle1_reciente=$request->detalle1_reciente;
            $antecedente_reciente->especificacion1_reciente=$request->especificacion1_reciente;

            $antecedente_reciente->pregunta2_reciente=$request->pregunta2_reciente;
            $antecedente_reciente->detalle2_reciente=$request->detalle2_reciente;
            $antecedente_reciente->especificacion2_reciente=$request->especificacion2_reciente;

            $antecedente_reciente->pregunta3_reciente=$request->pregunta3_reciente;
            $antecedente_reciente->detalle3_reciente=$request->detalle3_reciente;
            $antecedente_reciente->especificacion3_reciente=$request->especificacion3_reciente;

            $antecedente_reciente->pregunta4_reciente=$request->pregunta4_reciente;
            $antecedente_reciente->detalle4_reciente=$request->detalle4_reciente;
            $antecedente_reciente->especificacion4_reciente=$request->especificacion4_reciente;

            $antecedente_reciente->pregunta5_reciente=$request->pregunta5_reciente;
            $antecedente_reciente->detalle5_reciente=$request->detalle5_reciente;
            $antecedente_reciente->especificacion5_reciente=$request->especificacion5_reciente;

            $antecedente_reciente->pregunta6_reciente=$request->pregunta6_reciente;
            $antecedente_reciente->detalle6_reciente=$request->detalle6_reciente;
            $antecedente_reciente->especificacion6_reciente=$request->especificacion6_reciente;

            $antecedente_reciente->pregunta7_reciente=$request->pregunta7_reciente;
            $antecedente_reciente->detalle7_reciente=$request->detalle7_reciente;
            $antecedente_reciente->especificacion7_reciente=$request->especificacion7_reciente;

            $antecedente_reciente->pregunta8_reciente=$request->pregunta8_reciente;
            $antecedente_reciente->detalle8_reciente=$request->detalle8_reciente;
            $antecedente_reciente->especificacion8_reciente=$request->especificacion8_reciente;

            $antecedente_reciente->pregunta9_reciente=$request->pregunta9_reciente;
            $antecedente_reciente->detalle9_reciente=$request->detalle9_reciente;
            $antecedente_reciente->especificacion9_reciente=$request->especificacion9_reciente;

            $antecedente_reciente->pregunta10_reciente=$request->pregunta10_reciente;
            $antecedente_reciente->detalle10_reciente=$request->detalle10_reciente;
            $antecedente_reciente->especificacion10_reciente=$request->especificacion10_reciente;

            $antecedente_reciente->pregunta11_reciente=$request->pregunta11_reciente;
            $antecedente_reciente->detalle11_reciente=$request->detalle11_reciente;
            $antecedente_reciente->especificacion11_reciente=$request->especificacion11_reciente;

            $antecedente_reciente->pregunta12_reciente=$request->pregunta12_reciente;
            $antecedente_reciente->detalle12_reciente=$request->detalle12_reciente;
            $antecedente_reciente->especificacion12_reciente=$request->especificacion12_reciente;

            $antecedente_reciente->pregunta13_reciente=$request->pregunta13_reciente;
            $antecedente_reciente->detalle13_reciente=$request->detalle13_reciente;
            $antecedente_reciente->especificacion13_reciente=$request->especificacion13_reciente;

            $antecedente_reciente->pregunta14_reciente=$request->pregunta14_reciente;
            $antecedente_reciente->detalle14_reciente=$request->detalle14_reciente;
            $antecedente_reciente->especificacion14_reciente=$request->especificacion14_reciente;

            $antecedente_reciente->declaracion_jurada_id=$declaracion_jurada->id;
            $antecedente_reciente->save();


            $antecedente_quirurjico=new AntecedenteQuirurjico();
            $antecedente_quirurjico->pregunta1_q=$request->pregunta1_q;
            $antecedente_quirurjico->detalle1_q=$request->detalle1_q;
            $antecedente_quirurjico->especificacion1_q=$request->especificacion1_q;
            $antecedente_quirurjico->pregunta2_q=$request->pregunta2_q;
            $antecedente_quirurjico->detalle2_q=$request->detalle2_q;
            $antecedente_quirurjico->pregunta3_q=$request->pregunta3_q;
            $antecedente_quirurjico->detalle3_q=$request->detalle3_q;
            $antecedente_quirurjico->especificacion3_q=$request->especificacion3_q;
            $antecedente_quirurjico->declaracion_jurada_id=$declaracion_jurada->id;

            $antecedente_quirurjico->save();


        return redirect()->route('declaracion_jurada.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
