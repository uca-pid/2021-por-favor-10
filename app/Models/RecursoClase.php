<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RecursoClase extends Model
{
    use HasFactory,Notifiable;
    
    protected $fillable = [
        'nombre',
        'id_clases',
        'objetivo',
        'real',
        'ocupacion'
    ];

    public $timestamps = false;
}
