<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTecnicosRequest;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('admin.tecnicos.index', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnico $tecnico)
    {
        //
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
