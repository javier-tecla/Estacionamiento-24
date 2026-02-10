<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $rol = new Role;
        $rol->name = strtoupper($request->name);
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol guardado correctamente')
            ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('admin.roles.edit', compact('role'));
    }

    public function permisos($id)
    {
        $role = Role::find($id);
        $permisos = Permission::all()->groupBy(function ($permiso) {
            if (stripos($permiso->name, 'ajuste') !== false) {return 'Ajustes'; }
            if (stripos($permiso->name, 'role') !== false) {return 'Roles'; }
            if (stripos($permiso->name, 'usuario') !== false) {return 'Usuarios'; }
            if (stripos($permiso->name, 'espacio') !== false) {return 'Espacios'; }
            if (stripos($permiso->name, 'tarifas') !== false) {return 'Tarifas'; }
            if (stripos($permiso->name, 'cliente') !== false) {return 'Clientes'; }
            if (stripos($permiso->name, 'vehiculo') !== false) {return 'Vehiculos'; }
            if (stripos($permiso->name, 'tickets') !== false) {return 'Tickets'; }
            if (stripos($permiso->name, 'facturacion') !== false) {return 'Facturaciones'; }
            if (stripos($permiso->name, 'reporte') !== false) {return 'Reportes'; }
        });

        return view('admin.roles.permisos', compact('role', 'permisos'));
    }

    public function update_permisos (Request $request, $id)
    {
        // return response()->json($request->all());
        $role = Role::find($id);
        $role->permissions()->sync($request->permisos);

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Permisos asignados correctamente')
        ->with('icono', 'success');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
        ]);

        $rol = Role::find($id);
        $rol->name = strtoupper($request->name);
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol modificado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Role::find($id);

        $usuarios_asociados = User::role($rol->name)->count();

        if($usuarios_asociados > 0){
            return redirect()->route('admin.roles.index')
            ->with('mensaje', 'No se puede eliminar el rol: '.$rol->name.' porque tiene '.$usuarios_asociados.' usuarios asociados')
            ->with('icono', 'error');
        }
        
        $rol->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol eliminado correctamente')
            ->with('icono', 'success');
    }
}
