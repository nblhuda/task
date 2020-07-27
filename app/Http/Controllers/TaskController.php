<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET index the main page of for /tasks route.
        $tasks = Task::all();
        return view('tasks.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET create will be the method we use to generate a page where we can create new tasks.
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST store will be the method we use to handle POST data from the task creation, and store it in the database.
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
          ]);
        
          $input = $request->all();
        
          Task::create($input);
        
          Session::flash('flash_message', 'Task successfully added!');
        
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //GET show will be the method used to show a single task.
        $task = Task::find($id);
        return view('tasks.show')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //GET edit will be the method used to allow us to edit an existing task.
        $task = Task::find($id);
        return view('tasks.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //PUT/PATCH update will be the method that gets called for updating an existing task.
        
        $task = Task::find($id);

        $this->validate($request, [
            'title' => 'required',
        '   description' => 'required'
        ]);

        $input = $request->all();

        $task->fill($input)->save();

        Session::flash('flash_message', 'Task successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE destroy delete the task.
    }
}
