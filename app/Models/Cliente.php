<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'direccion',
        'rfc',
        'licencia_conducir',
    ];

    // --- CIFRADO AUTOMÁTICO ---
    protected static function booted()
    {
        static::creating(function ($cliente) {
            $key = env('DB_AES_KEY');

            // Cifrar campos sensibles con AES + HEX
            $cliente->rfc = DB::raw("HEX(AES_ENCRYPT('{$cliente->rfc}', '{$key}'))");
            $cliente->licencia_conducir = DB::raw("HEX(AES_ENCRYPT('{$cliente->licencia_conducir}', '{$key}'))");
        });
    }

    // --- DESCIFRADO AUTOMÁTICO ---
    public static function obtenerDescifrado($id)
    {
        $key = env('DB_AES_KEY');

        return DB::table('clientes')
            ->select(
                'id',
                'nombre',
                'apellidos',
                'email',
                'telefono',
                'direccion',
                DB::raw("CAST(AES_DECRYPT(UNHEX(rfc), '{$key}') AS CHAR(255)) AS rfc"),
                DB::raw("CAST(AES_DECRYPT(UNHEX(licencia_conducir), '{$key}') AS CHAR(255)) AS licencia_conducir"),
                'created_at',
                'updated_at'
            )
            ->where('id', $id)
            ->first();
    }
}
