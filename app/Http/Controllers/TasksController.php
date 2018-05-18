<?php

namespace App\Http\Controllers;

use App\Location;
use App\Priority;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\createTaskRequest;
use illuminate\Foundation\Validation\ValidatesRequests;
use Gate;
use Image;

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

        $tasks = Task::orderBy('create_date','desc')->paginate(15);
        return view('tasks.index', ['tasks' => $tasks]);
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

        if($request->file('photo')) {
            $photo = $request->file('photo');
            $filename = time() . "." . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('/uploads/task_photo/' . $filename));
            $photo = $filename;
            $task = new Task;
            $task->attachments = $photo;
        }
        $task = new Task;
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

//    public function edit($id)
//    {
//        $myTask = Task::find($id);
//        return view('tasks.edit', ['task' => $myTask ]);
//    }
//
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'elements' => 'required',
//            'aud' => 'required',
//            'updated_user' => 'required',
//            'description' => 'required']);
//
//        $myTask = Task::find($id);
//        $myTask->fill($request->all());
//        $myTask->save();
//        return redirect()->route('tasks.index');
//    }
//
//    public function show($id)
//    {
//        $myTask = Task::find($id);
//        return view('tasks.show', ['task' => $myTask]);
//    }
//
//    public function destroy($id)
//    {
//        Task::find($id)->delete();
//        return redirect()->route('tasks.index');
//    }
}
