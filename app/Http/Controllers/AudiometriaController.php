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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiometrias = Audiometria::All();

        return view('audiometria.index', compact('audiometrias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Audiometria::$rules);

        $audiometria = Audiometria::create($request->all());

        return redirect()->route('audiometrias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Audiometria $audiometria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audiometria $audiometria)
    {

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

    }
}
