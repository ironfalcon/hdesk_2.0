<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Group;
class MessageController extends Controller
{
    public function index()
    {
        $gp_id = Auth::user()->group()->value('id');
        $messages = Message::where('to_user_id', $gp_id)->get();
        $users = User::all();
        return view('messages.index', ['messages' => $messages, 'users' => $users]);
    }

    public function create()
    {
        $groups = Group::all();
        return view('messages.create', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'to_user_id' => 'required'
            ]);

        Message::create($request->all());
//        $message = new Message;
//        $message->from_user_id = $request->from_user_id;
//        $message->body = $request->body;
//        $message->to_user_id = $request->to_user_id;
//        $message->save();
        return redirect()->route('messages.index');
    }


}
