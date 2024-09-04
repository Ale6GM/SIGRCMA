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
        const datosGrafico = document.getElementById('selectorDatos');
        const selectorGrafico = document.getElementById('selectorGrafico1');
        let myChart = null;


        async function reportesPorClientes() {
            try {
                if(myChart) {
                    myChart.destroy();
                }
                // Realiza una solicitud a la API para obtener los reportes
                const response = await fetch('http://sigrcma.test/api/getReportes');
                const reportes = await response.json();

                // Verifica si la respuesta contiene datos
                if (!Array.isArray(reportes) || reportes.length === 0) {
                    console.error('No se encontraron reportes en la respuesta de la API');
                    return;
                }

                // Procesa los datos para contar reportes por cliente
                const conteoClientes = {};
                reportes.forEach((reporte) => {
                    const nombreCliente = reporte.cliente.nombre;

                    if (conteoClientes[nombreCliente]) {
                        conteoClientes[nombreCliente] += 1;
                    } else {
                        conteoClientes[nombreCliente] = 1;
                    }
                });

                // Extrae los nombres de los clientes y la cantidad de reportes
                const nombresClientes = Object.keys(conteoClientes);
                const cantidadReportes = Object.values(conteoClientes);
                
                // Configuración del gráfico con Chart.js
                const ctx = document.getElementById('grafico').getContext('2d');
                myChart = new Chart(ctx, {
                    type: selectorGrafico.value, // Puedes cambiar a 'pie', 'line', etc.
                    data: {
                        labels: nombresClientes,
                        datasets: [{
                            label: 'Cantidad de Reportes por Cliente',
                            data: cantidadReportes,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }, 
                        plugins: {
                            title: {
                                display: true,
                                text: 'Cantidad de Reportes por Clientes',
                            },		
                        }
                    }
                });
            } catch (error) {
                console.error('Error al obtener los reportes de la API:', error);
            }
        }

       async function reportesPorEstado() {
            try {
                if(myChart) {
                    myChart.destroy();
                }
                // Realiza una solicitud a la API para obtener los reportes
                const response = await fetch('http://sigrcma.test/api/getReportes');
                const reportes = await response.json();

                // Verifica si la respuesta contiene datos
                if (!Array.isArray(reportes) || reportes.length === 0) {
                    console.error('No se encontraron reportes en la respuesta de la API');
                    return;
                }

                // Procesa los datos para contar reportes por estado
                const conteoEstados = {};
                reportes.forEach((reporte) => {
                    const estado = reporte.repestado.descripcion;

                    if (conteoEstados[estado]) {
                        conteoEstados[estado] += 1;
                    } else {
                        conteoEstados[estado] = 1;
                    }
                });

                // Extrae los nombres de los estados y la cantidad de reportes
                const nombresEstados = Object.keys(conteoEstados);
                const cantidadReportesPorEstado = Object.values(conteoEstados);

                // Configuración del gráfico con Chart.js
                const ctx = document.getElementById('grafico').getContext('2d');
                myChart = new Chart(ctx, {
                    type: selectorGrafico.value, // Puedes cambiar a 'bar', 'line', etc.
                    data: {
                        labels: nombresEstados,
                        datasets: [{
                            label: 'Cantidad de Reportes por Estado',
                            data: cantidadReportesPorEstado,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Cantidad de Reportes por Estado del Reporte',
                            },		
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error al obtener los reportes de la API:', error);
            }
        }

       async function reportesPorYear() {
            try {
                if(myChart) {
                    myChart.destroy();
                }
                // Realiza una solicitud a la API para obtener los reportes
                const response = await fetch('http://sigrcma.test/api/getReportes');
                const reportes = await response.json();

                // Verifica si la respuesta contiene datos
                if (!Array.isArray(reportes) || reportes.length === 0) {
                    console.error('No se encontraron reportes en la respuesta de la API');
                    return;
                }

                // Procesa los datos para contar reportes por año
                const conteoAnios = {};
                reportes.forEach((reporte) => {
                    const anio = new Date(reporte.fecha_inicio).getFullYear(); // Extrae el año de la fecha de inicio

                    if (conteoAnios[anio]) {
                        conteoAnios[anio] += 1;
                    } else {
                        conteoAnios[anio] = 1;
                    }
                });

                // Extrae los años y la cantidad de reportes por año
                const anios = Object.keys(conteoAnios).sort(); // Ordena los años
                const cantidadReportesPorAnio = Object.values(conteoAnios);

                // Configuración del gráfico con Chart.js
                const ctx = document.getElementById('grafico').getContext('2d');
                myChart = new Chart(ctx, {
                    type: selectorGrafico.value, // Puedes cambiar a 'line', 'pie', etc.
                    data: {
                        labels: anios,
                        datasets: [{
                            label: 'Cantidad de Reportes por Año',
                            data: cantidadReportesPorAnio,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Cantidad de Reportes por Año',
                            },		
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error al obtener los reportes de la API:', error);
            }
        }
        datosGrafico.addEventListener('change', () => {
            if(datosGrafico.value === 'rClientes') return reportesPorClientes();

            if(datosGrafico.value === 'rEstado') return reportesPorEstado();

            if(datosGrafico.value === 'rYear') return reportesPorYear();
        })

        reportesPorClientes();


        // exportacion a PNG
        const botonExportar = document.getElementById('btnExport');

        botonExportar.addEventListener('click', () => {
            let canvas = document.getElementById('grafico');

            if (grafico == null) {
            Swal.fire({
                title: "Error",
                text: "Aun no hay un Grafico Generado",
                icon: "error"
            })
            } else {
            let url = canvas.toDataURL('image/png');
            let a = document.createElement('a');
            a.href = url;
            a.download = 'grafico.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            }
            })
    </script>

    
@endsection