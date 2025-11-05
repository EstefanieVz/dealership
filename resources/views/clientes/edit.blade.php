@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Cliente</h2>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="col">
                <label>Apellidos</label>
                <input type="text" name="apellidos" class="form-control" value="{{ $cliente->apellidos }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $cliente->email }}">
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}">
        </div>

        <div class="mb-3">
            <label>RFC</label>
            <input type="text" name="rfc" class="form-control" value="{{ $cliente->rfc }}">
        </div>

        <div class="mb-3">
            <label>Licencia de Conducir</label>
            <input type="text" name="licencia_conducir" class="form-control" value="{{ $cliente->licencia_conducir }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
