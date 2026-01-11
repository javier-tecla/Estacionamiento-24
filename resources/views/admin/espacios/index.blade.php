@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de espacios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Listado de espacios</li>
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
                    <div class="card-tools">
                        <a href="{{ url('/admin/espacios/create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-plus"></i> Crear nuevo</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($espacios as $espacio)
                            <div class="col text-center">
                                <h2>{{ $espacio->numero }}</h2>
                                <button @if ($espacio->estado == 'libre') class="btn btn-success" @endif
                                    @if ($espacio->estado == 'mantenimiento') class="btn btn-warning" @endif
                                    @if ($espacio->estado == 'ocupado') class="btn btn-danger" @endif data-toggle="modal"
                                    data-target="#modal_cambiar_estado{{ $espacio->id }}">
                                    <img
                                        src="{{ asset('storage/logos/' . $ajuste->logo_auto) }}"style="max-width: 100px; margin-top: 10px;">
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_cambiar_estado{{ $espacio->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- El FORM abre aquí para abarcar el footer donde está el botón -->
                                            <form action="{{ url('/admin/espacio/' . $espacio->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header card card-outline card-primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar el estado del espacio
                                                        {{ $espacio->numero }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12"> <!-- Corregido: col-md-12 -->
                                                            <label for="estado">Estado <sup
                                                                    class="text-danger">(*)</sup></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-check-circle"></i></span>
                                                                </div>
                                                                <select class="form-control" name="estado" id="estado"
                                                                    required>
                                                                    <option value="" disabled>Seleccione un estado
                                                                    </option>
                                                                    <!-- Usamos el valor actual del objeto si no hay 'old' -->
                                                                    <option value="libre"
                                                                        {{ old('estado', $espacio->estado) == 'libre' ? 'selected' : '' }}>
                                                                        Libre</option>
                                                                    <option value="ocupado"
                                                                        {{ old('estado', $espacio->estado) == 'ocupado' ? 'selected' : '' }}>
                                                                        Ocupado</option>
                                                                    <option value="mantenimiento"
                                                                        {{ old('estado', $espacio->estado) == 'mantenimiento' ? 'selected' : '' }}>
                                                                        Mantenimiento</option>
                                                                </select>
                                                            </div>
                                                            @error('estado')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form> <!-- El FORM cierra aquí -->
                                        </div>
                                    </div>
                                </div>

                                <h5>{{ $espacio->estado }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
