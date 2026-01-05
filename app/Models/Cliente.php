<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'numero_documento',
        'email',
        'celular',
        'genero',
        'estado',
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
