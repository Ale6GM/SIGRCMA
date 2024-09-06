@extends('layouts.app')

@section('title')
 Tecnicos
@endsection

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>    
@endif
    <div class="card">
        <div class="card-header text-bg-dark">
            <h5>Listado de Técnicos</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @can('admin.tecnicos.create')
                <div class="col-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoCliente">Nuevo Técnico</button>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th class="fw-bold" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tecnicos as $tecnico)
                                <tr>
                                    <td>{{$tecnico->id}}</td>
                                    <td>{{$tecnico->nombre}}</td>
                                    <td>{{$tecnico->primer_apellido}}</td>
                                    <td>{{$tecnico->segundo_apellido}}</td>
                                    <td width="10px">
                                        @can('admin.tecnicos.edit')
                                        <button class="btn btn-primary btn-sm" data-bs-target="#editarTecnico{{$tecnico->id}}" data-bs-toggle="modal">Editar</button>
                                        @endcan
                                        {{-- Modal para la Ediacion del Cliente --}}
                                        <div class="modal fade" id="editarTecnico{{$tecnico->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Editar Tecnico
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::model($tecnico, ['route' => ['admin.tecnicos.update', $tecnico], 'method' => 'put']) !!}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('nombre', 'Nombre') !!}
                                                                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                    @error('nombre')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('primer_apellido', 'Apellido 1') !!}
                                                                        {!! Form::text('primer_apellido', null, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                    @error('primer_apellido')
                                                                        <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        {!! Form::label('segundo_apellido', 'Apellido 2') !!}
                                                                        {!! Form::text('segundo_apellido', null, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                    @error('segundo_apellido')
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
                                        @can('admin.tecnicos.destroy')
                                            <form id="formularioEliminacion" action="{{route('admin.tecnicos.destroy', $tecnico)}}" method="post" onsubmit="confirmarEliminacion(event)">
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
    </div>
        
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="nuevoCliente" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nuevo Técnico
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.tecnicos.store']) !!}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre') !!}
                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            </div>
                            @error('nombre')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('primer_apellido', 'Apellido 1') !!}
                                {!! Form::text('primer_apellido', null, ['class' => 'form-control']) !!}
                            </div>
                            @error('primer_apellido')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('segundo_apellido', 'Apellido 2') !!}
                                {!! Form::text('segundo_apellido', null, ['class' => 'form-control']) !!}
                            </div>
                            @error('segundo_apellido')
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

