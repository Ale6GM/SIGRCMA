<?php

namespace App\Livewire\Admin;

use App\Models\Local;
use App\Models\Cliente;
use App\Models\Reporte;
use App\Models\Tecnico;
use Livewire\Component;
use App\Models\Repestado;
use App\Models\Establecimiento;

class Estadisticas extends Component
{
    //Variables para la busqueda de reportes por fecha de Inicio
    public $fechaInicio;
    public $fechaCierre;
    public $datos = [];

    //Variables para la busqueda de reportes por Año
    public $yearSelected;
    public $reportes = [];


    // Variables para la busqueda de los reportes por cliente
    public $selectedCliente;
    public $reports = [];

    // Variables para la busqueda de los reportes por Estado
    public $selectedEstado;
    public $ereportes = [];

    //Variables para la busqueda de los reportes por Local

    public $selectedLocal;
    public $rlocales = [];

    //Variables para la busqueda de los reportes por tecnico

    public $selectedTecnico;
    public $rtecnicos = [];

    //Variables para las busquedas por rango de apertura
    public $selectedRango;
    public $reRangos = [];

    // Variables para la busqueda del local por estado
    public $selectedEstadoLocal;
    public $establecimientos = [];
    

    public function buscarPorFechas() {        
        $this->datos = Reporte::whereBetween('fecha_inicio', [$this->fechaInicio, $this->fechaCierre])->get();
    }

    public function buscarReportesPorAno() {
        $this->reportes = Reporte::whereYear('fecha_inicio', $this->yearSelected)->get();
    }

   public function buscarReportesPorCliente() {
        $this->reports = Reporte::where('clientes_id', $this->selectedCliente)->get();
   }

   public function buscarReportesPorEstado() {
        $this->ereportes = Reporte::where('repestado_id', $this->selectedEstado)->get();
   }

   public function buscarReportesPorLocal() {
        $this->rlocales = Reporte::where('establecimientos_id', $this->selectedLocal)->get();
   }

   public function buscarReportesPorTecnico() {
        $this->rtecnicos = Reporte::where('tecnicos_id', $this->selectedTecnico)->where('repestado_id', 2)->get();
   }

   public function buscarReportesPorRango() {
        if($this->selectedRango === "3") {
            $this->reRangos = Reporte::AbiertosMasDeTresDias()->get();
        } elseif($this->selectedRango === "10") {
            $this->reRangos = Reporte::AbiertosMasDeDiezDias()->get();
        }elseif($this->selectedRango === "15") {
            $this->reRangos = Reporte::AbiertosMasDeQuinceDias()->get();
        } else {
            $this->reRangos= collect();
        }
   }

   public function buscarLocalPorEstado() {
        $this->establecimientos = Establecimiento::where('esestado_id', $this->selectedEstadoLocal)->get();
   }

    public function render()
    {
        $years = Reporte::selectRaw('YEAR(fecha_inicio) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $clientes = Cliente::all();
        $estados = Repestado::all();
        $locales = Establecimiento::all();
        $tecnicos = Tecnico::all();


        return view('livewire.admin.estadisticas', ['years' => $years, 'clientes' => $clientes, 'estados' => $estados, 'locales' => $locales, 'tecnicos' => $tecnicos]);
    }
}
