@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Calendario</strong></h1>
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

<!-- Incluye los estilos de FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">

<!-- Incluye los scripts de FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>

<!-- Incluye jQuery (requerido para ciertas versiones) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye el archivo de idioma en español -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales/es.js"></script>

<style>
    #calendar {
        width: 100%;
        max-width: 100%;
        height: 850px;
    }
</style>

<div class="card card-purple card-outline">
    <div class="card-body">

<div id="calendar"></div>

    </div>
</div>

<!-- Modal para mostrar detalles del evento -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Detalles del Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Título:</strong> <span id="modal-title"></span></p>
                <p><strong>Inicio:</strong> <span id="modal-start"></span></p>
                <p><strong>Fin:</strong> <span id="modal-end"></span></p>
                <p><strong>Sede:</strong> <span id="modal-location"></span></p>
                <p><strong>Categoría:</strong> <span id="modal-category"></span></p>
                <a id="modal-details-link" href="#" class="btn btn-dark">Ver detalles</a> <!-- Enlace al detalle -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es', // Configuración para el idioma español
            initialView: 'timeGridWeek', // Vista semanal
            slotMinTime: '07:00:00', // Hora mínima: 7:00 AM
            slotMaxTime: '21:00:00', // Hora máxima: 8:00 PM
            events: '{{ url('/events') }}', // URL para obtener los eventos desde el controlador
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay' // Opciones de visualización
            },
            allDaySlot: false, // Ocultar la sección de "Todo el día"
            eventTimeFormat: { // Configuración del formato de tiempo en 12 horas
        hour: 'numeric',   
        meridiem: 'short', 
        hour12: true       
    },
    slotLabelFormat: { // Configuración para las etiquetas de las horas en formato de 12 horas
        hour: 'numeric',
        minute: '2-digit',
        meridiem: 'short',
        hour12: true
    },
    allDayText: 'Todo el día', // Texto para el evento "Todo el día"
            eventClick: function(info) {
                // Evita la redirección si hay un enlace en el evento
                info.jsEvent.preventDefault();

                // Llenar los datos del modal con la información del evento
                $('#modal-title').text(info.event.title);
                $('#modal-start').text(info.event.start.toLocaleString());
                $('#modal-end').text(info.event.end ? info.event.end.toLocaleString() : 'No definido');
                $('#modal-location').text(info.event.extendedProps.location);
                $('#modal-category').text(info.event.extendedProps.category_label);

                // Agregar el enlace de "Ver detalles" con el ID del evento
                const eventId = info.event.id;
                $('#modal-details-link').attr('href', `/events/${eventId}`);

                // Mostrar el modal
                $('#eventModal').modal('show');
            }

        });

        calendar.render();
    });
</script>

@stop

@section('footer')
<p>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong> <small>Unidad de Planeación (Departamento de Tecnologías de la Información)</small></p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
