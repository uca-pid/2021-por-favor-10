<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoClase extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'id_clases',
        'objetivo',
        'real',
        'ocupacion'
    ];

    public $timestamps = false;
}
