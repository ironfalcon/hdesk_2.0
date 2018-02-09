<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Claim;
use Illuminate\Support\Facades\Auth;


class ClaimController extends Controller
{
    public function index()
    {   //проверка, может ли пользователь
        // смотреть данный раздел

        if(Gate::allows('isAdmin')){
            $claims = Claim::paginate(15);
            return view('claims.index', ['claims' => $claims]);
        }
        if(Gate::allows('isSotr')){
            $claims = Claim::where('author', Auth::user()->name)->paginate(15);
            return view('claims.index', ['claims' => $claims]);
        }
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

    }

    public function create()
    {
        if(Gate::allows('isSotr')){
            return view('claims.create');
        }
        if(Gate::allows('isAdmin')){
            return view('claims.create');
        }
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }
    }

    public function store(Request $request)
    {
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

        $this->validate($request, [
            'body' => 'required',
            'author' => 'required',
            'desired_date' => 'required',
            'place' => 'required']);

        Claim::create($request->all());
        return redirect()->route('claims.index');
    }

    public function edit($id)
    {
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }
        if(Gate::allows('isSotr')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

        $myClaim = Claim::find($id);
        return view('claims.edit', ['claim' => $myClaim ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
            'author' => 'required',
            'desired_date' => 'required',
            'place' => 'required']);

        $myClaim = Claim::find($id);
        $myClaim->fill($request->all());
        $myClaim->save();
        return redirect()->route('claims.index');
    }

    public function show($id)
    {
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

        $myClaim = Claim::find($id);
        return view('claims.show', ['claim' => $myClaim]);
    }

    public function destroy($id)
    {
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }
        Claim::find($id)->delete();
        return redirect()->route('claim.index');
    }
}
