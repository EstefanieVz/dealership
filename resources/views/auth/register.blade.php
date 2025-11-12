@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Registro de Usuario</h2>
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
        <p class="mt-2">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
    </form>
</div>
@endsection
