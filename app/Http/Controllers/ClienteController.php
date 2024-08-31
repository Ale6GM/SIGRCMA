<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\ReporteClientes;
use App\Http\Requests\StoreClienteRequest;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create', 'store');
        $this->middleware('can:admin.clientes.edit')->only('edit', 'update');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
        $this->middleware('can:exportar_clientes')->only('exportarCliente');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $clientes = Cliente::create($request->all());

        return redirect()->route('admin.clientes.index')->with('info' , 'El cliente ha sido agregado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('admin.clientes.index')->with('info' , 'El cliente ha sido Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('info' , 'El cliente ha sido Eliminado Correctamente');
    }

    public function establecimientos(Cliente $cliente) {
        return response()->json($cliente->establecimientos);
    }

    public function exportarCliente() {
        return Excel::download(new ReporteClientes, 'Clientes.xlsx');
    }
}
