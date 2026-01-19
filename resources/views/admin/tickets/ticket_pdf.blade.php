<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    {{-- <style>
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
    </style> --}}
    <style>
        /* Estilos para centrar el ticket en la pantalla */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Color de fondo externo */
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: flex-start; /* Alineado al inicio superior */
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            line-height: 1.2;
            width: 300px;
            background-color: #fff; /* Color del ticket */
            padding: 15px; /* Margen interno del ticket */
            box-sizing: border-box;
            box-shadow: 0 0 5px rgba(0,0,0,0.1); /* Sombra opcional para verlo mejor */
        }

        .container {
            width: 100%;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        /* Estilo para asegurar que el texto se mantenga centrado donde debe */
        .text-center {
            text-align: center;
        }

        /* Configuración para impresión */
        @media print {
            html, body {
                background-color: #fff;
                display: block;
            }
            body {
                box-shadow: none;
                width: 100%;
                padding: 0;
            }
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
                <b>Cajero/a:</b> {{ $ticket->usuario->name }} <br>
                <b>Fecha de impresión:</b> {{ \Carbon\Carbon::parse($fecha_hora)->format('d/m/Y') }} <br>
                <b>Hora de impresión:</b> {{ \Carbon\Carbon::parse($fecha_hora)->format('h:i:s A') }} <br>
                <br>
                <div class="text-center"><b>¡Gracias por su preferencia!</b></div>
            </small>
        </div>
    </div>
</body>

</html>
