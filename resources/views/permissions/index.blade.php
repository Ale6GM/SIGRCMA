@extends('layouts.app')

@section('title')
Lista de Permisos
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Permisos</h5>
            <h6 class="card-subtitle mb-2 text-muted">Administre sus Permisos aqui.</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="text-end">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Añadir Permiso</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col">Guarda</th>
                        <th scope="col" colspan="3" width="1%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}"
                                class="btn btn-info btn-sm">Editar</a></td>
                        <td>
                            <form action="{{route('roles.destroy', $permission->id)}}" method="post" onsubmit="confirmarEliminacion(event)">
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