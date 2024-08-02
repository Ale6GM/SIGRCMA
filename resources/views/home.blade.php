@extends('layouts.app')

@section('breadcrumbs')
<li class="breadcrumb-item">
<!-- if breadcrumb is single--><a href="#">Inicio</a>
</li>
<li class="breadcrumb-item">
<!-- if breadcrumb is single--><a href="#">Dashboard</a>
</li>
@endsection

@section('content')
    @include('dashboard')
@endsection

@section('script')
    <script>
        function generarGraficoDinamico() {
            let tipo = selectorGrafico1.value;	
            const ctx = document.getElementById('grafico').getContext('2d');
            let chart = Chart.getChart(ctx);

            if (chart) {
                chart.destroy();
            }
            
            const data = {
                labels: ['Etecsa', 'Cimex', 'Bandec', 'Comercio', 'TRD'],
                datasets: [{
                    label: 'Cantidad de Reportes',
                    data: [80, 90, 60, 180, 150],
                }, {
                    label: 'Locales Desconectados',
                    data: [10, 15, 5, 25, 30],
                }, {
                    label: 'Locales sin Comunicacion',
                    data: [5, 18, 12, 20, 35],
                }]
            }

	        chart = new Chart(ctx, {type:tipo, data});
        }
            

        generarGraficoDinamico();

        document.getElementById('selectorGrafico1').addEventListener('change', function () {
            generarGraficoDinamico();
        });
    </script>

    
@endsection