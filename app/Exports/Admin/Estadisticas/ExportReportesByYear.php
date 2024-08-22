<?php

namespace App\Exports\Admin\Estadisticas;

use App\Models\Reporte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportesByYear implements FromView,  WithStyles, WithEvents
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }
    
    public function view() :View
    {
        return view('admin.exports.estadisticas.reporte-fechas', [
            'data' => Reporte::whereYear('fecha_inicio', $this->year)->get()
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
