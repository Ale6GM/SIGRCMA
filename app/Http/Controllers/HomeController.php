<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Establecimiento;
use App\Models\Reporte;
use App\Models\Tecnico;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //variables para los estados del reporte
        $estadoReportePendiente = 1;
        $estadoReporteResuelto = 2;

        //Variables para los estados de los locales
        $localSinCumunicacion = 1;
        $localDesconectado = 2;
        $localEnLinea = 3;

        $cantidadReportes = Reporte::all()->count();
        $cantidadClientes = Cliente::all()->count();
        $cantidadEstablecimientos = Establecimiento::all()->count();
        $cantidadTecnicos = Tecnico::all()->count();
        $cantidadUsuarios = User::all()->count();
        //variables para los reportes
        $cantReportesPendientes = Reporte::where('repestado_id', $estadoReportePendiente)->count();
        $cantReportesResueltos =  Reporte::where('repestado_id', $estadoReporteResuelto)->count();
        $cantReporteMasTresDias = Reporte::AbiertosMasDeTresDias()->count();

        //variables para los establecimientos
        $cantEstablecimientosSinCom = Establecimiento::where('esestado_id', $localSinCumunicacion)->count();
        $cantEstablecimientosDesconectados = Establecimiento::where('esestado_id', $localDesconectado)->count();
        $cantEstablecimientosEnLinea = Establecimiento::where('esestado_id', $localEnLinea)->count();
        return view('home', compact('cantidadReportes', 'cantidadClientes', 'cantidadEstablecimientos', 'cantidadTecnicos', 'cantidadUsuarios',
        'cantReportesPendientes', 'cantReportesResueltos', 'cantReporteMasTresDias', 'cantEstablecimientosSinCom', 'cantEstablecimientosDesconectados',
        'cantEstablecimientosEnLinea',
    ));
    }

    public function about()
    {
        return view('about');
    }
}
