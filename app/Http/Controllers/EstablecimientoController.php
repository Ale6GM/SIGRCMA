<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablecimientosRequest;
use App\Models\Cliente;
use App\Models\Esestado;
use Illuminate\Http\Request;
use App\Models\Establecimiento;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::pluck('nombre', 'id');
        $esestados = Esestado::pluck('descripcion', 'id');
        $establecimientos = Establecimiento::with(['cliente', 'estado'])->get();
        return view('admin.establecimientos.index', compact('establecimientos','clientes', 'esestados'));
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
    public function store(StoreEstablecimientosRequest $request)
    {
        $establecimientos = Establecimiento::create($request->all());

        return redirect()->route('admin.establecimientos.index')->with('info', 'El Local ha sido agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEstablecimientosRequest $request, Establecimiento $establecimiento)
    {
        $establecimiento->update($request->all());

        return redirect()->route('admin.establecimientos.index')->with('info', 'El Local ha sido Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Establecimiento $establecimiento)
    {
        $establecimiento->delete();

        return redirect()->route('admin.establecimientos.index')->with('info', 'El Local ha sido Eliminado con Exito');
    }
}
