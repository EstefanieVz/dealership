<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{
    // Mostrar todo
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    // Crear
    public function create()
    {
        return view('autos.create');
    }

    // Crear auto 
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'no_serie' => 'required|string|max:255',
            'placas' => 'required|string|max:17',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'no_poliza' => 'nullable|string|max:255',
        ]);

        $key = env('DB_AES_KEY');

        DB::table('autos')->insert([
            'marca' => $request->marca,
            'no_serie' => DB::raw("HEX(AES_ENCRYPT('{$request->no_serie}', '{$key}'))"),
            'placas' => DB::raw("HEX(AES_ENCRYPT('{$request->placas}', '{$key}'))"),
            'no_poliza' => DB::raw("HEX(AES_ENCRYPT('{$request->no_poliza}', '{$key}'))"),
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('autos.index')->with('success', 'Auto creado exitosamente con datos cifrados.');
    }

    // Mostrar un auto descifrado
    public function show($id)
    {
        $key = env('DB_AES_KEY');
        $auto = Auto::findOrFail($id);

        $decrypted = DB::selectOne("
            SELECT 
                AES_DECRYPT(UNHEX(no_serie), ?) AS no_serie,
                AES_DECRYPT(UNHEX(placas), ?) AS placas,
                AES_DECRYPT(UNHEX(no_poliza), ?) AS no_poliza
            FROM autos 
            WHERE id = ?
        ", [$key, $key, $key, $id]);

        return view('autos.show', compact('auto', 'decrypted'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $key = env('DB_AES_KEY');
        $auto = Auto::findOrFail($id);

        $decrypted = DB::selectOne("
            SELECT 
                AES_DECRYPT(UNHEX(no_serie), ?) AS no_serie,
                AES_DECRYPT(UNHEX(placas), ?) AS placas,
                AES_DECRYPT(UNHEX(no_poliza), ?) AS no_poliza
            FROM autos 
            WHERE id = ?
        ", [$key, $key, $key, $id]);

        // Convertir los datos binarios a texto
        $auto->no_serie = $decrypted->no_serie;
        $auto->placas = $decrypted->placas;
        $auto->no_poliza = $decrypted->no_poliza;

        return view('autos.edit', compact('auto'));
    }

    // Actualizar auto con cifrado
    public function update(Request $request, $id)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'no_serie' => 'required|string|max:17',
            'placas' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'no_poliza' => 'nullable|string|max:255',
        ]);

        $key = env('DB_AES_KEY');

        DB::table('autos')->where('id', $id)->update([
            'marca' => $request->marca,
            'no_serie' => DB::raw("HEX(AES_ENCRYPT('{$request->no_serie}', '{$key}'))"),
            'placas' => DB::raw("HEX(AES_ENCRYPT('{$request->placas}', '{$key}'))"),
            'no_poliza' => DB::raw("HEX(AES_ENCRYPT('{$request->no_poliza}', '{$key}'))"),
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'updated_at' => now(),
        ]);

        return redirect()->route('autos.index')->with('success', 'Auto actualizado correctamente.');
    }

    // Eliminar
    public function destroy($id)
    {
        $auto = Auto::findOrFail($id);
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Auto eliminado correctamente.');
    }
}
