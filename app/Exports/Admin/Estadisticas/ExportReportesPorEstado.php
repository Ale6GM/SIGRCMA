<?php

namespace App\Exports\Admin\Estadisticas;

use App\Models\Reporte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportesPorEstado implements FromView,  WithStyles, WithEvents
{
    protected $estado;

    public function __construct($estado)
    {
        $this->estado = $estado;
    }
    
    public function view() :View
    {
        return view('admin.exports.estadisticas.reporte-estado', [
            'data' => Reporte::where('repestado_id', $this->estado)->get()
        ]);
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para el encabezado
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Ajustar el ancho de las columnas automáticamente
                foreach (range('A', $event->sheet->getHighestColumn()) as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
