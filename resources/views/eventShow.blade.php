@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>ID: {{ $event->id; }}</p>
    <p>Evento: {{ $event->title; }}</p>
    <p>Sede: {{ $event->location; }}</p>
    <p>Programa que organiza: {{ $event->organize; }}</p>
    <p>Descripcion: {{ $event->description; }}</p>
    <p>Fecha: {{ $event->start; }} - {{ $event->end }}</p>
    <p>Participación autoridades SS: {{ $event->authority_ss; }}</p>
    <p>Participación autoridades externas: {{ $event->authority_ext; }}</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop