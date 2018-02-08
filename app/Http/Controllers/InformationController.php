<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Auth;
use Image;
use Gate;

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
        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }
        return view('news.create');
    }

    public function store(Request $request)
    {
        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
            'description' => 'required']);
        
        $photo = $request->file('photo');
        $filename = time() . "." . $photo->getClientOriginalExtension();
        Image::make($photo)->save( public_path('/uploads/news_photo/' . $filename));  
        $photo = $filename;  

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
        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }
        $myNews = Information::find($id);
        return view('news.edit', ['news' => $myNews ]);
    }

    public function update(Request $request, $id)
    {
        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
            'description' => 'required']);

        $photo = $request->file('photo');
        $filename = time() . "." . $photo->getClientOriginalExtension();
        Image::make($photo)->save( public_path('/uploads/news_photo/' . $filename));  
        $photo = $filename;  

        $myNews = Information::find($id);
        $myNews->title = $request->title;
        $myNews->body = $request->body;
        $myNews->description = $request->description;
        $myNews->photo = $photo;
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

}

