<?php

namespace App\Http\Controllers;

use App\Models\TipoEstudio;
use Illuminate\Http\Request;

/**
 * Class TipoEstudioController
 * @package App\Http\Controllers
 */
class TipoEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoEstudios = TipoEstudio::paginate();

        return view('tipo-estudio.index', compact('tipoEstudios'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoEstudios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoEstudio = new TipoEstudio();
        return view('tipo-estudio.create', compact('tipoEstudio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoEstudio::$rules);

        $tipoEstudio = TipoEstudio::create($request->all());

        return redirect()->route('tipo-estudios.index')
            ->with('success', 'TipoEstudio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoEstudio = TipoEstudio::find($id);

        return view('tipo-estudio.show', compact('tipoEstudio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoEstudio = TipoEstudio::find($id);

        return view('tipo-estudio.edit', compact('tipoEstudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoEstudio $tipoEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoEstudio $tipoEstudio)
    {
        request()->validate(TipoEstudio::$rules);

        $tipoEstudio->update($request->all());

        return redirect()->route('tipo-estudios.index')
            ->with('success', 'TipoEstudio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoEstudio = TipoEstudio::find($id)->delete();

        return redirect()->route('tipo-estudios.index')
            ->with('success', 'TipoEstudio deleted successfully');
    }
}
