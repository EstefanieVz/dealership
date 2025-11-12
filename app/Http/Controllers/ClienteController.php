<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    // Mostrar todos los clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('clientes.create');
    }

    // Crear cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'rfc' => 'required|string|max:20',
            'licencia_conducir' => 'required|string|max:30',
        ]);

        $key = env('DB_AES_KEY');

        DB::table('clientes')->insert([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rfc' => DB::raw("HEX(AES_ENCRYPT('{$request->rfc}', '{$key}'))"),
            'licencia_conducir' => DB::raw("HEX(AES_ENCRYPT('{$request->licencia_conducir}', '{$key}'))"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con datos cifrados correctamente.');
    }

    // Mostrar cliente específico
    public function show($id)
    {
        $key = env('DB_AES_KEY');
        $cliente = Cliente::findOrFail($id);

        $decrypted = DB::selectOne("
            SELECT 
                CAST(AES_DECRYPT(UNHEX(rfc), ?) AS CHAR) AS rfc,
                CAST(AES_DECRYPT(UNHEX(licencia_conducir), ?) AS CHAR) AS licencia_conducir
            FROM clientes
            WHERE id = ?
        ", [$key, $key, $id]);

        return view('clientes.show', compact('cliente', 'decrypted'));
    }

    // Editar cliente
    public function edit($id)
    {
        $key = env('DB_AES_KEY');
        $cliente = Cliente::findOrFail($id);

        $decrypted = DB::selectOne("
            SELECT 
                CAST(AES_DECRYPT(UNHEX(rfc), ?) AS CHAR) AS rfc,
                CAST(AES_DECRYPT(UNHEX(licencia_conducir), ?) AS CHAR) AS licencia_conducir
            FROM clientes
            WHERE id = ?
        ", [$key, $key, $id]);

        $cliente->rfc = $decrypted->rfc;
        $cliente->licencia_conducir = $decrypted->licencia_conducir;

        return view('clientes.edit', compact('cliente'));
    }

    // Actualizar cliente
    public function update(Request $request, $id)
    {
         $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'rfc' => 'required|string|max:20',
            'licencia_conducir' => 'required|string|max:30',
        ]);

        $key = env('DB_AES_KEY');

        DB::table('clientes')->where('id', $id)->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rfc' => DB::raw("HEX(AES_ENCRYPT('{$request->rfc}', '{$key}'))"),
            'licencia_conducir' => DB::raw("HEX(AES_ENCRYPT('{$request->licencia_conducir}', '{$key}'))"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    // Eliminar cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
