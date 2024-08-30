@extends('layouts.app')

@section('title')
Lista de Roles
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Roles</h5>
            <h6 class="card-subtitle mb-2 text-muted"> Administre sus Roles Aqui...</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Añadir Rol</a>
                @endcan
            </div>

            <table class="table table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th width="3%" colspan="3">Acciones</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $perm)
                        <span class="badge text-bg-info">{{ $perm->description }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('roles.show')
                            <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Ver</a>
                        @endcan
                    </td>
                    <td>
                        @can('roles.edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                        @endcan
                    </td>
                    <td>
                        @can('roles.destroy')
                            <form action="{{route('roles.destroy', $role->id)}}" method="post" onsubmit="confirmarEliminacion(event)">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach

            </table>

            <div class="d-flex">
                {!! $roles->links() !!}
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