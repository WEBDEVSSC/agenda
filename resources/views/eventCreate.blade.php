@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Calendario de Eventos</h1>
@stop

@section('content')

<form action="{{ route('eventStore') }}" method="POST">

    @csrf

    <div class="row">
        <div class="col-md-6">

                <div class="form-group">
                    <label for="nombre_evento">Evento:</label>
                    <input type="text" id="nombre_evento" name="nombre_evento" class="form-control" value="{{ old('nombre_evento') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('nombre_evento')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">
            
                <div class="form-group">
                    <label for="sede">Sede:</label>
                    <input type="text" id="sede" name="sede" class="form-control" value="{{ old('sede') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('sede')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------- -->

    <div class="row">

        <div class="col-md-3">
            
                <div class="form-group">
                    <label for="inicio">Inicio:</label>
                    <input type="datetime-local" id="inicio" name="inicio" class="form-control" value="{{ old('inicio') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('inicio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-md-3">
            
                <div class="form-group">
                    <label for="final">Final:</label>
                    <input type="datetime-local" id="final" name="final" class="form-control" value="{{ old('final') }}">
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('final')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">
                
                <div class="form-group">
                    <label for="programa_organiza">Programa que organiza:</label>
                    <input type="text" name="programa_organiza" class="form-control" value="{{ old('programa_organiza') }}">
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('programa_organiza')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>

    <!-- -------------------------------------------------------------------- -->
     <div class="row">
        <div class="col-md-12">
                
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{ old('descripcion') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('descripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
     </div>

     <!-- ------------------------------------------------------------------ -->

     <div class="row">
        <div class="col-md-12">
                
                <div class="form-group">
                    <label for="participacion_autoridades_ss">Participación de autoridades SSC:</label>
                    <textarea name="participacion_autoridades_ss" id="participacion_autoridades_ss" class="form-control" rows="5">{{ old('descripcion') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('participacion_autoridades_ss')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
     </div>

     <!-- ------------------------------------------------------------------ -->

     <div class="row">
        <div class="col-md-12">
                
                <div class="form-group">
                    <label for="participacion_autoridades_ext">Participación de autoridades ext:</label>
                    <textarea name="participacion_autoridades_ext" id="participacion_autoridades_ext" class="form-control" rows="5">{{ old('descripcion') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('participacion_autoridades_ext')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
     </div>

     <!-- ------------------------------------------------------------------ -->

     <button type="submit" class="btn btn-dark">Registrar evento</button>
</form>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
