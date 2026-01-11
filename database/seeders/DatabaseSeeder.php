<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ajuste;
use App\Models\Tarifa;
use App\Models\Cliente;
use App\Models\Espacio;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
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

        $this->call(RoleSeeder::class);

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

        //super admin
        User::create([
            'name' => 'Javier Borjas',
            'email' => 'cristman11@gmail.com',
            'password' => Hash::make('123456789'),
            'nombres' => 'Javier',
            'apellidos' => 'Borjas',
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
        ])->assignRole('SUPER ADMIN');

        // usuarios Administrador
        User::create([
            'name' => 'Ainhoa Borjas',
            'email' => 'ainhoa@ainhoa.com',
            'password' => Hash::make('123456789'),
            'nombres' => 'Ainhoa Jaibeth',
            'apellidos' => 'Borjas Fereira',
            'tipo_documento' => 'CI',
            'numero_documento' => '35698965',
            'celular' => '1136963696',
            'fecha_nacimiento' => '2012-12-22',
            'genero' => 'Femenino',
            'direccion' => 'Av. Principal #456, Zona Centro',
            'contacto_nombre' => 'Andres Borjas',
            'contacto_telefono' => '1147414741',
            'contacto_parentesco' => 'Hermana',
            'estado' => true,
        ])->assignRole('ADMINISTRADOR');

        // usuarios Operador
        User::create([
            'name' => 'Jose Borjas',
            'email' => 'jose@jose.com',
            'password' => Hash::make('123456789'),
            'nombres' => 'Jose Javier',
            'apellidos' => 'Borjas Fereira',
            'tipo_documento' => 'CI',
            'numero_documento' => '96385214',
            'celular' => '1147859632',
            'fecha_nacimiento' => '2010-10-18',
            'genero' => 'Masculino',
            'direccion' => 'Patricios 245, avellaneda',
            'contacto_nombre' => 'Ainhoa Borjas',
            'contacto_telefono' => '1125252632',
            'contacto_parentesco' => 'Hermano',
            'estado' => true,
        ])->assignRole('OPERADOR');

        //espacio de estacionamiento
        Espacio::create(['numero' => '1','estado' => 'libre']);
        Espacio::create(['numero' => '2','estado' => 'libre']);
        Espacio::create(['numero' => '3','estado' => 'libre']);
        Espacio::create(['numero' => '4','estado' => 'libre']);
        Espacio::create(['numero' => '5','estado' => 'libre']);
        Espacio::create(['numero' => '6','estado' => 'libre']);
        Espacio::create(['numero' => '7','estado' => 'libre']);
        Espacio::create(['numero' => '8','estado' => 'libre']);
        Espacio::create(['numero' => '9','estado' => 'libre']);
        Espacio::create(['numero' => '10','estado' => 'libre']);
        Espacio::create(['numero' => '11','estado' => 'libre']);
        Espacio::create(['numero' => '12','estado' => 'libre']);
        Espacio::create(['numero' => '13','estado' => 'libre']);
        Espacio::create(['numero' => '14','estado' => 'libre']);
        Espacio::create(['numero' => '15','estado' => 'libre']);
        Espacio::create(['numero' => '16','estado' => 'libre']);
        Espacio::create(['numero' => '17','estado' => 'libre']);
        Espacio::create(['numero' => '18','estado' => 'libre']);
        Espacio::create(['numero' => '19','estado' => 'libre']);
        Espacio::create(['numero' => '20','estado' => 'libre']);
        Espacio::create(['numero' => '21','estado' => 'libre']);
        Espacio::create(['numero' => '22','estado' => 'libre']);
        Espacio::create(['numero' => '23','estado' => 'libre']);
        Espacio::create(['numero' => '24','estado' => 'libre']);
        Espacio::create(['numero' => '25','estado' => 'libre']);
        Espacio::create(['numero' => '26','estado' => 'libre']);
        Espacio::create(['numero' => '27','estado' => 'libre']);
        Espacio::create(['numero' => '28','estado' => 'libre']);
        Espacio::create(['numero' => '29','estado' => 'libre']);
        Espacio::create(['numero' => '30','estado' => 'libre']);
        Espacio::create(['numero' => '31','estado' => 'libre']);
        Espacio::create(['numero' => '32','estado' => 'libre']);
        Espacio::create(['numero' => '33','estado' => 'libre']);
        Espacio::create(['numero' => '34','estado' => 'libre']);
        Espacio::create(['numero' => '35','estado' => 'libre']);
        Espacio::create(['numero' => '36','estado' => 'libre']);
        Espacio::create(['numero' => '37','estado' => 'libre']);
        Espacio::create(['numero' => '38','estado' => 'libre']);
        Espacio::create(['numero' => '39','estado' => 'libre']);
        Espacio::create(['numero' => '40','estado' => 'libre']);
        Espacio::create(['numero' => '41','estado' => 'libre']);
        Espacio::create(['numero' => '42','estado' => 'libre']);
        Espacio::create(['numero' => '43','estado' => 'libre']);
        Espacio::create(['numero' => '44','estado' => 'libre']);
        Espacio::create(['numero' => '45','estado' => 'libre']);
        Espacio::create(['numero' => '46','estado' => 'libre']);
        Espacio::create(['numero' => '47','estado' => 'libre']);
        Espacio::create(['numero' => '48','estado' => 'libre']);
        Espacio::create(['numero' => '49','estado' => 'libre']);
        Espacio::create(['numero' => '50','estado' => 'libre']);

        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'1','costo'=>'5','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'2','costo'=>'10','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'3','costo'=>'15','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'4','costo'=>'20','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'5','costo'=>'25','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'6','costo'=>'30','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'7','costo'=>'35','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'8','costo'=>'40','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'9','costo'=>'45','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'10','costo'=>'50','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'11','costo'=>'55','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'12','costo'=>'60','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'13','costo'=>'65','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'14','costo'=>'70','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'15','costo'=>'75','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'16','costo'=>'80','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'17','costo'=>'85','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'18','costo'=>'90','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'19','costo'=>'95','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'20','costo'=>'100','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'21','costo'=>'105','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'22','costo'=>'110','minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_hora','cantidad'=>'23','costo'=>'115','minutos_de_gracia'=>'30']);

        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'1','costo'=>'50','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'2','costo'=>'100','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'3','costo'=>'150','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'4','costo'=>'200','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'5','costo'=>'250','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'6','costo'=>'300','minutos_de_gracia'=>'60']);
        Tarifa::create(['nombre'=>'regular','tipo'=>'por_dia','cantidad'=>'7','costo'=>'350','minutos_de_gracia'=>'60']);

        // cliente 1 y su vehículo
        $cliente1 = Cliente::create([
            'nombres' => 'María Elena Rodríguez Vega',
            'numero_documento' => '123456789',
            'email' => 'maria.rodriguez@gmail.com',
            'celular' => '1125369855',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente1->id,
            'placa' => 'ABC-123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'color' => 'Blanco',
            'tipo' => 'auto',
          ]);


        // cliente 2 y su vehículo
       $cliente2 = Cliente::create([
            'nombres' => 'Carlos Antonio Méndez Silva',
            'numero_documento' => '96852321',
            'email' => 'carlos.mendez@gmail.com',
            'celular' => '1124563236',
            'genero' => 'Masculino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente2->id,
            'placa' => 'XYZ-456',
            'marca' => 'Honda',
            'modelo' => 'Civic',
            'color' => 'Azul',
            'tipo' => 'auto',
          ]);

        // cliente 3 y su vehículo
        $cliente3 = Cliente::create([
            'nombres' => 'Ana Patricia Perez',
            'numero_documento' => '95326596',
            'email' => 'ana.flores@gmail.com',
            'celular' => '1152246325',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente3->id,
            'placa' => 'DEF-789',
            'marca' => 'Nissan',
            'modelo' => 'Sentra',
            'color' => 'Rojo',
            'tipo' => 'auto',
          ]);

        // cliente 4 y su vehículo
        $cliente4 = Cliente::create([
            'nombres' => 'Roberto Luis Gonzalez Tovar',
            'numero_documento' => '36256987',
            'email' => 'roberto.torrez@outlook.com',
            'celular' => '11456123',
            'genero' => 'Masculino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente4->id,
            'placa' => 'GHI-012',
            'marca' => 'Ford',
            'modelo' => 'F-150',
            'color' => 'Negro',
            'tipo' => 'auto',
          ]);

        // cliente 5 y su vehículo
        $cliente5 = Cliente::create([
            'nombres' => 'Carmen Rosa Hernandez Lora',
            'numero_documento' => '17058693',
            'email' => 'carmen.hernandez@outlook.com',
            'celular' => '11252363',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente5->id,
            'placa' => 'JKL-345',
            'marca' => 'Yamaha',
            'modelo' => 'FZ-16',
            'color' => 'Verde',
            'tipo' => 'moto',
          ]);
    }
}
