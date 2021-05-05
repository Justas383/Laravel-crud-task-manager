<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Status;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // if(isset($request->status_id) && $request->status_id !== 0)
        // 
        // else
        // $task = \App\Models\Task::orderBy('id', 'asc')->get();
        // $statuses = \App\Models\Status::orderBy('name')->get();
        // return view('tasks.index', ['tasks' => $task]);

        if (isset($request->status_id) && $request->status_id !== 0)
        $task = \App\Models\Task::where('status_id', $request->status_id)->orderBy('created_at', 'asc')->get();
        else
            $task = Task::orderBy('created_at', 'asc')->get();

        return view('tasks.index', ['tasks' => $task, 'statuses' => Status::orderBy('name')->get()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = \App\Models\Status::orderBy('name')->get();
        return view('tasks.create', ['statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'task_name' => 'required|regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/|max:32',
            'status_id' => 'required',
            'task_descripition' => 'regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/|max:200'
        ]);

        $task = new Task();
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {

        $statuses = \App\Models\Status::orderBy('name')->get();
        return view('tasks.edit', ['task' => $task, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $this->validate($request, [
            'task_name' => 'required|regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/|max:50',
            'status_id' => 'required',
            'task_descripition' => 'regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/|max:200'
            
        ]);

        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task, Request $request)
    {
        $task->delete();
        return redirect()->route('tasks.index', ['status_id' => $request->input('status_id')]);
    }
}
