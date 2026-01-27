<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('admin.vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'cliente_id' => 'required',
            'placa' => 'required|unique:vehiculos,placa',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'tipo' => 'required',
        ]);

        $vehiculo = new Vehiculo();
      
        $vehiculo->cliente_id = $request->cliente_id;
        $vehiculo->placa = strtoupper($request->placa);
        $vehiculo->marca = strtoupper($request->marca);
        $vehiculo->modelo = strtoupper($request->modelo);
        $vehiculo->color = strtoupper($request->color);
        $vehiculo->tipo = strtoupper($request->tipo);
        $vehiculo->save();

        return redirect()->back()
            ->with('mensaje', 'Vehículo registrado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $vehiculo = Vehiculo::find($id);

        $request->validate([
            'cliente_id' => 'required',
            'placa' => 'required|string|max:255|unique:vehiculos,placa,'.$id,
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'tipo' => 'required',
        ]);

        $vehiculo->cliente_id = $request->cliente_id;
        $vehiculo->placa = strtoupper($request->placa);
        $vehiculo->marca = strtoupper($request->marca);
        $vehiculo->modelo = strtoupper($request->modelo);
        $vehiculo->color = strtoupper($request->color);
        $vehiculo->tipo = strtoupper($request->tipo);
        $vehiculo->save();

        return redirect()->back()
            ->with('mensaje', 'Vehículo actualizado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();

        return redirect()->back()
        ->with('mensaje', 'Vehiculo eliminado correctamente')
        ->with('icono', 'success');
    }
}
