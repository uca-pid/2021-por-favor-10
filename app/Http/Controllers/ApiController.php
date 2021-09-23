<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\ClaseUser;


class ApiController extends Controller
{
    public function apiFetchCantUsersInClases(Request $request)
    {
    	$claseuser = ClaseUser::where('id_clase',$request->clase)->get();
        if( count($claseuser) == 0)
        {
        	return "vacio";
        }
        else
        {
        	return ($claseuser[0])->cant_inscriptos;
        }
    }

    public function apiFetchUsersInClases(Request $request)
    {
    	$claseuser = ClaseUser::all();
    	$inscriptas =  array();
    	foreach ($claseuser as $clase) {
    		$arrayDecodeado = json_decode($clase->id_users);
    		if ( in_array($request->user, $arrayDecodeado) ) {
    			array_push($inscriptas, $clase->id_clase);
    		}
    	}
    	$retorna = Evento::select('title')->whereIn('id',$inscriptas)->get();
    	$retorna = $retorna->pluck('title');
    	return( $retorna );
    }
}
