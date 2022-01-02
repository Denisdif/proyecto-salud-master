<?php

namespace App\Http\Controllers;

use App\ArchivoAdjunto;
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
        $vouchers = Voucher::orderBy('id', 'desc')->get();
        return view('voucher.index',[
            "vouchers"         =>  $vouchers
            ]);
    }

    public function create($id)
    {
        $tipo_estudios =    TipoEstudio::all();
        $estudios =         Estudio::all();
        $paciente =         Paciente::find($id);

        //Eliminar estudios con el mismo nombre que el tipo de estudio
        for ($i=0; $i < sizeof($estudios); $i++) { 
            if (strtoupper($estudios[$i]->nombre)  == strtoupper($estudios[$i]->tipoEstudio->nombre))  {
                unset($estudios[$i]);
            }
        }
        /*$pacientes =        Paciente::where('estado_id','=',1)
                                    ->where('documento','!=',"")->get();*/
        return view("voucher.create", compact(/*'pacientes', */'estudios', 'tipo_estudios', 'paciente'));
    }


    public function store(Request $request)
    {   
        $n=Voucher::count() + 1;
        $voucher=new Voucher();
        $voucher->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
        $voucher->turno=$request->turno;
        $voucher->user_id=auth()->user()->id;
        $voucher->paciente_id = $request->paciente_id;
        $voucher->save();

        //HARDCODEADISIMO
        //     | | | 
        //     V V V
        //
            $analisisB = false;
            $psicotecnico = false;
            $radiologia = false;

            $estudios = Estudio::all();
            foreach ($estudios as $estudio) {
                //La variable aux toma el valor del id del Estudio
                $aux = $estudio->id;
                //Compara el aux con el campo de la request, que en la vista se establece que cada uno es el id de un Estudio distinto.
                if ($request->$aux == 1) {
                    $voucher_estudio = new VoucherEstudio;
                    $voucher_estudio->voucher_id = $voucher->id;
                    $voucher_estudio->estudio_id = $estudio->id;
                    $voucher_estudio->save();

                    //Comprobar si se cargar estudios base
                    if ($estudio->id == $voucher_estudio->estudio_id) {
                        if ((strtoupper($estudio->tipoEstudio->nombre) == "ANALISIS BIOQUIMICO") or
                            (strtoupper($estudio->tipoEstudio->nombre) == "ANALISIS BIOQUIMICO ANEXO 01") ) {
                            $analisisB = true;
                        }
                        if (strtoupper($estudio->tipoEstudio->nombre) == "PSICOTECNICO") {
                            $psicotecnico = true;
                        }
                        if (strtoupper($estudio->tipoEstudio->nombre) == "RADIOLOGIA") {
                            $radiologia = true;
                        }
                    }
                }
            }
            //Cargar estudios base
            if ($analisisB) {
                $voucher_estudio = new VoucherEstudio;
                $voucher_estudio->voucher_id = $voucher->id;
                $voucher_estudio->estudio_id = 1;
                $voucher_estudio->save();
            }
            if ($psicotecnico) {
                $voucher_estudio = new VoucherEstudio;
                $voucher_estudio->voucher_id = $voucher->id;
                $voucher_estudio->estudio_id = 60;
                $voucher_estudio->save();
            }
            if ($radiologia) {
                $voucher_estudio = new VoucherEstudio;
                $voucher_estudio->voucher_id = $voucher->id;
                $voucher_estudio->estudio_id = 66;
                $voucher_estudio->save();
            }
        //
        return redirect()->route('voucher.show',$voucher->id);
    }

    public function show($id)
    {
        //Obtener Voucher
        $voucher = Voucher::find($id);

        //Tipos de estudio en Voucher
        $tipo_estudios = $voucher->tiposEstudios();

        //Estudios a cargar
        $estudios_cargar = $voucher->estudiosCargar();

        //Estudios generados por el sistema
        $estudios_sistema = [];
        $estudios = [];
        $indice = [];
        $rutas = [];
        $forms = [];
        $forms[] = array(   'DECLARACION JURADA',
                            'HISTORIA CLINICA',
                            'POSICIONES FORZADAS',
                            'AUDIOMETRIA',
                            'ESPIRIOMETRIA',
                            'ILUMINACION'); 

        $forms[] = array(   'declaracion_jurada.create',
                            'historia_clinica.create',                    
                            'posiciones_forzadas.create',
                            'audiometrias.create',
                            'espiriometrias.create',
                            'iluminacion_direccionados.create');
        $a = 0;
        foreach ($voucher->vouchersEstudios as $item) {
            for ($i=0; $i < sizeof($forms[0]); $i++) {
                if ( $item->estudio->nombre == $forms[0][$i]) {
                    $estudios[] = $item;
                    $rutas[] = $forms[1][$i];
                    $indice[] = $a;
                    $a++;
                }

            }
        }
        $estudios_sistema[] = $estudios;
        $estudios_sistema[] = $rutas;
        $estudios_sistema[] = $indice;
        return view('voucher.show', compact('voucher', 'estudios_sistema','estudios_cargar', 'tipo_estudios'));
    }

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
