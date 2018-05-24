<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Status;
use Illuminate\Http\Request;
use App\User;
use App\Task;

class SearchController extends Controller
{
    
    public function ajaxData(Request $request){

        $query = $request->get('query','');        

        $posts = Comment::where('text','LIKE','%'.$query.'%')->get();

        return response()->json($posts);

	}

    public function task_search(Request $request)
    {
        return Task::where('title', 'LIKE', '%'.$request->q.'%')->get();
    }
}
