<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estadisticas.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.estadisticas.index');
    }
}
