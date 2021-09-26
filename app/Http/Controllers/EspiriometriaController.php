<?php

namespace App\Http\Controllers;

use App\Models\Espiriometria;
use Illuminate\Http\Request;

/**
 * Class EspiriometriaController
 * @package App\Http\Controllers
 */
class EspiriometriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espiriometrias = Espiriometria::paginate();

        return view('espiriometria.index', compact('espiriometrias'))
            ->with('i', (request()->input('page', 1) - 1) * $espiriometrias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espiriometria = new Espiriometria();
        return view('espiriometria.create', compact('espiriometria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Espiriometria::$rules);

        $espiriometria = Espiriometria::create($request->all());

        return redirect()->route('espiriometrias.index')
            ->with('success', 'Espiriometria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $espiriometria = Espiriometria::find($id);

        return view('espiriometria.show', compact('espiriometria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $espiriometria = Espiriometria::find($id);

        return view('espiriometria.edit', compact('espiriometria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Espiriometria $espiriometria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espiriometria $espiriometria)
    {
        request()->validate(Espiriometria::$rules);

        $espiriometria->update($request->all());

        return redirect()->route('espiriometrias.index')
            ->with('success', 'Espiriometria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $espiriometria = Espiriometria::find($id)->delete();

        return redirect()->route('espiriometrias.index')
            ->with('success', 'Espiriometria deleted successfully');
    }
}
