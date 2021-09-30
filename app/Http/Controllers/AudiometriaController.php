<?php

namespace App\Http\Controllers;

use App\Models\Audiometria;
use App\Voucher;
use Illuminate\Http\Request;

use PDF;

/**
 * Class AudiometriaController
 * @package App\Http\Controllers
 */
class AudiometriaController extends Controller
{

    public function index()
    {
        $audiometrias = Audiometria::All();

        return view('audiometria.index', compact('audiometrias'));
    }

    public function create()
    {   
        $vouchers = Voucher::all();
        $audiometria = new Audiometria();
        return view('audiometria.create', compact('audiometria', 'vouchers'));
    }

    public function crearPDF($id)
    {
        $audiometria=Audiometria::find($id);
        
        $pdf = PDF::loadView('audiometria.PDF',[
            "audiometria"   =>  $audiometria
            ]);

        $pdf->setPaper('a4','letter');
        return $pdf->stream('audiometria.pdf');
        
    }

    public function store(Request $request)
    {
        request()->validate(Audiometria::$rules);

        $audiometria = Audiometria::create($request->all());

        return redirect()->route('audiometrias.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, Audiometria $audiometria)
    {

    }

    public function destroy($id)
    {

    }
}
