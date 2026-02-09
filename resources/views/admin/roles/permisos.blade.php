@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><b>Permisos del rol:</b> {{ $role->name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Listado de rol</li>
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
                    <h3 class="card-title"><b>Permisos registrados del sistema</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/rol/' . $role->id . '/update_permisos') }}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($permisos as $modulo => $grupoPermisos )
                                <div class="col-md-3">
                                    <h4><b>{{ $modulo }}</b></h4>
                                    @foreach ($grupoPermisos as $permiso)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permisos[]"
                                                value="{{ $permiso->id }}"
                                                {{ $role->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $permiso->name }}
                                                </label>
                                        </div>
                                    @endforeach
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="{{ url('/admin/roles') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
                               <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button> 
                            </div>
                        </div>
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
