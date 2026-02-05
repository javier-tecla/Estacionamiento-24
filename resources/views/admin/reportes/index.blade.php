@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Centro de reportes del sistema</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Centro de reportes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-calendar-day"></i> Reporte semanal</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/reporte/semanal') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha inicio</label>
                                    <input type="date" name="fecha_inicio" class="form-control"
                                        value="{{ \Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha Fin</label>
                                    <input type="date" name="fecha_fin" class="form-control"
                                        value="{{ \Carbon\Carbon::now()->endOfWeek()->format('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-day"></i> Generar
                            reporte</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-calendar-week"></i> Reporte mensual</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/reporte/mensual') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Año</label>
                                    <select name="year" id="year" class="form-control" required>
                                        @for ($i = 2020; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == date('Y')) selected @endif>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mes</label>
                                    <select name="mes" id="mes" class="form-control" required>
                                        @php
                                            $currentMonth = date('n');
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
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == $currentMonth) selected @endif>
                                                {{ $meses[$i] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-week"></i> Generar
                            reporte</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-dollar-sign"></i> Ingresos diarios</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/reporte/ingresos_diarios') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Año</label>
                                    <select name="year" id="year" class="form-control" required>
                                        @for ($i = 2020; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == date('Y')) selected @endif>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mes</label>
                                    <select name="mes" id="mes" class="form-control" required>
                                        @php
                                            $currentMonth = date('n');
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
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == $currentMonth) selected @endif>
                                                {{ $meses[$i] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-dollar-sign"></i> Generar
                            reporte</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
@extends('adminlte::master')
