<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\ClaseUser;
use App\Models\Cliente;
use App\Models\Rutina;
use App\Models\RutinaCliente;
use App\Models\RecursoClase;
use App\Models\RecursoEjercicio;
use App\Models\Ejercicio;

use DB;


class RecursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function recursoclases(Request $request)
    {
    	$clases = Evento::all();
    	$recursos = RecursoClase::all();
        return view('recursos.recursoclases')->with('clases', $clases)->with('recursos', $recursos);
    }
    public function crearRecursoClase(Request $request)
    {
        RecursoClase::create([ 'nombre' => $request->nombre_rec , 'id_clases' => null , 'objetivo' => $request->objetivo_rec , 'real' => null,  'ocupacion' => null]);
        return redirect()->route('recursoclases')->with('success','Se ha creado el recurso!');
    }
    public function agregarClaseRecurso(Request $request)
    {
    	$recursoclase = RecursoClase::where('id',$request->recurso)->get();
    	$clasesel = Evento::where('id',$request->clase)->get();
    	$clasesel = $clasesel[0];
    	$recursoclase = $recursoclase[0];
    	$tiempodeclase = (intval($clasesel->end)-intval($clasesel->start));
        if ( $recursoclase->id_clases == null )
        {
        	$ocupacion = (int)(($tiempodeclase/$recursoclase->objetivo)*100);
            RecursoClase::where('id',$request->recurso)->update(['id_clases' => json_encode([$request->clase]) , 'real' => $tiempodeclase,  'ocupacion' => $ocupacion]);
            return redirect()->route('recursoclases')->with('success','Se ha agregado la clase al recurso!');
        }
        else
        {
            $arrayclases = json_decode($recursoclase->id_clases);
            if(in_array($request->clase ,$arrayclases))
            {
                return redirect()->route('recursoclases')->with('failed','La clase ya esta en el recurso!');
            }
            else
            {
                array_push($arrayclases, $request->clase);
                //return $arrayclases;
                $nuevoreal = $recursoclase->real+$tiempodeclase;
                $nuevaocupacion = $ocupacion = (int)(($nuevoreal/$recursoclase->objetivo)*100);
                RecursoClase::where('id',$request->recurso)->update(['id_clases' => json_encode($arrayclases) , 'real' => $nuevoreal,  'ocupacion' => $nuevaocupacion]);
                return redirect()->route('recursoclases')->with('success','Se ha agregado la clase al recurso!');
            }
        }
        //$claserecurso = RecursoClase::where('id',$request->clase)->get();
        return $request;
    }
    /* RECURSOS DE EJERCICIOS */
    public function recursoejercicios(Request $request)
    {
    	$ejercicios = Ejercicio::all();
    	$recursos = RecursoEjercicio::all();
        return view('recursos.recursoejercicios')->with('ejercicios', $ejercicios)->with('recursos', $recursos);
    }
    public function crearRecursoEjercicio(Request $request)
    {
        RecursoEjercicio::create([ 'nombre' => $request->nombre_rec , 'id_ejercicios' => null , 'objetivo' => $request->objetivo_rec , 'real' => null,  'ocupacion' => null]);
        return redirect()->route('recursoejercicios')->with('success','Se ha creado el recurso!');
    }
    public function agregarEjercicioRecurso(Request $request)
    {
    	$recursoejercicio = RecursoEjercicio::where('id',$request->recurso)->get();
    	$ejerciciosel = Ejercicio::where('id',$request->ejercicio)->get();
    	$ejerciciosel = $ejerciciosel[0];
    	$recursoejercicio = $recursoejercicio[0];

        $rutinas = Rutina::all();
        $clientesrutinas = RutinaCliente::all();
        
        $rutinasconejercicio = array();
        foreach ($rutinas as $rutina) {
            $temp=json_decode($rutina->ejercicios);
            for ($i = 1; $i <= 7; $i++) {
                $dia=strval($i);
                foreach ( ($temp->$dia) as $arraydia) {
                    //return $arraydia->ejercicio_id;
                    if ($arraydia->ejercicio_id == strval($request->ejercicio)) {
                        array_push($rutinasconejercicio, $rutina->id);
                        break;
                    }
                }
            }   
        }
        
        $cantidadpersejercicios = 0;
        foreach ($clientesrutinas as $clienterutinas) {
            if( in_array( ($clienterutinas->id_rutina), $rutinasconejercicio))
            {
                $cantidadpersejercicios = $cantidadpersejercicios + $clienterutinas->cant_inscriptos;
            }
        }
    	//return $cantidadpersejercicios;
        //$cantidadpersejercicios = (intval($clasesel->end)-intval($clasesel->start));

        if ( $recursoejercicio->id_ejercicios == null )
        {
        	$ocupacion = (int)(($cantidadpersejercicios/$recursoejercicio->objetivo)*100);
            RecursoEjercicio::where('id',$request->recurso)->update(['id_ejercicios' => json_encode([$request->ejercicio]) , 'real' => $cantidadpersejercicios,  'ocupacion' => $ocupacion]);
            return redirect()->route('recursoejercicios')->with('success','Se ha agregado el ejercicio al recurso!');
        }
        else
        {   
            $arrayejercicios = json_decode($recursoejercicio->id_ejercicios);
            if(in_array($request->ejercicio ,$arrayejercicios))
            {
                return redirect()->route('recursoejercicios')->with('failed','El ejercicio ya esta en el recurso!');
            }
            else
            {
                array_push($arrayejercicios, $request->ejercicio);
                //return $arrayclases;
                $nuevoreal = $recursoejercicio->real+$cantidadpersejercicios;
                $nuevaocupacion = (int)(($nuevoreal/$recursoejercicio->objetivo)*100);
                RecursoEjercicio::where('id',$request->recurso)->update(['id_ejercicios' => json_encode($arrayejercicios) , 'real' => $nuevoreal,  'ocupacion' => $nuevaocupacion]);
                return redirect()->route('recursoejercicios')->with('success','Se ha agregado el ejercicio al recurso!');
            }
        }
        //$claserecurso = RecursoClase::where('id',$request->clase)->get();
        return $request;
    }

    public function borrarRecursos(Request $request)
    {
        if( $request->tipo == 'clase')
        {
            RecursoClase::where('id',$request->id)->delete();
            return redirect()->route('recursoclases')->with('success','Se ha borrado el recurso!');
        }
        elseif ($request->tipo == 'ejercicio') {
            RecursoEjercicio::where('id',$request->id)->delete();
            return redirect()->route('recursoejercicios')->with('success','Se ha borrado el recurso!');
        }
        else
        {
            return redirect()->route('home')->with('failed','No se ha podido borrar el recurso!');
        }
    }
}
