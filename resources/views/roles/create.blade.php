@extends('layouts.app')

@section('title')
Crear Rol
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Añadir Nuevo Rol</h5>
            <div class="p-4 rounded">
                <div class="container mt-4">

                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>
                        </div>

                        <label for="permissions" class="form-label">Asignacion de Permisos</label>

                        <table class="table table-striped">
                            <thead>
                                <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                <th scope="col" width="20%">Nombre</th>
                                <th scope="col" width="1%">Guarda</th>
                            </thead>

                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permission[{{ $permission->name }}]"
                                        value="{{ $permission->name }}" class='permission'>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                            @endforeach
                        </table>

                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default">Atras</a>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @endsection

    @push('after-scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {
            if ($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked', false);
                });
            }
        });
    });
    </script>
    @endpush