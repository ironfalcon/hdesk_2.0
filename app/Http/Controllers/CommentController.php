<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;
use App\TaskLog;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function add_comment(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
         ]);
        $workLog = new TaskLog;
        $workLog->user_id = $request->user_id;
        $workLog->task_id = $request->comment_to_id;
        $user = User::find($request->user_id);
        $user = $user->name;
        $workLog->action = "Пользователь $user добавил комментарий<$request->text>";
        $workLog->save();

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->user_id = $request->user_id;
        $comment->comment_to_id = $request->comment_to_id;
        $comment->post_date = Carbon::now('Europe/Samara');
        $comment->save();
        return redirect()->route('tasks.show', $request->comment_to_id);
    }

    public function destroy( $comment)
    {
//        $workLog = new TaskLog;
//        $workLog->user_id = $request->user_id;
//        $username = User::find($request->user_id);
//        $username = $username->name;
//        $comment = Comment::find($comment);
//        $comment_user = User::find($comment->user_id);
//        $comment_user = $comment_user->name;
//
//        $workLog->task_id = $request->task_id;
//        $workLog->action ="Пользователь $username удалил комментарий пользователя $comment_user < $comment->text >";
//        $workLog->save();

        $comment = Comment::find($comment);
        $create_user_id = User::find($comment->user_id);
        $task_id = $comment->comment_to_id;
        $comment_text = $comment->text;
        $deleted_user = Auth::user();
        $workLog = new TaskLog();
        $workLog->user_id = $deleted_user->id;
        $workLog->task_id = $task_id;
        $workLog->action = "Пользователь $deleted_user->name удалил комментарий пользователя $create_user_id->name <$comment_text>";
        $workLog->save();

        $comment->delete();
        return redirect()->route('tasks.show', $task_id);
    }
}
