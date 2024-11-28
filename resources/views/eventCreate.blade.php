@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Nuevo registro</strong></h1>
@stop

@section('content')

<div class="card card-purple card-outline">
    <div class="card-body">

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
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="10">{{ old('descripcion') }}</textarea>
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
                    <textarea name="participacion_autoridades_ss" id="participacion_autoridades_ss" class="form-control" rows="10">{{ old('descripcion') }}</textarea>
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
                    <textarea name="participacion_autoridades_ext" id="participacion_autoridades_ext" class="form-control" rows="10">{{ old('descripcion') }}</textarea>
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

    </div>

</div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#descripcion').summernote();
            $('#participacion_autoridades_ss').summernote();
            $('#participacion_autoridades_ext').summernote();
        });
    </script>

<script>
    $(document).ready(function() {
        // Inicialización básica de Summernote para los campos
        $('#descripcion').summernote({
            height: 200, // Altura del editor
            lang: 'es-ES', // Idioma español
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#participacion_autoridades_ss').summernote({
            height: 150, // Puedes usar diferentes configuraciones para cada editor
            lang: 'es-ES'
        });

        $('#participacion_autoridades_ext').summernote({
            height: 150,
            lang: 'es-ES'
        });
    });
</script>
@stop
