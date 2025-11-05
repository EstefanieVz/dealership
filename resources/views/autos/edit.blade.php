@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Auto</h2>

    <form action="{{ route('autos.update', $auto) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ $auto->marca }}" required>
        </div>

        <div class="mb-3">
            <label>No. Serie</label>
            <input type="text" name="no_serie" class="form-control" value="{{ $auto->no_serie }}" required>
        </div>

        <div class="mb-3">
            <label>Placas</label>
            <input type="text" name="placas" class="form-control" value="{{ $auto->placas }}" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $auto->descripcion }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{ $auto->precio }}" required>
            </div>
            <div class="col">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $auto->stock }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>No. Póliza</label>
            <input type="text" name="no_poliza" class="form-control" value="{{ $auto->no_poliza }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('autos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
