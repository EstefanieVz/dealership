@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Registrar nuevo auto</h2>

    <form action="{{ route('autos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No. Serie</label>
            <input type="text" name="no_serie" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Placas</label>
            <input type="text" name="placas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" required>
            </div>
            <div class="col">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>No. Póliza</label>
            <input type="text" name="no_poliza" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('autos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
