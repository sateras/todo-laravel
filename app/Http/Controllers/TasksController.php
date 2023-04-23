<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('dashboard', compact('tasks'));
    }


    public function add()
    {
    	return view('add');
    }


    public function show(Task $task)
    {
        if (auth()->user()->id == $task->user_id)
        {            
            return view('show', compact('task'));
        }           
        else {
             return redirect('/dashboard');
         }      
        // $tasks = auth()->user()->tasks;
        // $task = $tasks
    	// return view('show', [
        //     "task" => $tasks[$id] 
        // ]);
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
        $task->name = $request->name;
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/dashboard'); 
    }


    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {            
            return view('edit', compact('task'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }


    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
            $task->name = $request->name;
    		$task->description = $request->description;
	    	$task->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}
