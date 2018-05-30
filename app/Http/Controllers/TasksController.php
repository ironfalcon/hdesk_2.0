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
use Illuminate\Pagination;

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
//        if(Gate::denies('isAdmin')){
//            return redirect()->back()->with(['message'=>'У вас нет прав']);
//        }
        $high_task = Task::where('priority_id', 1)->count();
        $mid_task = Task::where('priority_id', 2)->count();
        $low_task = Task::where('priority_id', 3)->count();

//        //выборка для виджета созданные таски за неелю
//        $Tas = Task::find(2);
//        $Tas = $Tas->create_date;
//        $now = Carbon::now();
//        //dd($month->weekOfYear);
//        //dd($now->dayOfYear - 1);
//        $now->;
//
//       // $today = Task::where('create_date',);


        $assign_task = Task::where('assigned_id', Auth::user()->id)->count();
        $closed_task = Task::where('assigned_id', Auth::user()->id)->where('status_id',4)->count();

        //для виджета пользователя
        $user_created_task = Task::where('creator_id', Auth::user()->id)->count();
        $user_closed_task = Task::where('creator_id', Auth::user()->id)->where('status_id',4)->count();

        $admin1 = Task::where('assigned_id', 8)->where('status_id',4)->count();
        $admin2 = Task::where('assigned_id', 9)->where('status_id',4)->count();
        $admin3 = Task::where('assigned_id', 7)->where('status_id',4)->count();


        //данные для виджета колличество не закрытых задач
        $no_close_admin1 = (Task::where('assigned_id', 8)->count()) - ($admin1);
        $no_close_admin2 = (Task::where('assigned_id', 9)->count()) - ($admin2);
        $no_close_admin3 = (Task::where('assigned_id', 7)->count()) - ($admin3);

        $unsigned_tasks = Task::where('assigned_id', 1)->where('status_id','!=', 4)->orderBy('create_date','desc')->paginate(15, ['*'], 'unsigned_tasks');
        //$unsigned_tasks->setPageName('unsign_page');
        $my_tasks = Task::where('assigned_id', Auth::user()->id)->
                    where('status_id','!=', 4)->
                    orderBy('create_date','desc')->
                    paginate(15, ['*'], 'my_tasks');
        //$my_tasks->setPageName('my_task_page');
        $user_tasks = Task::where('creator_id', Auth::user()->id)->orderBy('create_date','desc')->paginate(15);
        $tasks = Task::orderBy('create_date','desc')->paginate(15, ['*'], 'tasks');
        //$tasks->setPageName('tasks_page');
        return view('tasks.index', ['unsigned_tasks' => $unsigned_tasks, 'my_tasks' => $my_tasks,
            'tasks' => $tasks, 'user_tasks' => $user_tasks, 'high_task' => $high_task,
            'mid_task' => $mid_task, 'low_task' => $low_task, 'assign_task' => $assign_task,
            'closed_task' => $closed_task, 'admin1' => $admin1, 'admin2' => $admin2, 'admin3' => $admin3,
            'no_close_admin1' => $no_close_admin1, 'no_close_admin2' => $no_close_admin2,
            'no_close_admin3' => $no_close_admin3, 'user_created_task' => $user_created_task,
            'user_closed_task' => $user_closed_task]);
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
            $workLog->action = "Пользователь $user изменил приоритет c <$old_priority> на <$prioritet>";
            $task->priority_id = $request->priority_id;
        }
        if($request->description) {
            $old_description = $task->description;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $description = $request->description;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил описание c <$old_description> на <$description>";
            $task->description = $request->description;
        }
        if($request->status_id) {
            $old_status = $task->status($task->status_id)->name;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $status = Status::find($request->status_id);
            $status = $status->name;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил статус c <$old_status> на  <$status>";
            $task->status_id = $request->status_id;
            if($request->status_id == 4){
                $task->close_date = Carbon::now('Europe/Samara');
                $workLog->action = $workLog->action." ЗАЯВКА ЗАКРЫТА";
            }
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
            $workLog->action = "Пользователь $user изменил исполняющего c <$old_assigned> на: <$assign_user>";
            $task->assigned_id = $request->assigned_id;
        }

        if($request->location_id) {
            $old_location = $task->location($task->location_id);
            $old_location = $old_location->name;
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $location = LOcation::find($request->location_id);
            $location = $location->name;
            $user = User::find($request->user_id);
            $user = $user->name;
            $workLog->action = "Пользователь $user изменил локацию c <$old_location> на: <$location>";
            $task->location_id = $request->location_id;
        }

        if($request->file('photo')) {
            $workLog->user_id = $request->user_id;
            $workLog->task_id = $id;
            $user = User::find($request->user_id);
            $user = $user->name;

            $photo = $request->file('photo');
            $filename = time() . "." . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('/uploads/task_photo/' . $filename));
            $photo = $filename;
            $task->attachments = $photo;
            
            $workLog->action = "Пользователь $user изменил прикрепленное изображение";
        }

        $task->update_date = Carbon::now('Europe/Samara');
        $task->save();
        $workLog->save();
        return redirect()->route('tasks.show', $id);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if((Auth::user()->permission()->value('name') == 'admin') || ($task->creator_id == Auth::user()->id)){
        }else{
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }

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
