<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar todo
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    // Crear
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'rfc' => 'nullable|string|max:13',
            'licencia_conducir' => 'nullable|string|max:12',
        ]);

        $cliente = Cliente::create($validated);
        return response()->json($cliente, 201);
    }

    // Mostrar uno especifico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    // Actualizar
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    // Eliminar
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(['message' => 'Cliente eliminado correctamente']);
    }
}
