<x-mail::message>

<h1>Nuevo evento registrado</h1>

<p>Se ha registrado un nuevo evento en la plataforma Agenda SSC</p>

<x-mail::panel>
<p><strong>Nombre del evento</strong> : {{$evento->title}}</p>
<p>Area que organiza</p>
<p>Subdirección</p>
</x-mail::panel>

</x-mail::message>