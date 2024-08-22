<?php

namespace App\Exports\Admin\Estadisticas;

use App\Models\Reporte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportesPorRango implements FromView,  WithStyles, WithEvents
{
    protected $rango;
    public $datos;

    public function __construct($rango)
    {
        $this->rango = $rango;
    }
    
    public function view() :View
    {
        $this->datos = collect();
        if($this->rango == "3") {
            $this->datos = Reporte::AbiertosMasDeTresDias()->get();
        } elseif($this->rango == "10") {
            $this->datos = Reporte::AbiertosMasDeDiezDias()->get();
        } elseif($this->rango == "15") {
            $this->datos = Reporte::AbiertosMasDeQuinceDias()->get();
        } else {
            $this->datos = collect();
        }
        return view('admin.exports.estadisticas.reporte-rango', [
            'data' => $this->datos
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
