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
                        <div class="info-box">
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
                        <div class="info-box">
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

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/espacios') }}">
                                    <img src="{{ url('/images/aparcamiento.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Espacios registrados</span>
                                <span class="info-box-number">{{ $total_espacios }} espacios</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
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
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
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
    @stop
