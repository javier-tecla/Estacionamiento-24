<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de ingresos diarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            font-size: 25px;
            margin: 0;
            padding: 0;
        }

        .header p {
            color: #777;
            margin: 5px 0 0;
        }

        .report-info {
            background-color: #f4f4f4;
            padding: 10px;
            border-left: 4px solid #17a2b8;
            margin-bottom: 20px;
        }

        .report-info strong {
            width: 100%;
            border-coññapse: collapse;
            margin-bottom: 20px;
        }

        .summary-cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            gap: 15px;
        }

        .summary-card {
            flex: 1;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .summary-card h3 {
            margin: 0 0 8px 0;
            color: #495057;
            font-size: 14px;
            font-weight: normal;
        }

        .summary-card .amount {
            font-size: 18px;
            font-weight: bold;
            color: #dc3545;
            margin: 0;
        }

        .summary-card.total {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .summary-card.total .amount {
            color: #28a745;
        }

        .summary-card.average {
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        .summary-card.average .amount {
            color: #17a2b8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 200px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .total-row {
            font-weight: bold;
            background-color: #e9ecef;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 10px;
            color: #aaa;
        }
    </style>
</head>

<body>
    @php
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];
    @endphp
    <div class="container">
        <div class="header">
            <h1>Reporte de facturaciones de ingresos diarios del mes de {{ $meses[$mes] }}</h1>
            <p>Generado el: {{ now()->format('d/m/Y') . ' ' . now()->format('H:i:s A') }}</p>
        </div>

        <div class="report-info">

            <p><b>Periodo del reporte:</b> {{ $meses[$mes] }} </p>
        </div>

        <div class="summary-cards">
            <div class="summary-card">
                <h3>Ingreso total del mes</h3>
                <p class="amount">{{ $ajuste->divisa." ".number_format($total_mes, 2) }}</p>
            </div>
            <div class="summary-card total">
                <h3>Promedio diario</h3>
                <p class="amount">{{ $ajuste->divisa." ".number_format($promedio_diario, 2) }}</p>
            </div>
            <div class="summary-card average">
                <h3>Mejor día</h3>
                @php
                    $mejor_dia = $ingresos_diarios->sortByDesc('total_dia')->first();
                @endphp
                <p class="amount">{{ $ajuste->divisa." ".number_format($mejor_dia->total_dia ?? 0, 2) }}</p>
            </div>
        </div>

        @if ($ingresos_diarios->isEmpty())
            <p style="text-align: center">No hay facturaciones en el periodo seleccionado, no se encontraron facturas en
                el rango de fechas.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Día</th>
                        <th>Fecha</th>
                        <th>Servicios</th>
                        <th>Ingresos</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $mejor_ingreso = $ingresos_diarios->max('total_dia');
                        $peor_ingreso = $ingresos_diarios->min('total_dia');
                    @endphp
                    @foreach ($ingresos_diarios as $ingreso)
                        @php
                            $fecha = \Carbon\Carbon::parse($ingreso->fecha);
                            $fecha_dia = $fecha->locale('es')->isoFormat('dddd');
                        @endphp
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $fecha_dia }}</td>
                            <td>{{ $fecha->format('d/m/Y') }}</td>
                            <td style="text-align: center">{{ $ingreso->cantidad_servicios }}</td>
                            <td>{{ $ajuste->divisa . ' ' . $ingreso->total_dia }}</td>

                            <td>
                                @if ($ingreso->total_dia == $mejor_ingreso)
                                    <span style="color: green; font-weight: bold;">Mejor ingreso</span>
                                @elseif ($ingreso->total_dia == $peor_ingreso)
                                    <span style="color: red; font-weight: bold;">Peor ingreso</span>
                                @else
                                    <span>Normal</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="4" style="text-align: right;">Total ingresado</td>
                        <td colspan="2">{{ $ajuste->divisa . ' ' . $total_mes }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <div class="footer">
            <p>Reporte generado por el {{ $ajuste->nombre }} - Copyright &copy; {{ date('Y') }} - Impreso por:
                {{ $usuario->name }}</p>
        </div>
    </div>
</body>

</html>
