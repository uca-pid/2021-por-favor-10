<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Ejercicio;

class EjercicioAPIController extends Controller
{
    public function lista_ejercicios()
    {
        $ejercicios = DB::table('ejercicios')
                ->join('grupo_musculars', 'ejercicios.grupo_muscular', '=', 'grupo_musculars.id')
                ->select('ejercicios.id','ejercicios.nombre','grupo_musculars.nombre AS grupo_muscular')
                ->get();
        return $ejercicios;
    }
}