<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Rutina;
use App\Models\Ejercicio;

class RutinasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rutinas()
    {
        $rutinas = Rutina::all();
        $ejercicios = Ejercicio::all();
        return view('rutinas.listRutinas', compact('rutinas','ejercicios'));
    }

    public function crearRutina(Request $request)
    {
        DB::beginTransaction();
        $nombre = $request->nombre;

        $ejerciciosRutina = new \stdClass();
        for ($i=1; $i<8 ; $i++) {
            $param_ejercicios = 'ejercicios_dia'.$i;
            $param_repeticiones = 'repeticiones_dia'.$i;

            $ejercicios_dia = $request->$param_ejercicios;
            $repeticiones_dia = $request->$param_repeticiones;

            $cantEjercicios = count($ejercicios_dia);

            $seriesDelDia = array();
            for ($j=0; $j < $cantEjercicios; $j++) {
                $ejercicio = $ejercicios_dia[$j];
                $serie = $repeticiones_dia[$j];

                if (!$ejercicio==null && !$serie==null) {
                    array_push($seriesDelDia, array('ejercicio_id' => $ejercicios_dia[$j], 'repeticiones' => $repeticiones_dia[$j]));
                }
            }
            $ejerciciosRutina->$i = $seriesDelDia;
        }
        // dd($ejerciciosRutina);

        try {
            Rutina::create([ 'nombre' => $request->nombre, 'ejercicios' => json_encode($ejerciciosRutina) ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('rutinas');
    }
}