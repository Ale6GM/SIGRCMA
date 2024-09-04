<?php

namespace App\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Reporte;
use App\Models\Tecnico;
use Livewire\Component;
use App\Models\Repestado;
use App\Models\Establecimiento;

class Buscador extends Component
{
    public $search = null;
    public function render()
    {
        $repestados = Repestado::pluck('descripcion', 'id');
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();
        if($this->search === null) {
            $reportes = Reporte::with(['cliente', 'establecimiento', 'tecnico', 'user', 'repestado'])->where('repestado_id', 1)->paginate(10);
        } else {
            $reportes = Reporte::where('id', 'LIKE' , '%' . $this->search . '%')->where('repestado_id', 1)->paginate();
        }
        
        $clientesEdit = Cliente::pluck('nombre', 'id');
        $establecimientos = Establecimiento::pluck('descripcion', 'id');
        return view('livewire.admin.buscador', compact('clientes', 'repestados', 'tecnicos', 'reportes', 'clientesEdit', 'establecimientos'));
    }

    
}
