<div>
   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Fecha de Inicio</h5>
      </div>
      <div class="card-body">
         <div class="row align-items-center">
            <div class="col-5">
               <label for="">Fecha de Inicio</label>
               <input wire:model="fechaInicio" type="date" name="fechaInicio" class="form-control">
            </div>

            <div class="col-5">
               <label for="">Fecha Final</label>
               <input wire:model="fechaCierre" type="date" name="fechaCierre" class="form-control">
            </div>
            <div class="col-2 mt-4">
               <button wire:click="buscarPorFechas" class="btn btn-primary">Buscar</button>
            </div>
         </div>
         <div class="row">
            @if ($datos)
               <div class="card-body">
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
                           @foreach ($datos as $dato)
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
               </div>
            @else
              <div class="card-body">
                  
              </div>
            
            @endif
         </div>
      </div>
   </div>

   <div class="card">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Año</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Año</label>
               <select wire:model="yearSelected" name="" id="" class="form-control">
                  @foreach ($years as $year)
                      <option value="{{$year}}">{{$year}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorAno" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            @if ($reportes->isEmpty())
                <p>nada</p>
            @else
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
                        @foreach ($reportes as $reporte)
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
            @endif
         </div>
      </div>
   </div>
</div>
