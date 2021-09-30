<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $estudios =         Estudio::All();
        $pacientes =        Paciente::all();
        return view("voucher.create", compact('pacientes', 'estudios', 'tipo_estudios'));
    }


    public function store(Request $request)
    {   
        //return $request;
        $n=Voucher::count() + 1;
        $voucher=new Voucher();
        $voucher->codigo=str_pad($n, 10, '0', STR_PAD_LEFT);
        $voucher->user_id=auth()->user()->id;
        $voucher->paciente_id = $request->paciente_id;
        $voucher->save();

        $estudios = Estudio::all();
        foreach ($estudios as $item) {
            $nombre = $item->id;
            if ($request->$nombre == 1) {
                $voucher_estudio = new VoucherEstudio;
                $voucher_estudio->voucher_id = $voucher->id;
                $voucher_estudio->estudio_id = $item->id;
                $voucher_estudio->save();
            }
        }
        return redirect()->route('voucher.index');
    }

    public function show($id)
    {
        //
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
        $pdf = PDF::loadView('voucher.pdf_paciente',[
            "voucher"   =>  $voucher
            ]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('voucher_paciente.pdf');
    }

    public function pdf_medico($id)
    {
        $voucher=Voucher::find($id);
        $pdf = PDF::loadView('voucher.pdf_medico',[
            "voucher"   =>  $voucher
            ]);
        $pdf->setPaper('a4','letter');
        return $pdf->stream('voucher_medico.pdf');
    }
}
