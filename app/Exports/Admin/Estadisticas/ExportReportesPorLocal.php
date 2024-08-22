<?php

namespace App\Exports\Admin\Estadisticas;

use App\Models\Reporte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportesPorLocal implements FromView,  WithStyles, WithEvents
{
    protected $local;

    public function __construct($local)
    {
        $this->local = $local;
    }
    
    public function view() :View
    {
        return view('admin.exports.estadisticas.reporte-local', [
            'data' => Reporte::where('establecimientos_id', $this->local)->get()
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
