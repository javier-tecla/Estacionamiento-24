<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ajuste;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //super admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'cristman11@gmail.com',
            'password' => Hash::make('123456789'),
            'nombres' => 'Super',
            'apellidos' => 'Admin',
            'tipo_documento' => 'DNI',
            'numero_documento' => '98765432',
            'celular' => '1123456789',
            'fecha_nacimiento' => '1982-01-01',
            'genero' => 'masculino',
            'direccion' => 'Direccion del Super Admin',
            'contacto_nombre' => 'Contacto del Super Admin',
            'contacto_telefono' => '98765432',
            'contacto_parentesco' => 'Amigo',
            'estado' => true,
        
        ]);

        Ajuste::create([
            'nombre' => 'Sistema de estacionamiento',
            'descripcion' => 'Sistema de gestión de estacionamiento',
            'sucursal' => 'Avellaneda',
            'direccion' => 'Mitre 1225',
            'telefono' => '1112345678',
            'logo' => 's4l85YGt7GNtY8HAuCasptxac3Q6nBqcI2MUQ735.webp',
            'logo_auto' => 'nVWRt4x89oRlMVJzKq9l1FFk4zfPdbfkY3bleNwd.png',
            'divisa' => 'AR$',
            'correo' => 'estacionamiento@24.com',
            'pagina_web' => 'https://estacionamiento24.com',

        ]);
    }
}
