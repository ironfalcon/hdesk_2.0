<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class ClaimController extends Controller
{
    public function index()
    {   //проверка, может ли пользователь
        // смотреть данный раздел
        if(Gate::denies('isStud')){
            return redirect()->back()->with(['message'=>'У вас нет прав на просмотр']);
        }

        if(Gate::denies('isSotr')){
            $claims = Claim::
        }

        if(Gate::denies('isAdmin')){
            return redirect()->back()->with(['message'=>'У вас нет прав']);
        }

        $claims = Claim::all();
        return view('claims.index', ['claims' => $claims]);
    }

    public function create()
    {
        if(Gate::denies('isAdmin')){
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
