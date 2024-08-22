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
          @foreach ($data as $dato)
             <tr>
                <td>{{$dato->id}}</td>
                <td>{{$dato->fecha_inicio}}</td>
                <td>{{$dato->fecha_cierre}}</td>
                <td>{{$dato->repestado->descripcion}}</td>
                <td>{{$dato->cliente->nombre}}</td>
                <td>{{$dato->establecimiento->descripcion}}</td>
                <td>{{$dato->establecimiento->estado->descripcion}}</td>
                <td>{{$dato->tecnico->nombre}} {{$dato->tecnico->primer_apellido}} {{$dato->tecnico->segundo_apellido}}</td>
             </tr>
          @endforeach
       </tbody>
    </table>
 </div>         