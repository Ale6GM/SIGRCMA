<?php

namespace App\Livewire\Admin;

use App\Models\Reporte;
use Livewire\Component;

class Estadisticas extends Component
{
    //Variables para la busqueda de reportes por fecha de Inicio
    public $fechaInicio;
    public $fechaCierre;
    public $datos = [];


    public $yearSelected;
    public $reportes;



    public function mount() {
        $this->yearSelected = date('Y');
        $this->buscarReportesPorAno();
    }

    public function buscarPorFechas() {        
        $this->datos = Reporte::whereBetween('fecha_inicio', [$this->fechaInicio, $this->fechaCierre])->get();
    }

    public function buscarReportesPorAno() {
        $this->reportes = Reporte::whereYear('fecha_inicio', $this->yearSelected)->get();
    }

   

    public function render()
    {
        $years = Reporte::selectRaw('YEAR(fecha_inicio) as year')
                                ->distinct()
                                ->orderBy('year', 'desc')
                                ->pluck('year');

        return view('livewire.admin.estadisticas', ['years' => $years]);
    }
}
