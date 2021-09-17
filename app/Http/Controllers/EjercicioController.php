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
            Ejercicio::create([ 'nombre' => $request->nombre, 'grupo_muscular' => $request->grupo_muscular ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('ejercicios');
    }
}