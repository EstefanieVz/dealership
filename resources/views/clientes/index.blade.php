@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Lista de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">+ Nuevo Cliente</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->rfc }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
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
