<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Task;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $tasks = Task::all();

        return view('tasks.index')->withTasks($tasks);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tasks = Task::all();
        return view('tasks.create')->withTasks($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


    public function store(Request $request)
    {
       // dd($request->all());

        $this->validate($request, [
            'nome' => 'required',
            'cognome' => 'required',
            'ora' => 'required',
            'prenotato_da' => 'required',
            ]);

        $input = $request->all();

        Task::create($input);

       // Session::flash('flash_message', 'Task successfully added!');

       // return redirect()->back();

        return redirect()->route('tasks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $task = Task::findOrFail($id);

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */


    public function update($id, Request $request)
    {
        $task = Task::findOrFail($id);

        $this->validate($request, [
            'id' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'prenotato_da' => 'required',
        ]);

        $input = $request->all();

        $task->fill($input)->save();

      //  Session::flash('flash_message', 'Task successfully added!');

       // return redirect()->back();

        return view('tasks.show')->withTask($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */



    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

       // Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');
    }
}
