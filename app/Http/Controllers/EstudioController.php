<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;

/**
 * Class EstudioController
 * @package App\Http\Controllers
 */
class EstudioController extends Controller
{

    public function index()
    {
        $estudios = Estudio::All();

        return view('estudio.index', compact('estudios'));
    }

    public function create()
    {
        $estudio = new Estudio();
        $tipo_estudios = TipoEstudio::all();
        return view('estudio.create', compact('estudio', 'tipo_estudios'));
    }

    public function store(Request $request)
    {
        request()->validate(Estudio::$rules);

        $estudio = Estudio::create($request->all());

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio created successfully.');
    }

    public function show($id)
    {
        $estudio = Estudio::find($id);

        return view('estudio.show', compact('estudio'));
    }

    public function edit($id)
    {
        $estudio = Estudio::find($id);

        return view('estudio.edit', compact('estudio'));
    }

    public function update(Request $request, Estudio $estudio)
    {
        request()->validate(Estudio::$rules);

        $estudio->update($request->all());

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio updated successfully');
    }

    public function destroy($id)
    {
        $estudio = Estudio::find($id)->delete();

        return redirect()->route('estudios.index')
            ->with('success', 'Estudio deleted successfully');
    }
}
