@extends('layouts.app')

@section('title')
 Clientes
@endsection

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>    
@endif
    <div class="card">
        <div class="card-header text-bg-dark">
            <h5>Listado de Clientes</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoCliente">Nuevo Cliente</button>
                </div>
                <div class="col-7">
                    
                </div>

                <div class="col-1">
                    <a href="{{route('exportar_clientes')}}" class="btn btn-success float-right">Exportar</a>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="fw-bold">ID</td>
                                <td class="fw-bold">Nombre Cliente</td>
                                <td class="fw-bold" colspan="2">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td width="10px">
                                        <button class="btn btn-primary btn-sm" data-bs-target="#editarCliente{{$cliente->id}}" data-bs-toggle="modal">Editar</button>
                                        {{-- Modal para la Ediacion del Cliente --}}
                                        <div class="modal fade" id="editarCliente{{$cliente->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Editar Cliente
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::model($cliente, ['route' => ['admin.clientes.update', $cliente], 'method' => 'put']) !!}
                                                            <div class="form-group">
                                                                {!! Form::label('nombre', 'Nombre') !!}
                                                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                                            </div>
                                                            @error('nombre')
                                                                <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
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
                                        <form id="formularioEliminacion" action="{{route('admin.clientes.destroy', $cliente)}}" method="post" onsubmit="confirmarEliminacion(event)">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
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
    <div class="modal fade" id="nuevoCliente" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nuevo Cliente
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.clientes.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>
                        @error('nombre')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
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

