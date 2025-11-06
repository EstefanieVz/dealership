@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Autos (Cifrados)</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('autos.create') }}" class="btn btn-success">
            Añadir Auto
        </a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Marca</th>
                <th>Descripción</th>
                <th>No. Serie </th>
                <th>Placas </th>
                <th>No. Póliza </th>
                <th>Precio</th>
                <th>Stock</th>
                <th style="width: 220px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autos as $auto)
                <tr>
                    <td>{{ $auto->marca }}</td>
                    <td>{{ $auto->descripcion }}</td>
                    <td class="text-break">{{ $auto->no_serie }}</td> {{-- Cifrado --}}
                    <td class="text-break">{{ $auto->placas }}</td>   {{-- Cifrado --}}
                    <td class="text-break">{{ $auto->no_poliza }}</td> {{-- Cifrado --}}
                    <td>${{ number_format($auto->precio, 2) }}</td>
                    <td>{{ $auto->stock }}</td>
                    <td>
                        <div class="d-flex gap-2 flex-wrap">
                            {{-- Ver (Descifrar) --}}
                            <a href="{{ route('autos.show', $auto->id) }}" class="btn btn-info btn-sm">
                                Ver
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('autos.edit', $auto->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            {{-- Eliminar --}}
                            <form action="{{ route('autos.destroy', $auto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este auto?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No hay autos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
