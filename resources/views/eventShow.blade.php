@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Mis eventos </strong>Detalles</h1>
@stop

@section('content')

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Éxito',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        });
    </script>
@endif

<div class="card card-purple card-outline">
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <p><strong>Nombre</strong></p>
                <p>{{ $event->title; }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Sede</strong></p>
                <p>{{ $event->location; }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Fecha y hora</strong></p>
                <p>{{ \Carbon\Carbon::parse($event->start)->format('d-m-Y H:i') }} / {{ \Carbon\Carbon::parse($event->end)->format('d-m-Y H:i') }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Programa que organiza</strong></p>
                <p>{{ $event->organize; }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Descripción</strong></p>
                <p>{{ $event->description; }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Participación de autoridades SSC</strong></p>
                <p>{{ $event->authority_ss; }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Participación de autoridades externas</strong></p>
                <p>{{ $event->authority_ext; }}</p>
            </div>
        </div>

    </div>
</div>

<div class="card card-purple card-outline">
    <div class="card-body">

        <p><strong>Evidencias fotográficas</strong> | <small>Click sobre la imágen para más detalles</small></p>

        <table class="table table-border">
            <thead>
                <tr>
                    <th>Imágen</th>
                    <th>Descripción</th>
                    <th>Fecha registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evidencias as $evidencia)
                    <tr>
                        <td>
                            <a href="{{ route('evidencia.mostrar', ['filename' => basename($evidencia->evidencia)]) }}" data-lightbox="evidencia" data-title="{{ $evidencia->descripcion }}">
                                <img src="{{ route('evidencia.mostrar', ['filename' => basename($evidencia->evidencia)]) }}" width="100"/>
                            </a>
                        </td>
                        <td>{{ $evidencia->descripcion }}</td>
                        <td>{{ $evidencia->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop

@section('css')
    {{-- Agrega los estilos de Lightbox2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@stop

@section('js')
    {{-- Agrega el script de Lightbox2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
