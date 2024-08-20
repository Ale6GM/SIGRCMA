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

   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Año</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Año</label>
               <select wire:model="yearSelected" name="" id="" class="form-control">
                  <option value="">Seleccione un Año</option>
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
                @if ($reportes)
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
                    </div>
                @else
                   
                @endif
            
         </div>
      </div>
   </div>

   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Clientes</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Cliente</label>
               <select wire:model="selectedCliente" name="" id="" class="form-control">
                  <option value="">Seleccione un Cliente</option>
                  @foreach ($clientes as $cliente)
                      <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorCliente" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            @if ($reports)
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
                           @foreach ($reports as $report)
                               <tr>
                                 <td>{{$report->id}}</td>
                                 <td>{{$report->fecha_inicio}}</td>
                                 <td>{{$report->fecha_cierre}}</td>
                                 <td>{{$report->repestado->descripcion}}</td>
                                 <td>{{$report->cliente->nombre}}</td>
                                 <td>{{$report->establecimiento->descripcion}}</td>
                                 <td>{{$report->establecimiento->estado->descripcion}}</td>
                                 <td>{{$report->tecnico->nombre}} {{$report->tecnico->primer_apellido}} {{$report->tecnico->segundo_apellido}}</td>
                               </tr>
                           @endforeach
                        </tbody>
                     </table>
                   </div>
                </div>
            @else
                
            @endif
         </div>
      </div>
   </div>

   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Estado</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Estado del Reporte</label>
               <select wire:model="selectedEstado" name="" id="" class="form-control">
                  <option value="">Seleccione un Estado</option>
                  @foreach ($estados as $estado)
                      <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorEstado" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            <div class="row">
               @if ($ereportes)
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
                              @foreach ($ereportes as $ereporte)
                                  <tr>
                                    <td>{{$ereporte->id}}</td>
                                    <td>{{$ereporte->fecha_inicio}}</td>
                                    <td>{{$ereporte->fecha_cierre}}</td>
                                    <td>{{$ereporte->repestado->descripcion}}</td>
                                    <td>{{$ereporte->cliente->nombre}}</td>
                                    <td>{{$ereporte->establecimiento->descripcion}}</td>
                                    <td>{{$ereporte->establecimiento->estado->descripcion}}</td>
                                    <td>{{$ereporte->tecnico->nombre}} {{$ereporte->tecnico->primer_apellido}} {{$ereporte->tecnico->segundo_apellido}}</td>
                                  </tr>
                              @endforeach
                           </tbody>
                        </table>
                      </div>
                   </div>
               @else
                   
               @endif
            </div>
         </div>
      </div>
   </div>

   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Locales</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Locales</label>
               <select wire:model="selectedLocal" class="form-control">
                  <option value="">Seleccione un Local</option>
                  @foreach ($locales as $local)
                      <option value="{{$local->id}}">{{$local->descripcion}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorLocal" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            <div class="row">
               @if ($rlocales)
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
                              @foreach ($rlocales as $rlocal)
                                  <tr>
                                    <td>{{$rlocal->id}}</td>
                                    <td>{{$rlocal->fecha_inicio}}</td>
                                    <td>{{$rlocal->fecha_cierre}}</td>
                                    <td>{{$rlocal->repestado->descripcion}}</td>
                                    <td>{{$rlocal->cliente->nombre}}</td>
                                    <td>{{$rlocal->establecimiento->descripcion}}</td>
                                    <td>{{$rlocal->establecimiento->estado->descripcion}}</td>
                                    <td>{{$rlocal->tecnico->nombre}} {{$rlocal->tecnico->primer_apellido}} {{$rlocal->tecnico->segundo_apellido}}</td>
                                  </tr>
                              @endforeach
                           </tbody>
                        </table>
                      </div>
                   </div>
               @else
                   
               @endif
            </div>
         </div>
      </div>
   </div>

{{-- Reportes resueltos por tecnicos --}}
   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Técnicos</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Técnicos</label>
               <select wire:model="selectedTecnico" class="form-control">
                  <option value="">Seleccione un Técnico</option>
                  @foreach ($tecnicos as $tecnico)
                      <option value="{{$tecnico->id}}">{{$tecnico->nombre}} {{$tecnico->primer_apellido}} {{$tecnico->segundo_apellido}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorTecnico" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            <div class="row">
               @if ($rtecnicos)
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
                              @foreach ($rtecnicos as $rtecnico)
                                  <tr>
                                    <td>{{$rtecnico->id}}</td>
                                    <td>{{$rtecnico->fecha_inicio}}</td>
                                    <td>{{$rtecnico->fecha_cierre}}</td>
                                    <td>{{$rtecnico->repestado->descripcion}}</td>
                                    <td>{{$rtecnico->cliente->nombre}}</td>
                                    <td>{{$rtecnico->establecimiento->descripcion}}</td>
                                    <td>{{$rtecnico->establecimiento->estado->descripcion}}</td>
                                    <td>{{$rtecnico->tecnico->nombre}} {{$rtecnico->tecnico->primer_apellido}} {{$rtecnico->tecnico->segundo_apellido}}</td>
                                  </tr>
                              @endforeach
                           </tbody>
                        </table>
                      </div>
                   </div>
               @else
                   
               @endif
            </div>
         </div>
      </div>
   </div>

   {{-- Reportes con mas de tres dias de abiertos --}}

   <div class="card mb-4">
      <div class="card-header text-bg-dark">
         <h5>Reportes por Tiempo de Apertura</h5>
      </div>

      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Rango de Dias de Apertura</label>
               <select wire:model="selectedRango" class="form-control">
                  <option value="">Seleccione un Rango</option>
                  <option value="3">Mas de 3 Días</option>
                  <option value="10">Mas de 10 Días</option>
                  <option value="15">Mas de 15 Días</option>
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarReportesPorRango" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>

         <div class="row">
            @if ($reRangos)
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
                           @foreach ($reRangos as $reRango)
                               <tr>
                                 <td>{{$reRango->id}}</td>
                                 <td>{{$reRango->fecha_inicio}}</td>
                                 <td>{{$reRango->fecha_cierre}}</td>
                                 <td>{{$reRango->repestado->descripcion}}</td>
                                 <td>{{$reRango->cliente->nombre}}</td>
                                 <td>{{$reRango->establecimiento->descripcion}}</td>
                                 <td>{{$reRango->establecimiento->estado->descripcion}}</td>
                                 <td>{{$reRango->tecnico->nombre}} {{$reRango->tecnico->primer_apellido}} {{$reRango->tecnico->segundo_apellido}}</td>
                               </tr>
                           @endforeach
                        </tbody>
                     </table>
                   </div>
                </div>
            @else
                
            @endif
         </div>
      </div>
   </div>

   {{-- Listado de los establecimientos por los tres tipos de estado --}}

   <div class="card">
      <div class="card-header text-bg-dark">
         <h5>Listado de los Locales por Estados</h5>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-5">
               <label for="">Estados de los Locales</label>
               <select wire:model="selectedEstadoLocal" class="form-control">
                  <option value="">Seleccione un Estado</option>
                  <option value="3">En Linea</option>
                  <option value="2">Desconectado</option>
                  <option value="1">Sin Comunicación</option>
               </select>
            </div>
            <div class="col-4">
               <button wire:click="buscarLocalPorEstado" class="btn btn-primary mt-4">Buscar</button>
            </div>
         </div>
         <div class="row">
            @if ($establecimientos)
                <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Cliente</th>
                              <th>Estado del Local</th>
                           </tr>
                        </thead>

                        <tbody>
                           @foreach ($establecimientos as $establecimiento)
                               <tr>
                                 <td>{{$establecimiento->id}}</td>
                                 <td>{{$establecimiento->descripcion}}</td>
                                 <td>{{$establecimiento->cliente->nombre}}</td>
                                 <td>{{$establecimiento->estado->descripcion}}</td>
                               </tr>
                           @endforeach
                        </tbody>
      
                     </table>
                  </div>
                </div>
            @endif
         </div>
      </div>
      </div>
   </div>

</div>
