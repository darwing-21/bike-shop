@extends('layouts.auth_app')
@section('title')
    Registrarse
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Registrarse</h4>
        </div>

        <div class="card-body pt-1">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">Nombre Completo:</label><span class="text-danger">*</span>
                            <input id="firstName" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                tabindex="1" placeholder="Ingresa tu Nombre Completo" value="{{ old('name') }}"
                                autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label><span class="text-danger">*</span>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Ingresa tu Correo Electrónico" name="email" tabindex="1"
                                value="{{ old('email') }}" required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña:</label><span
                                class="text-danger">*</span>
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Establece una contraseña" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Confirmar Contraseña:</label><span
                                class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirma tu contraseña"
                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="role" class="control-label">Rol:</label><span class="text-danger">*</span>
                            <select id="role" name="role"
                                class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
                                <option value="">Selecciona un rol</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuario</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Registrarse
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a>
    </div>
@endsection
