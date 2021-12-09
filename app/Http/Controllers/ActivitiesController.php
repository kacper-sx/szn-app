<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index(){
        $activities = Activities::all();
        return view('activities.list', ['activities'=>$activities]);
    }
    public function create(){
        return view('activities.create');
    }
    public function store(Request $request){
        $activities = new Activities();
        $activities->name = $request->name;
        $activities->date = $request->date;
        $activities->start = $request->start;
        $activities->end = $request->end;
        $activities->place = $request->place;

        $activities->save();
        return redirect()->route('activities.list');
    }

    public function edit($id)
    {
        $activities = Activities::find($id);
        return view('activities.edit', ['activities' => $activities]);
    }

    public function update($id, Request $request){
        $activities = Activities::find($id);
        $activities->name = $request->name;
        $activities->date = $request->date;
        $activities->start = $request->start;
        $activities->end = $request->end;
        $activities->place = $request->place;

        $activities->save();

        return redirect()->route('activities.list')->with('message', 'Dane zmienione poprawnie');
    }

    public function delete($id){
        Activities::destroy($id);
        return redirect()->route('activities.list')->with('message', 'Zajęcia usunięte poprawnie');
    }
}