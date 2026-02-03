<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 10px;
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
        <h3 style="margin: 5px 0; font-size: 14px; text-align: center">FACTURA: {{ $factura->nro_factura }}</h3>

        <div class="line"></div>

        <!-- Datos del cliente -->
        <div style="text-align: left;">
            <strong>DATOS DEL CLIENTE</strong><br>
            <b>Señor(a):</b> {{ $factura->nombre_cliente }}<br>
            <b>Documento:</b> {{ $factura->nro_documento }}<br>
            <b>Placa del vehiculo:</b> {{ $factura->placa }}<br>
        </div>

        <div class="line"></div>

        <!-- Datos del pago -->
        <div>
             <strong>DATOS DEL SERVICIO</strong><br>
            <b>Espacio nro:</b> {{ $factura->ticket->espacio->numero }} <br>
            <b>Fecha de ingreso:</b> {{ \Carbon\Carbon::parse($factura->fecha_ingreso)->format('d/m/Y') }} <br>
            <b>Hora de ingreso:</b> {{ \Carbon\Carbon::parse($factura->hora_ingreso)->format('H:i A') }} <br>
            <b>Fecha de salida:</b> {{ \Carbon\Carbon::parse($factura->fecha_salida)->format('d/m/Y') }} <br>
            <b>Hora de salida:</b> {{ \Carbon\Carbon::parse($factura->hora_salida)->format('H:i A') }} <br>

        </div>

        <div class="line"></div>

        <!-- Datos dem la tarifa -->
        <div>
             <strong>DATOS DE LA TARIFA</strong><br>
            <b>Nombre: </b> {{ $factura->ticket->tarifa->nombre}} <br>
            <b>Tipo: </b> {{ $factura->ticket->tarifa->tipo}} <br>
        </div>

        <div class="line"></div>

        <div>
            <table>
                <thead>
                    <th style="width: 150px">Detalle</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $factura->detalle }}</td>
                        <td style="text-align: center">1</td>
                        <td>{{ $ajuste->divisa." ".$factura->monto }}</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right"><b>Monto Total: {{ $ajuste->divisa." ".$factura->monto }}</b></p>
        </div>

         <div class="line"></div>

        <p style="text-align: center">
            <img src="{{ $barcodePNG }}" style="width: 100px; height: 100px; display: block; margin: 0 auto;" alt="">
        </p>

        <div class="line"></div>

        <!-- Firmas -->
        <div class="footer">
            <small style="font-size: 6pt">
                <b>Cajero/a:</b> {{ $factura->usuario->name }} <br>
                <b>Fecha de impresión:</b> {{ \Carbon\Carbon::parse($fecha_hora)->format('d/m/Y') }} <br>
                <b>Hora de impresión:</b> {{ \Carbon\Carbon::parse($fecha_hora)->format('h:i:s A') }} <br>
                <br>
                <div class="text-center"><b>¡Gracias por su preferencia!</b></div>
            </small>
        </div>
    </div>
</body>

</html>
