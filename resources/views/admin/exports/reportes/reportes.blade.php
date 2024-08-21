<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No. Rep</th>
                <th>Fecha Inicio</th>
                <th>Fecha Cierre</th>
                <th>Estado Reporte</th>
                <th>Cliente</th>
                <th>Local</th>
                <th>Estado Local</th>
                <th>Tecnico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $reporte)
                <tr>
                    <td>{{$reporte->id}}</td>
                    <td>{{$reporte->fecha_inicio}}</td>
                    <td>{{$reporte->fecha_cierre}}</td>
                    <td>{{$reporte->repestado->descripcion}}</td>
                    <td>{{$reporte->cliente->nombre}}</td>
                    <td>{{$reporte->establecimiento->descripcion}}</td>
                    <td>{{$reporte->establecimiento->estado->descripcion}}</td>
                    <td>{{$reporte->tecnico->nombre}} {{$reporte->tecnico->primer_apellido}} {{$reporte->tecnico->segundo_apellido}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>