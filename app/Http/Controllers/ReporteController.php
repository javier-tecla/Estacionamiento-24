<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Facturacion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        return view('admin.reportes.index');
    }

    public function reporte_semanal(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $usuario = Auth::user();

       $facturaciones = Facturacion::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get();
       $ajuste = Ajuste::first();

        $pdf = PDF::loadView('admin.reportes.semanal', compact('facturaciones','ajuste', 'fecha_inicio', 'fecha_fin', 'usuario'));
        return $pdf->stream('reporte_semanal.pdf');

        // return view('admin.reportes.semanal', compact('facturaciones','ajuste', 'fecha_inicio', 'fecha_fin'));
    }

    public function reporte_mensual(Request $request)
    {
        $year = $request->input('year');
        $mes = $request->input('mes');
        $usuario = Auth::user();

       $facturaciones = Facturacion::whereYear('created_at', $year)
       ->whereMonth('created_at', $mes)->get();

       $ajuste = Ajuste::first();

        $pdf = PDF::loadView('admin.reportes.mensual', compact('facturaciones','ajuste','year','mes','usuario'));
        return $pdf->stream('reporte_semanal.pdf');

        // return view('admin.reportes.semanal', compact('facturaciones','ajuste', 'fecha_inicio', 'fecha_fin'));
    }
}
