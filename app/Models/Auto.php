<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Auto extends Model
{
   use HasFactory;

    protected $fillable = [
        'marca',
        'no_serie',
        'placas',
        'descripcion',
        'precio',
        'stock',
        'no_poliza',
    ];

    // --- CIFRADO AUTOMÁTICO ---
    protected static function booted()
    {
        static::creating(function ($auto) {
            $key = env('DB_AES_KEY');

            $auto->no_serie  = DB::raw("HEX(AES_ENCRYPT('{$auto->no_serie}', '{$key}'))");
            $auto->placas    = DB::raw("HEX(AES_ENCRYPT('{$auto->placas}', '{$key}'))");
            $auto->no_poliza = DB::raw("HEX(AES_ENCRYPT('{$auto->no_poliza}', '{$key}'))");
        });
    }

    // --- DESCIFRADO AUTOMÁTICO ---
    public static function obtenerDescifrado($id)
    {
        $key = env('DB_AES_KEY');

        return DB::table('autos')
            ->select(
                'id',
                'marca',
                DB::raw("CAST(AES_DECRYPT(UNHEX(no_serie), '{$key}') AS CHAR(255)) AS no_serie"),
                DB::raw("CAST(AES_DECRYPT(UNHEX(placas), '{$key}') AS CHAR(255)) AS placas"),
                'descripcion',
                'precio',
                'stock',
                DB::raw("CAST(AES_DECRYPT(UNHEX(no_poliza), '{$key}') AS CHAR(255)) AS no_poliza"),
                'created_at',
                'updated_at'
            )
            ->where('id', $id)
            ->first();
    }
}
