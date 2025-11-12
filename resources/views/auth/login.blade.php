@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
        <p class="mt-2">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
    </form>
</div>
@endsection
