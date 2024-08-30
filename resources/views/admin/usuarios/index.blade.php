@extends('layouts.app')

@section('title')
Listado de Usuarios
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Usuarios</h5>
            <h6 class="card-subtitle mb-2 text-muted">Pagina para la Administración de Usuarios</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                @can('admin.usuarios.create')
                    <button class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">Nuevo Usuario</button>
                @endcan
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">ID</th>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @can('admin.usuarios.show')
                                <a href="{{ route('admin.usuarios.show', $usuario) }}" class="btn btn-warning btn-sm">Ver</a>
                            @endcan
                        </td>
                        <td>
                            @can('admin.usuarios.edit')
                                <button class="btn btn-info btn-sm" data-bs-target="#editarUsuario{{$usuario->id}}" data-bs-toggle="modal">Editar</button>
                            @endcan
                            <div class="modal fade" id="editarUsuario{{$usuario->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Asignar Rol
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Nombre:</h5>
                                            <p class="form-control">{{$usuario->name}}</p>
                                        {!! Form::model($usuario, ['route'=>['admin.usuarios.update', $usuario], 'method' => 'put']) !!}
                                            <h5>Listado de Roles</h5>
                                            @foreach ($roles as $role)
                                                <div>
                                                    <label>
                                                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                                        {{$role->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            
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
                        <td>
                            @can('admin.usuarios.destroy')
                                <form action="{{route('admin.usuarios.destroy', $usuario->id)}}" method="post" onsubmit="confirmarEliminacion(event)">
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

            <div class="d-flex">
                
            </div>

        </div>
        <div class="card-footer">
            {{$usuarios->links()}}
        </div>
    </div>
</div>

{{-- Modal para la creacion de nuevos usuarios --}}
<div class="modal fade" id="nuevoUsuario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Nuevo Usuario
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'admin.usuarios.store']) !!}

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                    {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre']) !!}

                    @error('first_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                    {!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese los Apellidos']) !!}

                    @error('last_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Email']) !!}
                    @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Ingrese la contraseña']) !!}
                    @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                    {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirme la contraseña']) !!}
                    @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
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