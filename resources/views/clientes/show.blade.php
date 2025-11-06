@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detalles del Cliente</h1>

    <div class="card p-4">
        <p><strong>Nombre:</strong> {{ $cliente->nombre }} {{ $cliente->apellidos }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
        <p><strong>RFC:</strong> {{ $decrypted->rfc }}</p>
        <p><strong>Licencia de Conducir:</strong> {{ $decrypted->licencia_conducir }}</p>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>
@endsection
