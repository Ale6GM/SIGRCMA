<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTecnicosRequest;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tecnicos.index')->only('index');
        $this->middleware('can:admin.tecnicos.create')->only('create', 'store');
        $this->middleware('can:admin.tecnicos.edit')->only('edit', 'update');
        $this->middleware('can:admin.tecnicos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('admin.tecnicos.index', compact('tecnicos'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTecnicosRequest $request)
    {
        $tecnicos = Tecnico::create($request->all());

        return redirect()->route('admin.tecnicos.index')->with('info', 'El Técnico ha sido Agregado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTecnicosRequest $request, Tecnico $tecnico)
    {
        $tecnico->update($request->all());

        return redirect()->route('admin.tecnicos.index')->with('info', 'El Técnico ha sido Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();

        return redirect()->route('admin.tecnicos.index')->with('info', 'El Técnico ha sido Eliminado Correctamente');
    }
}
