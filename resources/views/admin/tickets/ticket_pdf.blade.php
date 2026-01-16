<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            line-height: 1.2;
            width: 300px;
            max-width: 300px;
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
            background-color: #fff;
        }

        .container {
            border: 0px solid #000;
            margin: 0px;
            padding: 0px;
        }

        .header,
        .footer {}

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header" style="text-align: center">
            <b>{{ $ajuste->nombre }}</b><br>
            {{ $ajuste->descripcion }}<br>
            Sucursal: {{ $ajuste->sucursal }}<br>
            {{ $ajuste->direccion }}<br>
            Tel: {{ $ajuste->telefono }}<br>
        </div>

        <div class="line"></div>

        <!-- Título -->
        <h3 style="margin: 5px 0; font-size: 14px; text-align: center">TICKE: {{ $ticket->codigo_ticket }}</h3>

        <div class="line"></div>

        <!-- Datos del cliente -->
        <div style="text-align: left;">
            <strong>Datos del cliente</strong><br>
            <b>Señor(a):</b> {{ $ticket->cliente->nombres }}<br>
            <b>Documento:</b> {{ $ticket->cliente->numero_documento }}<br>
            <b>Placa del vehiculo:</b> {{ $ticket->vehiculo->placa }}<br>
        </div>

        <div class="line"></div>

        <!-- Datos del pago -->
        <div>
            <b>Espacio nro:</b> {{ $ticket->espacio->numero }} <br>
            <b>Fecha de ingreso:</b> {{ \Carbon\Carbon::parse($ticket->fecha_ingreso)->format('d/m/Y') }} <br>
            <b>Hora de ingreso:</b> {{ \Carbon\Carbon::parse($ticket->hora_ingreso)->format('H:i A') }} <br>
        </div>

        <div class="line"></div>

        <!-- Firmas -->
        <div class="footer">
            <small style="font-size: 6pt">
                <b>Usuario:</b> {{ $ticket->usuario->name }} <br>
                <b>Fecha de impresión:</b> {{ \Carbon\Carbon::parse($fecha_hora)->format('d/m/Y - h:i:s A') }}
            </small>
        </div>
    </div>
</body>

</html>
