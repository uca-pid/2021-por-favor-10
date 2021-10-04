<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RutinaCliente extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'id_rutina',
        'id_clientes',
        'cant_inscriptos'
    ];

    public $timestamps = false;
}
