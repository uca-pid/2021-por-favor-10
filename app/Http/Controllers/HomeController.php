<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\ClaseUser;
use App\Models\Cliente;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    public function usuariosClases()
    {
        $usuarios = Cliente::all();
        $clases = Evento::all();
        return view('usuariosClases')->with('clases', $clases)->with('usuarios', $usuarios);
    }
    public function agregarUsuariosClases(Request $request)
    {
        $claseuser = ClaseUser::where('id_clase',$request->clase)->get();
        if ( count($claseuser) == 0 )
        {
            ClaseUser::create([ 'id_clase' => $request->clase , 'id_users' => json_encode([$request->user]) , 'cant_inscriptos' => 1]);
            return redirect()->route('usuariosClases')->with('success','El cliente se agrego correctamente!');
        }
        else
        {
            $arrayusers = json_decode(($claseuser[0])->id_users);
            if(in_array($request->user ,$arrayusers))
            {
                return redirect()->route('usuariosClases')->with('failed','El cliente ya esta en la clase!');
            }
            else
            {
                array_push($arrayusers, $request->user);
                ClaseUser::where('id_clase',$request->clase)->update([ 'id_clase' => $request->clase , 'id_users' => json_encode($arrayusers) , 'cant_inscriptos' => (($claseuser[0])->cant_inscriptos+1)  ]);
                return redirect()->route('usuariosClases')->with('success','El cliente se agrego correctamente!');
            }
        }
    }
    public function clases()
    {
        return view('clases');
    }
    public function cargarClase(Request $request)
    {
        // $randColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        $randColor = "fc-event-solid-primary";
        return Evento::create([ 'title' => $request->title , 'day' => $request->daysOfWeek , 'start' => $request->startTime, 'end' => $request->endTime , 'color' => $randColor]);
    }

    public function clasesCargadas()
    {
        $query = Evento::all();
        $responseQuery = array();
        foreach ($query as $clase) {
            array_push($responseQuery, ["id" => strval($clase->id) , "title" => $clase->title, "startTime" => $clase->start, "endTime" => $clase->end, "daysOfWeek" => $clase->day, "className" => $clase->color]);
        }
        return response()->json($responseQuery);
        /*return response()->json([["id" => "2312" , "title" => "my event", "start" => "2021-09-09T09:00:00", "end" => "2021-09-09T10:00:00"],["id" => "2311" , "title" => "my event1", "startTime" => "9:00:00", "endTime" => "10:00", "daysOfWeek" => "6", "color" => "yellow"]]);*/
    }

    public function landing()
    {
        return 'landing';
    }

    public function welcome()
    {
        return view('test');
    }

    public function perfil()
    {
        return view('perfil');
    }
    public function modificar()
    {
        $query = Evento::all();
        return view('modificar')->with('editables', $query);
    }
    public function modificarClase(Request $request)
    {
        $result = Evento::where('id',$request->id)->get();
        return view('modificarClase')->with('editable', $result[0]);
    }
    public function generarCambios(Request $request)
    {
        Evento::where('id',$request->id)->update(['title'=>$request->titulo,'start'=>$request->start,'end'=>$request->end,'day'=>$request->day]);
        return redirect()->route('clases');
    }
    public function borrarClase(Request $request)
    {
        $borrado = Evento::where('id',$request->id)->delete();
        return redirect()->route('clases');
    }
    public function estadisticasClases(Request $request)
    {
        $usuarios = Cliente::all();
        $clases = Evento::all();
        return view('estadisticasClases')->with('clases', $clases)->with('usuarios', $usuarios);
    }
}
