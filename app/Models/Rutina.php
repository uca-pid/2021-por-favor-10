<?php

namespace App\Models;

use App\Models\Ejercicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rutina extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'nombre',
        'ejercicios'
    ];

    // public function ejercicios()
    // {
    //     return $this->belongsToMany('App\Models\Ejercicio');
    // }
}
