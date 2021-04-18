<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        //retrieve all of the tasks when we visit the homepage
        $tasks = Task::orderBy('completed_at')
            ->orderBy('id', 'Desc')
            ->get();



        //pass the data to our index view
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        request()->validate([
            'description' => 'required|max:255',
        ]);

        $task = Task::create([
            'description' => request('description')
        ]);

        //return to the homepage when a task is created
        return redirect('/');
    }

    public function update($id)
    {
        $task = Task::where('id', $id)->first();

        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect('/');
    }
}


// replace homepage - done  01123536327
//create a task
// handle task submission data
// display a list of tasks
// mark a task as completed
// divide the tasks into completed and uncompleted section
// delete a task permanently

// requesting remote access on server 
// ip: 10.42.238.141 port: 8081,1880 @ port vnc(5900)
// ip: 10.42.238.122 port: 21