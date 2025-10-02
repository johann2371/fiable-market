<?php

namespace App\Http\Controllers;

use App\Models\Task;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::all();
        return view('tasks_view.index',compact('tasks'));
    }

    public function create(){
        return view('tasks_view.create');
    }


public function store(Request $request){
     $request->validate([

 'title' => 'string|max:255|required',
 'description'=>'string|max:1000|required'


     ]);
Task::create([
'title'=>$request->title,
'description'=>$request->description,
'status'=>$request->status =="on"? 1 : 0

]);

return redirect()->route('index')->with('success','tache enregistrer avec sucess');

}

public function edit(int $id){
    $task=task::where('id',$id)->first();
 return view('tasks_view.create',compact('task'));
}

public function update(Request $request,int $id){


   $request->validate([

 'title' => 'string|max:255|required',
 'description'=>'string|max:1000|required'


     ]);

     $task=task::where('id',$id)->first();

     $task->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status =="on"? 1 : 0

     ]);

     return redirect()->route('index')->with('success','tache modifier avec sucess');

}

public function destroy(int $id){

Task::where('id',$id)->delete();

return redirect()->route('index')->with('success','tache supprimer avec sucess');

}








}









