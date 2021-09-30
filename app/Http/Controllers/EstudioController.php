<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;

/**
 * Class EstudioController
 * @package App\Http\Controllers
 */
class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudios = Estudio::paginate();

        return view('estudio.index', compact('estudios'))
            ->with('i', (request()->input('page', 1) - 1) * $estudios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudio = new Estudio();
        return view('estudio.create', compact('estudio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estudio::$rules);

        $estudio = Estudio::create($request->all());

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudio = Estudio::find($id);

        return view('estudio.show', compact('estudio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudio = Estudio::find($id);

        return view('estudio.edit', compact('estudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estudio $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudio $estudio)
    {
        request()->validate(Estudio::$rules);

        $estudio->update($request->all());

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estudio = Estudio::find($id)->delete();

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio deleted successfully');
    }
}
