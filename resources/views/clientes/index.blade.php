@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Lista de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">+ Nuevo Cliente</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre completo</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Licendia de Conducir</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->rfc }}</td>
                    <td>{{ $cliente->licencia_conducir }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
