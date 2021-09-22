<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClaseUser extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'id_clase',
        'id_users',
        'cant_inscriptos'
    ];

    public $timestamps = false;


}
