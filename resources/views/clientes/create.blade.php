@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Registrar nuevo cliente</h2>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col">
                <label>Apellidos</label>
                <input type="text" name="apellidos" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control">
        </div>

        <div class="mb-3">
            <label>RFC</label>
            <input type="text" name="rfc" class="form-control">
        </div>

        <div class="mb-3">
            <label>Licencia de Conducir</label>
            <input type="text" name="licencia_conducir" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
