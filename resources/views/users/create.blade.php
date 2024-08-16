@extends('layouts.app')

@section('title')
Crear Usuario
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Añadir nuevo Usuario</h1>
        <div class="lead">
            Agregue un nuevo usuario y asigne un Rol.
        </div>

        <div class="container mt-4">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg></span>
                    <input class="form-control" type="text" name="first_name" placeholder="{{ __('Nombre') }}" required
                           autocomplete="first_name" autofocus>
                    @error('first_name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg></span>
                    <input class="form-control" type="text" name="last_name" placeholder="{{ __('Apellidos') }}" required
                           autocomplete="last_name" autofocus>
                    @error('last_name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                </svg></span>
                    <input class="form-control" type="text" name="email" placeholder="{{ __('Correo') }}" required
                           autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                </svg></span>
                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                           name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-4"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                </svg></span>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                           name="password_confirmation" placeholder="{{ __('Confirma Password') }}" required
                           autocomplete="new-password">
                </div>

                <button class="btn btn-block btn-success" type="submit">{{ __('Registrar') }}</button>
                <a href="{{route('users.index')}}" class="btn btn-secondary">Atras</a>
            </form>
            
        </div>

    </div>
@endsection