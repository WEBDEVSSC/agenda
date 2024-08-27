<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Define la tabla si no sigue la convención de nombres
    protected $table = 'events';

    // Define los campos que se pueden asignar masivamente
    protected $fillable = ['title', 'start', 'end','category','category_label','location'];

    // Opcional: define los campos que deben ser tratados como fechas
    protected $dates = ['start', 'end'];
}
