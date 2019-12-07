<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;
use Illuminate\Support\Facades\Session;

class PracticesController extends Controller
{
    public function index(){
        $practices = Practice::all();
        return view('practices.index')->with('practices',$practices);
    }

    public function create(){
        return view('practices.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:practices|max:20',
            'content' => 'required'
        ]);

        $practice = new Practice;
        $practice ->name = $request->name;
        $practice ->content = $request->content;
        $practice ->save();

        Session::flash('success','Practice created Successfully');

        return redirect()->route('practices.index');
    }

    public function show(Practice $practice){
        //Route Model Binding
        //$practice = Practice::find($id);
        return view('practices.show')->with('practice',$practice);
    }

    public function edit(Practice $practice){
        //$practice = Practice::find($id);
        return view('practices.edit')->with('practice',$practice);
    }

    public function update(Request $request, Practice $practice){
        $this->validate($request,[
            'name' => 'required',
            'content' => 'required'
        ]);

        $practice->name = $request->name;
        $practice->content = $request->content;
        $practice->save();

        Session::flash('success','Practice Update Successfully');

        return redirect()->route('practices.index');
    }

    public function delete(Practice $practice){
        //$practice = Practice::find($id);
        $practice->delete();

        Session::flash('success','Practice delete successfully');
        return redirect()->back();
    }

    public function done($id){
        $practice = Practice::find($id);

        $practice->done = 1;
        $practice->save();

        Session::flash('success','Practice finish successflly');
        return redirect()->route('practices.index');
    }

    public function not_done($id){
        $practice = Practice::find($id);

        $practice->done = 0;
        $practice->save();

        Session::flash('success','Practice pending');
        return redirect()->route('practices.index');
    }
}
