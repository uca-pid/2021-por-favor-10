<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RecursoEjercicio extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'nombre',
        'id_ejercicios',
        'objetivo',
        'real',
        'ocupacion'
    ];

    public $timestamps = false;
}
