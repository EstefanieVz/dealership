@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Lista de Autos</h2>
    <a href="{{ route('autos.create') }}" class="btn btn-primary mb-3">+ Nuevo Auto</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>No. Serie</th>
                <th>Placas</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autos as $auto)
                <tr>
                    <td>{{ $auto->id }}</td>
                    <td>{{ $auto->marca }}</td>
                    <td>{{ $auto->no_serie }}</td>
                    <td>{{ $auto->placas }}</td>
                    <td>${{ number_format($auto->precio, 2) }}</td>
                    <td>{{ $auto->stock }}</td>
                    <td>
                        <a href="{{ route('autos.show', $auto) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('autos.edit', $auto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('autos.destroy', $auto) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este auto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
