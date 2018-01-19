<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Auth;
use Image;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $news = Information::all();
        return view('news.index', ['news' => $news]);
    }
    
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
            'description' => 'required']);
        
         $photo = $request->file('photo');
        $filename = time() . "." . $photo->getClientOriginalExtension();
        Image::make($photo)->save( public_path('/uploads/news_photo/' . $filename));  
        $photo = $filename;  
        //Information::create($request->all());
        $news = new Information;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->description = $request->description;
        $news->photo = $photo;
        $news->save();
        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $myNews = Information::find($id);
        return view('news.edit', ['news' => $myNews ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
            'description' => 'required']);

        $myNews = Information::find($id);
        $myNews->fill($request->all());
        $myNews->save();
        return redirect()->route('news.index');
    }

    public function show($id)
    {
        $myNews = Information::find($id);
        return view('news.show', ['news' => $myNews]);
    }

    public function destroy($id)
    {
        Information::find($id)->delete();
        return redirect()->route('news.index');
    }

    public function update_avatar(Request $request)
    {
        
        
        $avatar = $request->file('avatar');
        $filename = time() . "." . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));
        
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

        return view('profile', array('user' => Auth::user()));
    }
}

