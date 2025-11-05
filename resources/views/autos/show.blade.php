@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Auto</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Marca:</strong> {{ $auto->marca }}</li>
        <li class="list-group-item"><strong>No. Serie:</strong> {{ $auto->no_serie }}</li>
        <li class="list-group-item"><strong>Placas:</strong> {{ $auto->placas }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $auto->descripcion }}</li>
        <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($auto->precio, 2) }}</li>
        <li class="list-group-item"><strong>Stock:</strong> {{ $auto->stock }}</li>
        <li class="list-group-item"><strong>No. Póliza:</strong> {{ $auto->no_poliza }}</li>
    </ul>

    <a href="{{ route('autos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
