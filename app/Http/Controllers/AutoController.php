<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoController extends Controller
{
     // Mostrar todo
    public function index()
    {
        $autos = Auto::all();
        return response()->json($autos);
    }

    // Crear
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'no_serie' => 'required|string|max:17',
            'placas' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'no_poliza' => 'nullable|string|max:255',
        ]);

        $auto = Auto::create($validated);
        return response()->json($auto, 201);
    }

    // Mostrar un auto específico
    public function show($id)
    {
        $auto = Auto::findOrFail($id);
        return response()->json($auto);
    }

    // Actualizar
    public function update(Request $request, $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->update($request->all());
        return response()->json($auto);
    }

    // Eliminar
    public function destroy($id)
    {
        $auto = Auto::findOrFail($id);
        $auto->delete();
        return response()->json(['message' => 'Auto eliminado correctamente']);
    }
}
