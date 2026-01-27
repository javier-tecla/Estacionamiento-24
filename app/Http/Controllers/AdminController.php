<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Espacio;
use App\Models\Tarifa;
use App\Models\Ticket;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();
        $total_usuarios = User::whereDoesntHave('roles', function($query){
            $query->where('name', 'SUPER ADMIN');
        })->withTrashed()->count();

        $total_espacios = Espacio::count();
        $total_espacios_libres = Espacio::where('estado', 'libre')->count();
        $total_espacios_ocupados = Espacio::where('estado', 'ocupado')->count();
        $total_espacios_mantenimiento = Espacio::where('estado', 'mantenimiento')->count();
        $total_tarifas = Tarifa::count();
        $total_clientes = Cliente::count();
        $total_vehiculos = Vehiculo::count();
        $total_tickets_activos = Ticket::where('estado_ticket', 'activo')->count();

        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_espacios', 'total_espacios_libres', 'total_espacios_ocupados', 'total_espacios_mantenimiento', 'total_tarifas', 'total_clientes', 'total_vehiculos', 'total_tickets_activos'));
    }
}
