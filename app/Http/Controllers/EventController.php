<?php

namespace App\Http\Controllers;

use App\Mail\NuevoEvento;
use App\Models\Event;
use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\NuevoEventoMail;

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
            case '1': // Subdireccion de PRIMER nivel de atencion GRIS
                $event->color = '#4B4B4B'; 
                break;

            case '2': // Subdireccion de SEGUNDO nivel de atencion MORADO
                $event->color = '#6A0DAD'; 
                break;

            case '3': // Subdireccion de Enseñanza e Investigacion AZUL
                $event->color = '#457AB0'; 
                break;

            case '4': // Subdireccion de Calidad y Certificacion NARANJA
                $event->color = '#D35400'; 
                break;

            default: // SIN CATEGORIA
                $event->color = '#FFFFFF'; 
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

    
    /**
     * 
     * 
     *  METODO PARA REGISTRAR UN NUEVO EVENTO EN LA DB
     * 
     * 
     */
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

        // Enviamos el correo de alerta sobre el nuevo evento
        $destinatarios = ['cesartorres.1688@gmail.com'];
        Mail::to($destinatarios)->send(new NuevoEventoMail($evento));

        // Redireccionamos a la vista
        return redirect()->route('calendar')->with('success', 'El evento se registro correctamente');

    }

    public function eventShow($id)
    {
        $event = Event::findOrFail($id);

        // Consultamos todas las evidencias registradas
        $evidencias = Evidencia::where('relacion', $id)->orderBy('id', 'DESC')->get();

        return view('eventShow', compact('event','evidencias'));
    }

    public function misEventos()
    {
        // Consultamos todos los eventos del usuario que inicio sesion
        $categoria = Auth::user()->category;

        // Buscamos todos los registros que tengan ese valor en la categoria
        $eventos = Event::where('category',$categoria)->orderby('id','DESC')->get();

        // Retornamos la vista 'mis_eventos' pasando la variable $eventos
        return view('misEventos', compact('eventos'));

    }

    public function eventoEvidencia($id)
    {   
        // Consultamos los datos del evento
        $evento = Event::where('id',$id)->first();

       

        // Mostramos el formulario para subir evidencias y enlazamos el id
        return view('eventoEvidencia',compact('id','evento'));
    }

    public function eventoEvidenciaStore(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'id' => 'required',
            'evidencia' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'descripcion' => 'nullable|string|max:400',
        ],[
            'id.required' => 'El campo es requerido',
            'evidencia.required' => 'El campo es requerido',
            'evidencia.image' => 'El archivo debe ser una imagen',
            'evidencia.mimes' => 'La imagen debe estar en formato jpeg, png o jpg',
            'evidencia.max' => 'El tamaño máximo de la imagen es de 5 MB',
            'descripcion.max' => 'El tamaño máximo del texto es de 400 caracteres',
        ]);

        // Obtenemos la fecha y hora 
        $timestamp = now()->format('Ymd_His');

        // Generamos el nuevo nombre
        $nuevoNombre = $request->id."-".$timestamp.".".$request->file('evidencia')->getClientOriginalExtension();

        // Copiamos el archivo a la carpeta privada 
        $archivoPath = $request->evidencia->storeAs('evidencias', $nuevoNombre, 'local');

        // Generamos el registro
        $evidencia = new Evidencia();
        $evidencia->evidencia = $archivoPath;
        $evidencia->descripcion = $request->descripcion;
        $evidencia->relacion = $request->id;
        $evidencia->save();

        // Redirigimos con el mensaje de exito
        return redirect()->route('eventShow',['id' => $request->id])->with('success', 'Registro realizado correctamente.');

    }

    public function mostrarEvidencia($filename)
    {
        $path = "evidencias/{$filename}";
    
        // Verifica si el archivo existe en storage/app/evidencias
        if (Storage::disk('local')->exists($path)) {
            return response()->file(storage_path("app/{$path}"));
        }
    
        abort(404); // Si el archivo no existe, muestra un error 404
    }
}


