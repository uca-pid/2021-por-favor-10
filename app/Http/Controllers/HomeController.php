<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\ClaseUser;
use App\Models\Cliente;
use App\Models\Rutina;

use DB;

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
        $clases = Evento::all();
        $rutinas = Rutina::all();
        $clientes = Cliente::all();

        $clientes_en_alguna_clase = array();
        $clientes_en_alguna_rutina = array();

        // clases clientes
        $clases_usuarios = DB::table('public.clase_users')->select('id_clase','id_users')->get();

        $datos_clases_usuarios = ['clases_ids' => [], 'clases_nombre' => [], 'alumnos' => []];
        foreach ($clases_usuarios as $clase) {
            $clase_nombre = ($clases->find($clase->id_clase))->title;
            array_push($datos_clases_usuarios['clases_ids'],$clase->id_clase);
            array_push($datos_clases_usuarios['clases_nombre'],$clase_nombre);
            array_push($datos_clases_usuarios['alumnos'],count(json_decode($clase->id_users)));

            $clientes_clase = json_decode($clase->id_users);
            foreach ($clientes_clase as $cliente) {
                in_array($cliente, $clientes_en_alguna_clase) ? null : array_push($clientes_en_alguna_clase, $cliente);
            }
        };

        // rutinas clientes
        $rutinas_clientes = DB::table('public.rutina_clientes')->select('id_rutina','id_clientes')->get();

        $datos_rutinas_usuarios = ['rutinas_ids' => [], 'rutinas_nombre' => [], 'alumnos' => []];
        foreach ($rutinas_clientes as $rutina) {
            $rutina_nombre = ($rutinas->find($rutina->id_rutina))->nombre;
            array_push($datos_rutinas_usuarios['rutinas_ids'],$rutina->id_rutina);
            array_push($datos_rutinas_usuarios['rutinas_nombre'],$rutina_nombre);
            array_push($datos_rutinas_usuarios['alumnos'],count(json_decode($rutina->id_clientes)));

            $clientes_rutina = json_decode($rutina->id_clientes);
            foreach ($clientes_rutina as $cliente) {
                in_array($cliente, $clientes_en_alguna_rutina) ? null : array_push($clientes_en_alguna_rutina, $cliente);
            }
        };

        // clientes registrados
        $mañana        = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
        $hace_6_meses  = mktime(0, 0, 0, date("m")-6, date("d"),   date("Y"));
        $año_siguiente = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

        $clientes_registrados_por_mes = [0,0,0,0,0,0];
        $clientes_registrados_mes_nombres = [[],[],[],[],[],[]];
        foreach ($clientes as $cliente) {
            $fecha_trimmed = explode(" ",$cliente->created_at)[0];
            for ($i=0; $i <= 5; $i++) {
                $mesInf  = date('Y-m-d', mktime(0, 0, 0, date("m")-$i, 0,   date("Y")));
                $mesSup  = date('Y-m-d', mktime(0, 0, 0, date("m")-$i, 31,   date("Y")));
                if ($fecha_trimmed>$mesInf && $fecha_trimmed<$mesSup) {
                    $clientes_del_mes = $clientes_registrados_por_mes[$i];
                    $clientes_registrados_por_mes[$i] = $clientes_del_mes+1;

                    $clientes_registrados_mes_nombres[$i] = array($clientes_registrados_mes_nombres[$i],$cliente->nombre);
                }
            }
        }
        $clientes_registrados_por_mes = array_reverse($clientes_registrados_por_mes);

        $clientes_en_clases = count($clientes_en_alguna_clase);
        $clientes_en_rutinas = count($clientes_en_alguna_rutina);
        $total_clientes = count($clientes);
        return view('graficos', compact('datos_clases_usuarios', 'clientes_en_clases', 'clientes_en_rutinas', 'total_clientes', 'clientes_registrados_por_mes'));
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
            return redirect()->route('usuariosClases');
        }
        else
        {
            $arrayusers = json_decode(($claseuser[0])->id_users);
            if(in_array($request->user ,$arrayusers))
            {
                return "El usuario ya esta en la clase";
            }
            else
            {
                array_push($arrayusers, $request->user);
                ClaseUser::where('id_clase',$request->clase)->update([ 'id_clase' => $request->clase , 'id_users' => json_encode($arrayusers) , 'cant_inscriptos' => (($claseuser[0])->cant_inscriptos+1)  ]);
                return redirect()->route('usuariosClases');
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
