<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Ajuste;
use App\Models\Tarifa;
use App\Models\Ticket;
use App\Models\Espacio;
use App\Models\Vehiculo;
use App\Models\Facturacion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ajuste = Ajuste::first();
        $espacios = Espacio::all();
        $vehiculos = Vehiculo::with('cliente')->get();
        $tarifas = Tarifa::all();

        $tickets_activos = Ticket::where('estado_ticket', 'activo')->get();

        // return response()->json($tickets_activos);

        return view('admin.tickets.index', compact('espacios', 'ajuste', 'vehiculos', 'tarifas', 'tickets_activos'));

        return response()->json($vehiculos);
    }

    public function buscar_vehiculo($id)
    {
        $vehiculo = Vehiculo::with('cliente')->find($id);

        return view('admin.tickets.buscar_vehiculo', compact('vehiculo'));
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
            'espacio_id' => 'required',
            'vehiculo_id' => 'required',
            'tarifa_id' => 'required',

        ]);

        $ticket_activo = Ticket::where('vehiculo_id', $request->vehiculo_id)
            ->where('estado_ticket', 'activo')->first();
        if ($ticket_activo) {
            return redirect()->back()
                ->with('mensaje', 'Error: El vehículo ya tiene un ticket activo')
                ->with('icono', 'error');
        }

        $vehiculo = Vehiculo::find($request->vehiculo_id);

        $ticket = new Ticket;
        $ticket->espacio_id = $request->espacio_id;
        $ticket->cliente_id = $vehiculo->cliente->id;
        $ticket->vehiculo_id = $request->vehiculo_id;
        $ticket->tarifa_id = $request->tarifa_id;
        $ticket->usuario_id = Auth::user()->id;

        // generar codigo del ticket
        $ultimo_ticket = DB::table('tickets')->max('id');
        $siguiente_ticket = $ultimo_ticket ? $ultimo_ticket + 1 : 1;
        $codigo_ticket = 'TK-'.$siguiente_ticket;

        // asignar fecha y hora
        $fecha_hora = Carbon::now();
        $ticket->codigo_ticket = $codigo_ticket;
        $ticket->fecha_ingreso = $fecha_hora->toDateString();
        $ticket->hora_ingreso = $fecha_hora->toTimeString();
        $ticket->estado_ticket = 'activo';
        $ticket->obs = $request->obs;
        $ticket->save();

        return redirect()->route('admin.tickets.index')
            ->with('mensaje', 'Ticket registrado correctamente')
            ->with('icono', 'success')
            ->with('ticket_id', $ticket->id);

    }

    public function imprimir_ticket($id)
    {
        $ticket = Ticket::with('cliente')->find($id);
        $ajuste = Ajuste::first();
        $fecha_hora = Carbon::now();
        $pdf = PDF::loadView('admin.tickets.ticket_pdf', compact('ticket', 'ajuste', 'fecha_hora'));

        // Configuración para impresora térmica (80mm de ancho, alto automático)
        $pdf->setOptions([
            'dpi' => 120,
            'defaultPaperSize' => [0, 0, 226.77, 0], // 80mm = 226.77 puntos
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'Arial Narrow',
        ]);

        $pdf->setPaper([0, 0, 226.77, 999999]); // 80mm de ancho, alto infinito

        return $pdf->stream('ticket.pdf');
    }

    public function finalizar_ticket($id)
    {
        $ticket = Ticket::find($id);

        $fecha_hora_ingreso = new DateTime($ticket->fecha_ingreso.' '.$ticket->hora_ingreso);
        $fecha_hora_salida = new DateTime(Carbon::now());

        $diff = $fecha_hora_ingreso->diff($fecha_hora_salida);
        $dias_calculado = $diff->days;
        $horas_calculado = $diff->h;
        $minutos_calculado = $diff->i;

        // diferencia en minutos
        $diferencia_minutos = ($diff->h * 60) + ($diff->i);


        $tiempo_total = $dias_calculado.' días con '.$horas_calculado.' horas con '.$minutos_calculado.' minutos';

        switch ($ticket->tarifa->tipo) {
            case 'por_hora':
                switch ($ticket->tarifa->nombre) {
                    case 'regular':
                        if ($minutos_calculado > $ticket->tarifa->minutos_de_gracia) {
                            $horas_calculado = $horas_calculado + 1;
                        } else {
                            $horas_calculado = $horas_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_hora')->where('nombre', 'regular')->where('cantidad', $horas_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'nocturno':
                        if ($minutos_calculado > $ticket->tarifa->minutos_de_gracia) {
                            $horas_calculado = $horas_calculado + 1;
                        } else {
                            $horas_calculado = $horas_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_hora')->where('nombre', 'nocturno')->where('cantidad', $horas_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'fin_de_semana':
                        if ($minutos_calculado > $ticket->tarifa->minutos_de_gracia) {
                            $horas_calculado = $horas_calculado + 1;
                        } else {
                            $horas_calculado = $horas_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_hora')->where('nombre', 'fin_de_semana')->where('cantidad', $horas_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'feriados':
                        if ($minutos_calculado > $ticket->tarifa->minutos_de_gracia) {
                            $horas_calculado = $horas_calculado + 1;
                        } else {
                            $horas_calculado = $horas_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_hora')->where('nombre', 'feriados')->where('cantidad', $horas_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                }
                break;

            case 'por_dia':
                switch ($ticket->tarifa->nombre) {
                    case 'regular':
                        if ($diferencia_minutos > $ticket->tarifa->minutos_de_gracia) {
                            $dias_calculado = $dias_calculado + 1;
                        } else {
                            $dias_calculado = $dias_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_dia')->where('nombre', 'regular')->where('cantidad', $dias_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'nocturno':
                        if ($diferencia_minutos > $ticket->tarifa->minutos_de_gracia) {
                            $dias_calculado = $dias_calculado + 1;
                        } else {
                            $dias_calculado = $dias_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_dia')->where('nombre', 'nocturno')->where('cantidad', $dias_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'fin_de_semana':
                        if ($diferencia_minutos > $ticket->tarifa->minutos_de_gracia) {
                            $dias_calculado = $dias_calculado + 1;
                        } else {
                            $dias_calculado = $dias_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_dia')->where('nombre', 'fin_de_semana')->where('cantidad', $dias_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                    case 'feriados':
                        if ($diferencia_minutos > $ticket->tarifa->minutos_de_gracia) {
                            $dias_calculado = $dias_calculado + 1;
                        } else {
                            $dias_calculado = $dias_calculado;
                        }
                        $tarifa = Tarifa::where('tipo', 'por_dia')->where('nombre', 'feriados')->where('cantidad', $dias_calculado)->first();
                        $monto_total = $tarifa->costo;
                        break;
                }
                break;
        }

        // actualizar ticket en la base de datos
        $fecha_hora = Carbon::now();
        $ticket->tarifa_id = $tarifa->id;
        $ticket->fecha_salida = $fecha_hora->toDateString();
        $ticket->hora_salida = $fecha_hora->toTimeString();
        $ticket->tiempo_total = $tiempo_total;
        $ticket->monto_total = $monto_total;
        $ticket->estado_ticket = 'completado';
        $ticket->save();

        // registrar la factura
        $factura = new Facturacion();
        $factura->ticket_id = $ticket->id;
        $factura->usuario_id = Auth::user()->id;

        // numero de factura
        $ultima_factura = DB::table('facturacions')->max('id');
        $siguiente_factura = $ultima_factura ? $ultima_factura + 1 : 1;
        $nro_factura = $siguiente_factura;


        $factura->nro_factura = $nro_factura;
        $factura->nombre_cliente = $ticket->cliente->nombres;
        $factura->nro_documento = $ticket->cliente->numero_documento;
        $factura->placa = $ticket->vehiculo->placa;
        $factura->detalle = "Servicio de estacionamiento de ".$tiempo_total;
        $factura->monto = $monto_total;
        $factura->save();

        return redirect()->route('admin.tickets.index')
            ->with('mensaje', 'Ticket facturado correctamente')
            ->with('icono', 'success')
            ->with('ticket_id', $ticket->id);

    }

    /**
     * Display the specified resource.
    //  */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect()->route('admin.tickets.index')
            ->with('mensaje', 'Ticket cancelado correctamente')
            ->with('icono', 'success');

    }
}
