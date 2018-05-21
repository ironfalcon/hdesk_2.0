<?php

namespace App\Http\Controllers;

use App\Location;
use App\Priority;
use App\Status;
use App\User;
use App\TaskLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\createTaskRequest;
use illuminate\Foundation\Validation\ValidatesRequests;
use Gate;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Comment;

class TasksController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   //проверка, может ли пользователь
        // смотреть данный раздел
        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }

        $unsigned_tasks = Task::where('assigned_id', 1)->orderBy('create_date','desc')->paginate(15);
        $my_tasks = Task::where('assigned_id', Auth::user()->id)->orderBy('create_date','desc')->paginate(15);
        $tasks = Task::orderBy('create_date','desc')->paginate(15);
        return view('tasks.index', ['unsigned_tasks' => $unsigned_tasks, 'my_tasks' => $my_tasks, 'tasks' => $tasks]);
    }
    
    public function create()
    {

        $priorities = Priority::all();
        $locations = Location::all();
        return view('tasks.create', ['priorities' => $priorities, 'locations' => $locations ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'priority_id' => 'required',
            'creator_id' => 'required',
            'location_id' => 'required']);
        $task = new Task;
        if($request->file('photo')) {
            $photo = $request->file('photo');
            $filename = time() . "." . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('/uploads/task_photo/' . $filename));
            $photo = $filename;
            $task->attachments = $photo;
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority_id = $request->priority_id;
        $task->create_date = Carbon::now('Europe/Samara');
        $task->update_date = Carbon::now('Europe/Samara');
        $task->location_id = $request->location_id;
        $task->update_date = '';
        $task->close_date = '';

        $task->creator_id = $request->creator_id;
        $task->save();

        $workLog = new TaskLog;
        $workLog->user_id = $request->creator_id;
        $username = User::find($request->creator_id);
        $username = $username->name;
        $workLog->task_id = $task->id;
        $workLog->action ="Пользователь $username создал заявку <$workLog->task_id | $request->title>";
        $workLog->save();


        return redirect()->route('tasks.index');


//        $table->increments('id');
//        $table->string('title');
//        $table->text('description');
//        $table->integer('priority_id')->default(2);
//        $table->string('create_date');
//        $table->string('update_date')->nullable();
//        $table->string('close_date')->nullable();
//        $table->integer('location_id')->default(1);
//        $table->integer('status_id')->default(1);
//        $table->integer('assigned_id')->default(1);
//        $table->integer('creator_id');
//        $table->integer('comments_id')->nullable();
//        $table->string('attachments')->nullable();
        
    }


    public function update(Request $request, $id)
    {
//        $this->validate($request, [
//            'elements' => 'required',
//            'aud' => 'required',
//            'updated_user' => 'required',
//            'description' => 'required']);

        $task = Task::find($id);
        $workLog = new TaskLog;
        if($request->priority_id) {
            $old_priority = $task->priority($task->priority_id)->name;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $prioritet = Priority::find($request->priority_id);
            $prioritet = $prioritet->name;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил приоритет c $old_priority на $prioritet";
            $task->priority_id = $request->priority_id;
        }
        if($request->status_id) {
            $old_status = $task->status($task->status_id)->name;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $status = Status::find($request->status_id);
            $status = $status->name;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил статус c $old_status на: $status";
            $task->status_id = $request->status_id;
        }
        if($request->assigned_id) {
            $old_assigned = $task->user($task->assigned_id);
            $old_assigned = $old_assigned->name;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $assign_user = User::find($request->assigned_id);
            $assign_user = $assign_user->name;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил исполняющего c $old_assigned на: $assign_user";
            $task->assigned_id = $request->assigned_id;
        }

        $task->update_date = Carbon::now('Europe/Samara');
        $task->save();
        $workLog->save();
        return redirect()->route('tasks.show', $id);
    }

    public function show($id)
    {
        $priorities = Priority::all();
        $locations = Location::all();
        $statuses = Status::all();
        $users_admin = User::where('permission_id', 3)->get();
        $comments = Comment::where('comment_to_id', $id)->get();
        $history = TaskLog::where('task_id', $id)->get();
        $myTask = Task::find($id);
        return view('tasks.show', ['task' => $myTask, 'comments' => $comments,
            'priorities' => $priorities, 'locations' => $locations,
            'statuses' => $statuses, 'users_admin' => $users_admin, 'history' => $history]);
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index');
    }
}
