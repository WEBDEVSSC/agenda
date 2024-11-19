@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Mis eventos</strong></h1>
@stop

@section('content')

<div class="card card-purple card-outline">
    <div class="card-body">
        <!-- Contenido del cuerpo de la tarjeta -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="15%">Nombre</th>
                    <th width="10%">Fecha y Hora</th>
                    <th width="15%">Sitio</th>
                    <th width="10%">Organiza</th>
                    <th width="40%">Descripción</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($evento->start)->format('d-m-Y H:i') }} <br> {{ \Carbon\Carbon::parse($evento->end)->format('d-m-Y H:i') }}</td>
                        <td>{{ $evento->location }}</td>
                        <td>{{ $evento->organize }}</td>
                        <td>{{ $evento->description }}</td>
                        <td>

                        <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('eventShow', $evento->id) }}">Detalles</a>
                                    <a class="dropdown-item" href="{{ route('eventoEvidencia', $evento->id) }}">Evidencia</a>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
