<?php

namespace App\Http\Controllers;

use App\Exports\Admin\ExportReportes;
use App\Http\Requests\StoreReportesRequest;
use App\Models\Cliente;
use App\Models\Establecimiento;
use App\Models\Reporte;
use App\Models\Tecnico;
use App\Models\Repestado;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repestados = Repestado::pluck('descripcion', 'id');
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();
        $reportes = Reporte::with(['cliente', 'establecimiento', 'tecnico', 'user', 'repestado'])->where('repestado_id', 1)->paginate(10);
        $clientesEdit = Cliente::pluck('nombre', 'id');
        $establecimientos = Establecimiento::pluck('descripcion', 'id');
                
        return view('admin.reportes.index', compact('clientes', 'repestados', 'tecnicos', 'reportes', 'clientesEdit', 'establecimientos'));
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
    public function store(StoreReportesRequest $request)
    {
        //return $request->all();
        $reportes = Reporte::create($request->all());

        return redirect()->route('admin.reportes.index')->with('info', 'El Reporte ha sido agregado correctamente...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        $reporte->update([
            'fecha_cierre' => $request->fecha_cierre,
            'repestado_id' => $request->repestado_id,
            'tecnicos_id' => $request->tecnicos_id
        ]);

        return redirect()->route('admin.reportes.index')->with('info', 'El reporte ha sido Correctamente Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        $reporte->delete();

        return redirect()->route('admin.reportes.index')->with('info', 'El reporte ha sido eliminado correctamente');

    }

    public function exportarReportes() {
        return Excel::download(new ExportReportes, 'Reportes.xlsx');
    }
}
