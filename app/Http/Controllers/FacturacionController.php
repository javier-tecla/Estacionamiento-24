<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ajuste;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Facturacion;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;


class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ajuste = Ajuste::first();
        $facturas = Facturacion::orderBy('id', 'desc')->get();
        return view('admin.facturacion.index', compact('facturas','ajuste'));
    }

    public function imprimir_factura($id)
    {
        $factura = Facturacion::find($id);
        $ajuste = Ajuste::first();
        $fecha_hora = Carbon::now();

        $qr = "Esta factura numero ".$factura->nro_factura." corresponde al cliente: ".$factura->nombre_cliente." con numero de documento ".$factura->nro_documento." con la placa del vehiculo: ".$factura->placa.", por el ".$factura->detalle.", con un costo total de ".$factura->monto;
        $barcodePNG = 'data:image/png;base64,' . DNS2D::getBarcodePNG($qr, 'QRCODE', 4, 4);

        $pdf = PDF::loadView('admin.facturacion.factura_pdf', compact('factura', 'ajuste', 'fecha_hora', 'barcodePNG'));

        // Configuración para impresora térmica (80mm de ancho, alto automático)
        $pdf->setOptions([
            'dpi' => 120,
            'defaultPaperSize' => [0, 0, 226.77, 0], // 80mm = 226.77 puntos
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'Arial Narrow',
        ]);

        $pdf->setPaper([0, 0, 226.77, 999999]); // 80mm de ancho, alto infinito

        return $pdf->stream("factura.pdf");

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}
