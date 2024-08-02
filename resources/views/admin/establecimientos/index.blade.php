@extends('layouts.app')

@section('title')
 Locales
@endsection

@section('content')
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>

        @endif

    <div class="card">
        <div class="card-header text-bg-dark">
            <h5>Listado de Locales</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoLocal">Nuevo Local</button>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cliente</th>
                                <th>Estado Local</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($establecimientos as $establecimiento)
                                <tr>
                                    <td>{{$establecimiento->id}}</td>
                                    <td>{{$establecimiento->descripcion}}</td>
                                    <td>{{$establecimiento->cliente->nombre}}</td>
                                    <td>{{$establecimiento->estado->descripcion}}</td>
                                    <td width = "10px">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarLocal{{$establecimiento->id}}">Editar</button>
                                        {{-- Modal para la edicion de los Establecimientos --}}
                                        <div class="modal fade" id="editarLocal{{$establecimiento->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Nuevo Local
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::model($establecimiento, ['route' => ['admin.establecimientos.update', $establecimiento], 'method' => 'put']) !!}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('descripcion', 'Nombre') !!}
                                                                        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                                    
                                                                        @error('descripcion')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('cliente_id', 'Cliente') !!}
                                                                        {!! Form::select('cliente_id', $clientes, null, ['class'=> 'form-control']) !!}
                                                                    </div>
                                                                    @error('clientes_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>
                                    
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('esestado_id', 'Estado Local') !!}
                                                                        {!! Form::select('esestado_id', $esestados, null, ['class'=> 'form-control']) !!}
                                                                    </div>
                                                                    @error('esestado_id')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>
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
                                        <form id="formularioEliminacion" action="{{route('admin.establecimientos.destroy', $establecimiento)}}" method="post" onsubmit="confirmarEliminacion(event)">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Elminar">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="nuevoLocal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nuevo Local
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.establecimientos.store']) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('descripcion', 'Nombre') !!}
                                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}

                                    @error('descripcion')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('cliente_id', 'Cliente') !!}
                                    {!! Form::select('cliente_id', $clientes, null, ['class'=> 'form-control']) !!}
                                </div>
                                @error('cliente_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('esestado_id', 'Estado Local') !!}
                                    {!! Form::select('esestado_id', $esestados, null, ['class'=> 'form-control']) !!}
                                </div>
                                @error('esestado_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
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
@endsection

