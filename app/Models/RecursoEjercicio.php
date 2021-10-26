<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoEjercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_ejercicios',
        'objetivo',
        'real',
        'ocupacion'
    ];

    public $timestamps = false;
}
