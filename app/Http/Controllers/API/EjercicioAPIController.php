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
        // $ejercicios = Ejercicio::all();
        $ejercicios = DB::table('ejercicios')
                ->join('grupo_musculars', 'ejercicios.grupo_muscular', '=', 'grupo_musculars.id')
                ->select('ejercicios.id','ejercicios.nombre','grupo_musculars.nombre AS grupo_muscular')
                ->get();
        return $ejercicios;
    }

    public function crearEjercicio(Request $request)
    {
        DB::beginTransaction();
        $myArr = array("John", "Mary", "Peter", "Sally");
        $myJSON = json_encode($myArr);
        try {
            Rutina::create([ 'nombre' => $request->nombre, 'ejercicios' => $myJSON ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('rutinas');
    }
}