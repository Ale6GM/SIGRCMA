<?php

namespace App\Http\Controllers;

use App\Exports\Admin\ReporteLocales;
use App\Http\Requests\StoreEstablecimientosRequest;
use App\Models\Cliente;
use App\Models\Esestado;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Maatwebsite\Excel\Facades\Excel;

class EstablecimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.establecimientos.index')->only('index');
        $this->middleware('can:admin.establecimientos.create')->only('create', 'store');
        $this->middleware('can:admin.establecimientos.edit')->only('edit', 'update');
        $this->middleware('can:admin.establecimientos.destroy')->only('destroy');
        $this->middleware('can:exportar_locales')->only('exportarLocal');
    }
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
     * Store a newly created resource in storage.
     */
    public function store(StoreEstablecimientosRequest $request)
    {
        $establecimientos = Establecimiento::create($request->all());

        return redirect()->route('admin.establecimientos.index')->with('info', 'El Local ha sido agregado correctamente');
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

    public function exportarLocal() {
        return Excel::download(new ReporteLocales, 'Locales.xlsx');
    }
}
