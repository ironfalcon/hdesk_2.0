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
            $claims = Claim::all();
            return view('claims.index', ['claims' => $claims]);
        }
        if(Gate::allows('isSotr')){
            $claims = Claim::where('author', Auth::user()->name)->get();
            return view('claims.index', ['claims' => $claims]);
        }
        if(Gate::allows('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

    }

    public function create()
    {
        if(Gate::denies('isSotr')){
            return redirect()->back();
        }

        return view('claims.create');
    }

    public function store(createTaskRequest $request)
    {

        Claim::create($request->all());
        return redirect()->route('claims.index');
    }

    public function edit($id)
    {
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
        return redirect()->route('claim.index');
    }

    public function show($id)
    {
        $myClaim = Claim::find($id);
        return view('claims.show', ['claim' => $myClaim]);
    }

    public function destroy($id)
    {
        Claim::find($id)->delete();
        return redirect()->route('claim.index');
    }
}