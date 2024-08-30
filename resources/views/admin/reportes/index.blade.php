@extends('layouts.app')

@section('title')
 Reportes
@endsection

@section('content')
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>

        @endif

    <div class="card">
        <div class="card-header text-bg-dark">
            <h5>Listado de Reportes</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    @can('admin.reportes.create')
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoReporte">Nuevo Reporte</button>
                    @endcan
                </div>
                <div class="col-7"></div>
                <div class="col-1">
                    @can('exportar_reportes')
                        <a href="{{route('exportar_reportes')}}" class="btn btn-success">Exportar</a>
                    @endcan
                </div>
            </div>

            <div class="row">
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
                                <th colspan="3">Acciones</th>
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
                                    <td width="10px">
                                        @can('admin.reportes.show')
                                            <button class="btn btn-success btn-sm" data-bs-target="#verReporte{{$reporte->id}}" data-bs-toggle="modal">Ver</button>
                                        @endcan

                                        {{-- Modal para ver los detalles del reporte --}}
                                        <div class="modal fade" id="verReporte{{$reporte->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Detalles del Reporte {{$reporte->id}}
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2 mb-2">
                                                                <h5 class="fw-bold">No. Rep: </h5>
                                                                <p>{{$reporte->id}}</p>
                                                            </div>
                                                            <div class="col-3 mb-2">
                                                                <h5 class="fw-bold">Fecha de Inicio: </h5>
                                                                <p>{{$reporte->fecha_inicio}}</p>
                                                            </div>

                                                            <div class="col-3 mb-2">
                                                                <h5 class="fw-bold">Fecha de Cierre: </h5>
                                                                <p>{{$reporte->fecha_cierre}}</p>
                                                            </div>

                                                            <div class="col-4 mb-2">
                                                                <h5 class="fw-bold">Estado Reporte: </h5>
                                                                <p>{{$reporte->repestado->descripcion}}</p>
                                                            </div>

                                                            <div class="col-2 mb-2">
                                                                <h5 class="fw-bold">Cliente: </h5>
                                                                <p>{{$reporte->cliente->nombre}}</p>
                                                            </div>

                                                            <div class="col-3 mb-2">
                                                                <h5 class="fw-bold">Local: </h5>
                                                                <p>{{$reporte->establecimiento->descripcion}}</p>
                                                            </div>

                                                            <div class="col-3 mb-2">
                                                                <h5 class="fw-bold">Estado Local: </h5>
                                                                <p>{{$reporte->establecimiento->estado->descripcion}}</p>
                                                            </div>

                                                            <div class="col-4 mb-2">
                                                                <h5 class="fw-bold">Técnico: </h5>
                                                                <p>{{$reporte->tecnico->nombre}} {{$reporte->tecnico->primer_apellido}} {{$reporte->tecnico->segundo_apellido}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="card-header text-center">
                                                                    <h5 class="fw-bold">Trabajos Realizados</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="fw-bold">Fecha</th>
                                                                                <th class="fw-bold">Descripcion del Trabajo</th>
                                                                                <th>Usuario</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($reporte->trabajos as $trabajo)
                                                                                <tr>
                                                                                    <td>{{$trabajo->fecha}}</td>
                                                                                    <td>{{$trabajo->descripcion}}</td>
                                                                                    <td>{{auth()->user()->name}}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                    
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                
                                                        <div class="row mt-2">
                                                            <h5 class="text-center fw-bold mb-1">Insertar Trabajos</h5>
                                                            <form action="{{route('admin.trabajos.store')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="reporte" value="{{$reporte->id}}">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="">Fecha de Realizacion</label>
                                                                        <input type="date" name="fecha" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="">Trabajo Realizado</label>
                                                                        <textarea name="descripcion" cols="10" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="mt-2 btn btn-success">Agregar Trabajo</button>
                                                            </form>
                                                        </div>                                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            Cerrar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10px">
                                        @can('admin.reportes.edit')
                                            <button class="btn btn-primary btn-sm" data-bs-target="#editarReporte{{$reporte->id}}" data-bs-toggle="modal">Editar</button>
                                        @endcan
                                        <!-- Modal Body -->
                                        <!-- Modal para introducir nuevo reporte -->
                                        <div class="modal fade" id="editarReporte{{$reporte->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Editar Reporte {{$reporte->id}}
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::model($reporte,['route' => ['admin.reportes.update', $reporte], 'method' => 'put']) !!}
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                                                                        {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'readonly']) !!}

                                                                        @error('fecha_inicio')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        {!! Form::label('fecha_cierre', 'Fecha de Cierre') !!}
                                                                        {!! Form::date('fecha_cierre', null, ['class' => 'form-control']) !!}

                                                                        @error('fecha_cierre')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        {!! Form::label('repestado_id', 'Estado del Reporte') !!}
                                                                        {!! Form::select('repestado_id', $repestados, null, ['class'=> 'form-control']) !!}
                                                                    </div>
                                                                    @error('repestado_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        {!! Form::label('clientes_id', 'Cliente') !!}
                                                                        {{-- {!! Form::select('clientes_id', $clientesEdit, null, ['class'=> 'form-control', 'readonly']) !!} --}}
                                                                        {!! Form::text('clientes_id', $reporte->cliente->nombre, ['class' => 'form-control', 'readonly']) !!}
                                                                    </div>
                                                                    @error('clientes_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        {!! Form::label('establecimientos_id', 'Local') !!}
                                                                        {{-- {!! Form::select('establecimientos_id', $establecimientos, null, ['class'=> 'form-control', 'readonly']) !!} --}}
                                                                        {!! Form::text('establecimientos_id', $reporte->establecimiento->descripcion, ['class' => 'form-control', 'readonly']) !!}
                                                                    </div>
                                                                    @error('establecimientos_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Tecnico</label>
                                                                        <select name="tecnicos_id" class="form-control">
                                                                            <option value="{{$reporte->tecnico->id}}">{{$reporte->tecnico->nombre}} {{$reporte->tecnico->primer_apellido}} {{$reporte->tecnico->segundo_apellido}}</option>
                                                                            @foreach ($tecnicos as $tecnico)
                                                                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} {{$tecnico->primer_apellido}} {{$tecnico->segundo_apellido}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('tecnicos_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>
                                                                <input type="text" hidden name="user_id" value="{{auth()->user()->id}}">
                                                            </div>

                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                                                        {!! Form::close() !!}
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cerrar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10px">
                                        @can('admin.reportes.destroy')
                                            <form id="formularioEliminacion" action="{{route('admin.reportes.destroy', $reporte)}}" method="POST" onsubmit="confirmarEliminacion(event)">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{$reportes->links()}}
        </div>
    </div>
        
    <!-- Modal Body -->
    <!-- Modal para introducir nuevo reporte -->
    <div class="modal fade" id="nuevoReporte" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nuevo Reporte
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.reportes.store']) !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                                    {!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}

                                    @error('fecha_inicio')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('fecha_cierre', 'Fecha de Cierre') !!}
                                    {!! Form::date('fecha_cierre', null, ['class' => 'form-control']) !!}

                                    @error('fecha_cierre')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('repestado_id', 'Estado del Reporte') !!}
                                    {!! Form::select('repestado_id', $repestados, null, ['class'=> 'form-control']) !!}
                                </div>
                                @error('repestado_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Clientes</label>
                                    <select id="cliente_id" name="clientes_id" class="form-control">
                                        <option value=""></option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('clientes_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Locales</label>
                                    <select name="establecimientos_id" id="local_id" class="form-control">
                                        <option value="">Seleccione primero un Cliente</option>
                                    </select>
                                </div>
                                @error('establecimientos_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tecnico</label>
                                    <select name="tecnicos_id" class="form-control">
                                        <option value=""></option>
                                        @foreach ($tecnicos as $tecnico)
                                            <option value="{{$tecnico->id}}">{{$tecnico->nombre}} {{$tecnico->primer_apellido}} {{$tecnico->segundo_apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tecnicos_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <input type="text" hidden name="user_id" value="{{auth()->user()->id}}">
                        </div>

                        
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>
    
@endsection

@section('script')
    {{-- Seccion para la ejecucion de codigo javascript en esta pagina --}}
<script>
    window.confirmarEliminacion = (event) => {
        event.preventDefault();

            Swal.fire({
            title: '¿Estás seguro?',
            text: "La eliminacion es permanente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía el formulario
                event.target.submit();
            }
        });
    } 
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
    $('#nuevoReporte').on('shown.bs.modal', function () {
        document.getElementById('cliente_id').addEventListener('change', function() {
            const clienteId = this.value;
            console.log(clienteId);
            const localSelect = document.getElementById('local_id');
            
            if (clienteId) {
                fetch(`/api/clientes/${clienteId}/establecimientos`)
                    .then(response => response.json())
                    .then(data => {
                        localSelect.innerHTML = '<option value="">Seleccione un local</option>';
                        data.forEach(local => {
                            const option = document.createElement('option');
                            option.value = local.id;
                            option.textContent = local.descripcion;
                            localSelect.appendChild(option);
                        });
                    });
            } else {
                localSelect.innerHTML = '<option value="">Seleccione un local</option>';
            }
        });
    });
});
</script>
@endsection

