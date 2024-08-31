<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class TrabajoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.trabajos.create')->only('create','store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reporte = Reporte::find($request->input('reporte'));

        $reporte->trabajos()->create(['fecha' => $request->input('fecha'), 'descripcion' => $request->input('descripcion')]);

        return redirect()->route('admin.reportes.index')->with('info', 'Trabajo agregado Correctamente');
    }
}
