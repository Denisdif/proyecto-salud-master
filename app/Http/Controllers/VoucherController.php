<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audiometria;
use App\Models\Espiriometria;
use App\Models\Estudio;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use App\Paciente;
use App\Models\VoucherEstudio;
use Carbon\Carbon;
use PDF;

class VoucherController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:listar vouchers|crear voucher|editar voucher|eliminar voucher', ['only' => ['index','store']]);
         $this->middleware('permission:crear voucher', ['only' => ['create','store']]);
         $this->middleware('permission:editar voucher', ['only' => ['edit','update']]);
         $this->middleware('permission:eliminar voucher', ['only' => ['destroy']]);
    }
    
    public function traerDatosPaciente(Request $request)
    {
        $paciente=Paciente::find($request->id);

        $retorno = [
            'documento'         =>  number_format( (intval($paciente->documento)/1000), 3, '.', '.'),
            'nombres'           =>  $paciente->nombreCompleto(),
            'fecha_nacimiento'  =>  Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y'),
            'foto'              =>  asset('imagenes/paciente/'.$paciente->foto),
            'cuil'              =>  $paciente->cuil,
            'sexo'              =>  $paciente->sexo->definicion,
        ];
        return response()->json($retorno);
    }
    public function index()
    {
        $vouchers = Voucher::all();
        return view('voucher.index',[
            "vouchers"         =>  $vouchers
            ]);
    }

    public function create()
    {
        $tipo_estudios =    TipoEstudio::all();
        $estudios =         Estudio::all();
        $pacientes =        Paciente::all();
        return view("voucher.create", compact('pacientes', 'estudios', 'tipo_estudios'));
    }


    public function store(Request $request)
    {   
        $n=Voucher::count() + 1;
        $voucher=new Voucher();
        $voucher->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
        $voucher->user_id=auth()->user()->id;
        $voucher->paciente_id = $request->paciente_id;
        $voucher->save();

        $estudios = Estudio::all();
        foreach ($estudios as $item) {
            //La variable aux toma el valor del id del Estudio
            $aux = $item->id;

            //Compara el aux con el campo de la request, que en la vista se establece que cada uno es el id de un Estudio distinto.
            if ($request->$aux == 1) {
                $voucher_estudio = new VoucherEstudio;
                $voucher_estudio->voucher_id = $voucher->id;
                $voucher_estudio->estudio_id = $item->id;
                $voucher_estudio->save();

                if ($item->nombre == "AUDIOMETRIA") {
                    $audiometria = new Audiometria();
                    $audiometria->voucher_id = $voucher->id;
                    $audiometria->save();
                }

                if ($item->nombre == "ESPIRIOMETRIA") {
                    $espiriometria = new Espiriometria();
                    $espiriometria->voucher_id = $voucher->id;
                    $espiriometria->save();
                }
            }
        }
        return redirect()->route('voucher.show',$voucher->id);
    }

    public function show($id)
    {
        //Obtener Voucher
        $voucher = Voucher::find($id);

        //Tipos de estudio en Voucher
        $tipo_estudios = $voucher->tipos_estudios();

        //Estudios a cargar
        $estudios_cargar = $voucher->estudios_cargar();

        //Estudios generados por el sistema
        $estudios = [];
        $forms = array(     'DECLARACION JURADA',
                            'HISTORIA CLINICA',
                            'POSICIONES FORZADAS',
                            'AUDIOMETRIA',
                            'ESPIRIOMETRIA',
                            'ILUMINACION');
        foreach ($voucher->vouchersEstudios as $item) {
            if ( in_array($item->estudio->nombre, $forms)) {
                $estudios[] = $item->estudio->nombre;
            }
        }

        return view('voucher.show', compact('voucher', 'estudios','estudios_cargar', 'tipo_estudios'));
    }

    /*
        public function showforms($id)
        {   
            //Variable para abrir formularios en otra vista
            $generar_formularios = true;

            return view('voucher.show', compact('voucher', 'estudios', 'tipo_estudios','generar_formularios'));
    }*/

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function pdf_paciente($id)
    {
        $voucher=Voucher::find($id);
        $tipo_estudios =    TipoEstudio::all();
        $estudios = [];
        $tipos = [];
        $i = -1;
        $cont = 0;
        foreach ($tipo_estudios as $tipo) {
            $aux = 0;
            foreach ($voucher->vouchersEstudios as $item) {
                if  ($item->estudio->tipo_estudio_id == $tipo->id){
                    $estudios[] = $item->esudio;
                    if ($aux == 0) {
                        $aux = 1;
                    }
                }
            }
            if ($aux == 1) {
                $tipos[] = $tipo;
            }
        }
        
        $pdf = PDF::loadView('voucher.pdf_paciente',[
            "voucher"           =>  $voucher,
            "tipo_estudios"     =>  $tipos,
            "estudios"          =>  $estudios,
            "i"                 =>  $i,
            "cont"              =>  $cont
            ]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('voucher_paciente.pdf');
    }

    public function pdf_medico($id)
    {

        $voucher=Voucher::find($id);
        $tipo_estudios =    TipoEstudio::all();
        $estudios = [];
        $tipos = [];
        $i = -1;
        $cont = 0;
        foreach ($tipo_estudios as $tipo) {
            $aux = 0;
            foreach ($voucher->vouchersEstudios as $item) {
                if  ($item->estudio->tipo_estudio_id == $tipo->id){
                    $estudios[] = $item->esudio;
                    if ($aux == 0) {
                        $aux = 1;
                    }
                }
            }
            if ($aux == 1) {
                $tipos[] = $tipo;
            }
        }

        $pdf = PDF::loadView('voucher.pdf_medico',[
            "voucher"           =>  $voucher,
            "tipo_estudios"     =>  $tipos,
            "estudios"          =>  $estudios,
            "i"                 =>  $i,
            "cont"              =>  $cont
            ]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('voucher_medico.pdf');
    }
}
