<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Ejercicio;
use App\Models\GrupoMuscular;

class EjercicioController extends Controller
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
    public function ejercicios()
    {
        $ejercicios = Ejercicio::all();
        $grupos_musculares = GrupoMuscular::all();
        return view('ejercicios.listEjercicios', compact('ejercicios', 'grupos_musculares'));
    }

    public function crearEjercicio(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->nombre != '') {
                if ($request->nuevo_grupo_muscular!=null) {
                    $grupo_muscular = GrupoMuscular::create([ 'nombre' => $request->nuevo_grupo_muscular ]);
                    Ejercicio::create([ 'nombre' => $request->nombre, 'grupo_muscular' => $grupo_muscular->id ]);
                } else if ($request->grupo_muscular!="Seleccionar") {
                    Ejercicio::create([ 'nombre' => $request->nombre, 'grupo_muscular' => $request->grupo_muscular ]);
                } else {
                    DB::rollBack();
                    return redirect()->route('ejercicios')->with('warn', 'Debe seleccionar un grupo muscular o crear uno.');
                }
                DB::commit();
            } else {
                return redirect()->route('ejercicios')->with('warn', 'Debe ingresar un nombre para el ejercicio.');
            }
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('ejercicios');
    }
}