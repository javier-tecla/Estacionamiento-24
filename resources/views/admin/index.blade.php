@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><b>Bienvenido: </b>{{ Auth::user()->name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=""><b>Rol:
                                {{ Auth::user()->roles->pluck('name')->implode(',') }}</b></a> </li>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <hr>

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/roles') }}">
                                    <img src="{{ url('/images/role.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Roles registrados</span>
                                <span class="info-box-number">{{ $total_roles }} roles</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/usuarios') }}">
                                    <img src="{{ url('/images/usuario.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Usuarios registrados</span>
                                <span class="info-box-number">{{ $total_usuarios }} usuarios</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/espacios') }}">
                                    <img src="{{ url('/images/aparcamiento.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content text-sm"">
                                <span class="info-box-text">{{ $total_espacios }} Espacios registrados</span>
                                <span class="info-box-number">{{ $total_espacios_libres }} libres |
                                    {{ $total_espacios_ocupados }} ocupados | {{ $total_espacios_mantenimiento }} en
                                    mantenimiento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/tarifas') }}">
                                    <img src="{{ url('/images/tarifas.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tarifas</span>
                                <span class="info-box-number">{{ $total_tarifas }} tarifas</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/clientes') }}">
                                    <img src="{{ url('/images/cliente.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Clientes registrados</span>
                                <span class="info-box-number">{{ $total_clientes }} clientes</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/vehiculos') }}">
                                    <img src="{{ url('/images/coche.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Vehículos registrados</span>
                                <span class="info-box-number">{{ $total_vehiculos }} Vehículos</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/tickets') }}">
                                    <img src="{{ url('/images/boleto.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tickets activos</span>
                                <span class="info-box-number">{{ $total_tickets_activos }} Tickets</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_hoy }}</h4>

                                <p>Ingresos de hoy</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-money-bill-wave" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_ayer }}</h4>

                                <p>Ingresos de ayer</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-money-bill-wave" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_esta_semana }}</h4>

                                <p>Ingresos actual semana</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-calendar-day" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_semana_anterior }}</h4>

                                <p>Ingresos semana anterior</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-calendar-week" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_este_mes }}</h4>

                                <p>Ingresos mes actual</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-chart-line" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_mes_anterior }}</h4>

                                <p>Ingresos mes anterior</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-chart-bar" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-6">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>{{ $ajuste->divisa . ' ' . $ingreso_total }}</h4>

                                <p>Ingresos total en el sistema</p>
                            </div>
                            <div class="icon ">
                                <i class="fas fa-money-bill" style="font-size: 40px;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>a</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <canvas id="ingresosMensuales"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>a</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <h1 id="reloj-hora" class="text-center font-weight-bold"></h1>
                <h5 id="reloj-fecha" class="text-center"></h5>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Calendario</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @stop

    @section('css')
        <style>
            .zoomP {
                transition: transform 0.3s ease;
                /* Transición suave para el efecto de zoom */
                border: 1px solid #c0c0c0;
                box-shadow: #c0c0c0 0px 5px 5px 0px;
            }

            .zoomP:hover {
                transform: scale(1.05);
                /* Escala el elemento al 105% de su tamaño original al pasar el mouser */
            }
        </style>
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')

    <script>
        const ingresosData = ['10','1','5','6','4','2','9',];
        const ctx1 = document.getElementById('ingresosMensuales').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Ingresos ($)',
                    data: ingresosData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    bordrColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const calendar = new VanillaCalendar('#calendar', {
                    type: 'default',
                    settings: {

                        lang: 'es',
                        visibility: {
                            theme: 'light'
                        }
                    },
                    locale: {
                        months: [
                            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        weekday: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
                    },
                    actions: {
                        clickDay(event, self) {
                            console.log('Fecha seleccionada:', self.selectedDates[0]);
                        }
                    }
                });

                calendar.HTMLElement.style.width = '100%';
                calendar.HTMLElement.style.maxWidth = '100%';

                calendar.init();
            });
        </script>

        <script>
            function actualizarReloj() {
                const d = new Date();
                const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ];

                const diaSemana = dias[d.getDay()];
                const dia = d.getDate();
                const mes = meses[d.getMonth()];
                const anio = d.getFullYear();

                let h = d.getHours();
                let m = d.getMinutes();
                let s = d.getSeconds();

                // Convertir a formato de 12 horas y determinar AM/PM
                let meridiano = h >= 12 ? 'PM' : 'AM';
                h = h % 12;
                h = h ? h : 12; // La hora '0' debe ser '12'

                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;

                document.getElementById('reloj-fecha').innerHTML = `${diaSemana}, ${dia} de ${mes} de ${anio}`;
                document.getElementById('reloj-hora').innerHTML = `${h}:${m}:${s} ${meridiano}`;
            }

            setInterval(actualizarReloj, 1000);
            actualizarReloj();
        </script>
    @stop
