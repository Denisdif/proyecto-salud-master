<?php

namespace App\Http\Controllers;

use App\Models\Audiometria;
use Illuminate\Http\Request;

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
        $audiometrias = Audiometria::paginate();

        return view('audiometria.index', compact('audiometrias'))
            ->with('i', (request()->input('page', 1) - 1) * $audiometrias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audiometria = new Audiometria();
        return view('audiometria.create', compact('audiometria'));
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

        return redirect()->route('audiometrias.index')
            ->with('success', 'Audiometria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audiometria = Audiometria::find($id);

        return view('audiometria.show', compact('audiometria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audiometria = Audiometria::find($id);

        return view('audiometria.edit', compact('audiometria'));
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
        request()->validate(Audiometria::$rules);

        $audiometria->update($request->all());

        return redirect()->route('audiometrias.index')
            ->with('success', 'Audiometria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $audiometria = Audiometria::find($id)->delete();

        return redirect()->route('audiometrias.index')
            ->with('success', 'Audiometria deleted successfully');
    }
}