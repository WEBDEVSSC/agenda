<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
         // Seleccionamos los campos necesarios, incluyendo la categoría
    $events = Event::all();

    // Mapear los eventos para asignar un color basado en la categoría
    $events = $events->map(function ($event) {
        // Asigna un color dependiendo de la categoría
        switch ($event->category) {
            case '1':
                $event->color = '#9F71CC'; // Rojo para reuniones
                break;
            case '2':
                $event->color = '#06B295'; // Verde para conferencias
                break;
            case '3':
                $event->color = '#FA177A'; // Azul para talleres
                break;
            default:
                $event->color = '#7a4ba5'; // Negro para cualquier otra categoría
                break;
        }

        return $event;
    });

    return response()->json($events);
    }

    /**
     * 
     * 
     *  METODO PARA MOSTRAR EL FORMULARIO DE REGISTRO PARA UN NUEVO EVENTO
     * 
     * 
     */
    public function eventCreate() {
        return view('eventCreate');
    }

    public function eventStore(Request $request) {
        
        // Cargamos los datos del usuario

        $subsecretaria = Auth::user()->subsecretaria;
        $subsecretaria_label = Auth::user()->subsecretaria_label;

        // Validamos los datos del formulario

        $request -> validate([
            'nombre_evento' => 'required | string',
            'sede' => 'required | string',
            'inicio' => 'required | date_format:Y-m-d\TH:i',
            'final' => 'required | date_format:Y-m-d\TH:i',
            'programa_organiza' => 'required | string',
            'descripcion' => 'required | string',
            'participacion_autoridades_ss' => 'required | string',
            'participacion_autoridades_ext' =>'required | string',
        ]);

        $evento = new Event();
        $evento->title = $request->nombre_evento;
        $evento->start = $request->inicio;
        $evento->end = $request->final;
        $evento->category = $subsecretaria;
        $evento->category_label = $subsecretaria_label;
        $evento->location = $request->sede;
        $evento->description = $request->descripcion;
        $evento->organize = $request->programa_organiza;
        $evento->authority_ss = $request->participacion_autoridades_ss;
        $evento->authority_ext = $request->participacion_autoridades_ext;

        $evento->save();

        return redirect()->route('calendar')->with('success', 'El evento se registro correctamente');

    }

    public function eventShow($id)
    {
        $event = Event::findOrFail($id);
        return view('eventShow', compact('event'));
    }

}


