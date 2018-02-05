<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function ajaxData(Request $request){

        $query = $request->get('query','');        

        $posts = User::where('name','LIKE','%'.$query.'%')->get();    

        return response()->json($posts);

	}
}
