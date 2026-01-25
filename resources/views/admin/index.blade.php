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

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <a href="{{ url('/admin/roles') }}">
                            <img src="{{ url('/images/user.gif') }}" width="100%" alt="">
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
                        <a href="{{ url('/admin/roles') }}">
                            <img src="{{ url('/images/user.gif') }}" width="100%" alt="">
                        </a>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios registrados</span>
                        <span class="info-box-number">{{ $total_usuarios }} usuarios</span>
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
