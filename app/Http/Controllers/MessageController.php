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
        // $gp_id = Auth::user()->group()->value('id');
        // $messages = Message::where('to_user_id', $gp_id)->get();
        // $users = User::all();
        // return view('messages.index', ['messages' => $messages, 'users' => $users]);
        $messages = Message::where('to_user_id', Auth::user()->id)->get();
        $messagesFrom = Message::where('from_user_id', Auth::user()->id)->get();
        $users = User::all();
        return view('messages.index', ['messages' => $messages, 'users' => $users, 'messagesFrom' => $messagesFrom]);
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
            ]);

        $gp_id = $request->to_group_id;
        $gp = Group::find($gp_id);
        $gp = $gp->users()->get();
        foreach ($gp as $gp_user){

            $message = new Message;
            $message->from_user_id = $request->from_user_id;
            $message->body = $request->body;
            $message->to_user_id = $gp_user->id;
            $message->save();
        }

        //Message::create($request->all());
//        $message = new Message;
//        $message->from_user_id = $request->from_user_id;
//        $message->body = $request->body;
//        $message->to_user_id = $request->to_user_id;
//        $message->save();
        return redirect()->route('messages.index');
    }

    public function show($id)
    {
        $myMessage = Message::find($id);
        $myMessage->unread = 0;
        $myMessage->save();
        $users = User::all();
        return view('messages.show', ['message' => $myMessage, 'users' => $users]);
    }


}
