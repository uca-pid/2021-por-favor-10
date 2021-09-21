<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\ClaseUser;


class ApiController extends Controller
{
    public function apiFetchClases(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Evento::select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
