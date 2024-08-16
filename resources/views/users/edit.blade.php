@extends('layouts.app')

@section('title')
Editar Usuario
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Usuario</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                            required>

                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                            placeholder="Email address" required>
                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <input value="{{ $user->username }}" type="text" class="form-control" name="username"
                            placeholder="Username" required>
                        @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select class="form-control" name="role" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) 
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection