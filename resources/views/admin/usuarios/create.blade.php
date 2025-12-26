@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Registro de un nuevo usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('/admin/usuarios') }}">Listado de usuarios</a></li>
                    <li class="breadcrumb-item active">Registro de usuario</li>
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
                    <h3 class="card-title"><b>Llene los campos del formulario</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/usuarios/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Roles <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" class="form-control" id="">
                                            <option value="" disabled selected>Seleccione un rol</option>
                                            @foreach ($roles as $role)
                                                @if (!($role->name == 'SUPER ADMIN'))
                                                    <option value="{{ $role->name }}"
                                                        {{ old('rol') == $role->name ? 'selected' : '' }}>
                                                        {{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('rol')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres"
                                            value="{{ old('nombres') }}" placeholder="Nombres" required>
                                    </div>

                                    @error('nombres')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{ old('apellidos') }}" placeholder="Apellidos" required>
                                    </div>

                                    @error('apellidos')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="email" required>
                                    </div>

                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tipo de Documento <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                                            <option value="" disabled selected>Seleccione...</option>
                                            <option value="DNI">{{ old('tipo_documento') == 'DNI' ? 'selected' : '' }}
                                                DNI</option>
                                            <option value="Carnet de Extranjería">
                                                {{ old('tipo_documento') == 'Carnet de Extranjería' ? 'selected' : '' }}
                                                Carnet de Extranjería</option>
                                            <option value="Pasaporte">
                                                {{ old('tipo_documento') == 'Pasaporte' ? 'selected' : '' }} Pasaporte
                                            </option>
                                            <option value="CI">{{ old('tipo_documento') == 'CI' ? 'selected' : '' }} CI
                                            </option>
                                        </select>
                                    </div>
                                    @error('tipo_documento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_documento">Número de Documento <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="numero_documento"
                                            id="numero_documento" value="{{ old('numero_documento') }}"
                                            placeholder="Número de Documento" required>
                                    </div>
                                    @error('numero_documento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="celular">Celular <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="celular" id="celular"
                                            value="{{ old('celular') }}" placeholder="Celular" required>
                                    </div>
                                    @error('celular')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                            id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                            placeholder="dd/mm/aaaa" required>
                                    </div>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Género <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select class="form-control" name="genero" id="genero" required>
                                            <option value="" disabled selected>Seleccione...</option>
                                            <option value="Masculino"
                                                {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>
                                                Femenino</option>
                                            <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro
                                            </option>
                                        </select>
                                    </div>
                                    @error('genero')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="direccion">Dirección <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{ old('direccion') }}" placeholder="Dirección" required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Contactos de emergencia</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_nombre">Nombre del Contacto de Emergencia <sup
                                        class="text-danger">(*)</sup></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_nombre"
                                        id="contacto_nombre" value="{{ old('contacto_nombre') }}"
                                        placeholder="Nombre del Contacto" required>
                                </div>
                                @error('contacto_nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_telefono">Teléfono del Contacto de Emergencia <sup
                                        class="text-danger">(*)</sup></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_telefono"
                                        id="contacto_telefono" value="{{ old('contacto_telefono') }}"
                                        placeholder="Teléfono del Contacto" required>
                                </div>
                                @error('contacto_telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_parentesco">Parentesco del Contacto de Emergencia <sup
                                        class="text-danger">(*)</sup></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_parentesco"
                                        id="contacto_parentesco" value="{{ old('contacto_parentesco') }}"
                                        placeholder="Parentesco del Contacto" required>
                                </div>
                                @error('contacto_parentesco')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12 mb-4 d-flex justify-content-between">
            <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                Regresar</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                Guardar</button>
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
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
