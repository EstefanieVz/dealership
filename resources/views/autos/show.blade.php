@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detalles del Auto</h1>

    <div class="card p-4">
        <p><strong>Marca:</strong> {{ $auto->marca }}</p>
        <p><strong>No. Serie:</strong> {{ $decrypted->no_serie }}</p>
        <p><strong>Placas:</strong> {{ $decrypted->placas }}</p>
        <p><strong>No. Póliza:</strong> {{ $decrypted->no_poliza }}</p>
        <p><strong>Precio:</strong> ${{ $auto->precio }}</p>
        <p><strong>Stock:</strong> {{ $auto->stock }}</p>
        <p><strong>Descripción:</strong> {{ $auto->descripcion }}</p>

        <a href="{{ route('autos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>
@endsection
