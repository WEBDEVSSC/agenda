@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Mis eventos</strong></h1>

    
@stop

@section('content')

<div class="card card-purple card-outline">
    <div class="card-body">
        <!-- Contenido del cuerpo de la tarjeta -->

        <form action="{{ route('eventoEvidenciaStore')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value="{{$id}}">

            <div class="row">
                <div class="col-md-12">
                    <p>Evidencia fotográfica</p>
                    <input type="file" name="evidencia" class="form-control">
                    @error('evidencia')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ----------------------- -->

            <div class="row mt-3">
                <div class="col-md-12">
                    <p>Descripción breve</p>
                    <textarea name="descripcion" id="descripcion" rows="5" class="form-control">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ----------------------- -->

            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-sm btn-block">REGISTRAR DATOS</button>
                </div>
            </div>

        </form>
        
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
