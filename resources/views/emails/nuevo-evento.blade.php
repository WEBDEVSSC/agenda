<x-mail::message>

<h1>Nuevo evento registrado</h1>

<p>Se ha registrado un nuevo evento en la plataforma Agenda SSC</p>

<x-mail::panel>
<p><strong>Nombre del evento</strong> : {{$evento->title}}</p>
<p><strong>Sede</strong> : {{$evento->location}}</p>
<p><strong>Area que organiza</strong> : {{$evento->organize}}</p>
<p><strong>Subdirección</strong> : {{$evento->category_label}}</p>
<p><strong>Fecha</strong> : {{$evento->start}} - {{ $evento->end }}</p>
</x-mail::panel>

</x-mail::message>