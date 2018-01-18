<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

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

    public function store(NesRequest $request)
    {
        
        Information::create($request->all());
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
}

