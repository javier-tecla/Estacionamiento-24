@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Seguimiento del estacionamiento</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Ticket</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Espacios registrados</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($espacios as $espacio)
                            <div class="col text-center">
                                <h5>ESP-{{ $espacio->numero }}</h5>

                                @if ($espacio->estado == 'libre')
                                    <button class="btn btn-success btn-ticket" data-espacio-id="{{ $espacio->id }}"
                                        style="width: 100%;height:120px">
                                        LIBRE
                                    </button>
                                @endif

                                @if ($espacio->estado == 'mantenimiento')
                                    <button class="btn btn-warning btn-mantenimiento" style="width: 100%;height:120px">
                                        <small>Mantenimiento</small>
                                    </button>
                                @endif

                                @if ($espacio->estado == 'ocupado')
                                    <button class="btn btn-danger btn-ocupado" style="width: 100%;height:120px">
                                        <img src="{{ asset('storage/logos/' . $ajuste->logo_auto) }}" alt="logo_auto"
                                            style="max-width: 80px; margin-top: 2px;">
                                    </button>
                                @endif

                                <br><br>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    <!-- Modal para el ticket -->
    <div class="modal fade" id="modal_ticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card card-outline card-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Generar ticket
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


    <!-- Modal en mantenimiento -->
    <div class="modal fade" id="modal_mantenimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card card-outline card-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Estado del estacionamiento
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p style="text-align: center">El estado de este espacio esta en mantenimiento</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal en ocupado -->
    <div class="modal fade" id="modal_ocupado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card card-outline card-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar ticket
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p style="text-align: center">El estado de este espacio esta ocupado</p>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $('.btn-ticket').on('click', function() {
            var espacio_id = $(this).data('espacio-id');
            $('#modal_ticket').modal('show');
        });

        $('.btn-mantenimiento').on('click', function() {
            $('#modal_mantenimiento').modal('show');
        });

        $('.btn-ocupado').on('click', function() {
            $('#modal_ocupado').modal('show');
        });
    </script>
@stop
