<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function add_comment(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
         ]);

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->user_id = $request->user_id;
        $comment->comment_to_id = $request->comment_to_id;
        $comment->post_date = Carbon::now('Europe/Samara');
        $comment->save();
        return redirect()->route('tasks.show', $request->comment_to_id);
    }
}
