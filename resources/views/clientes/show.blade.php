@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Cliente</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $cliente->nombre }} {{ $cliente->apellidos }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $cliente->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $cliente->telefono }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $cliente->direccion }}</li>
        <li class="list-group-item"><strong>RFC:</strong> {{ $cliente->rfc }}</li>
        <li class="list-group-item"><strong>Licencia:</strong> {{ $cliente->licencia_conducir }}</li>
    </ul>

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
