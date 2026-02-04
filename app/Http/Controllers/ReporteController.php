<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        return view('admin.reportes.index');
    }

    public function reporte_semanal(Request $request)
    {
        echo $fecha_inicio = $request->input('fecha_inicio');
        echo " - ". $fecha_fin = $request->input('fecha_fin');

        // return view('admin.reportes.reporte_semanal', compact('fecha_inicio', 'fecha_fin'));
    }
}
