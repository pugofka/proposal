<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Stage;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('tasks.index', compact('stages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create([
            'name' => $request->question,
            'stage_id' => $request->stage_id
        ]);
        return redirect(route('stages.index'))->with('status', 'Этап успешно создан');

    }

    public function storeFromApi (Request $request)
    {
//        dd($request->all());
        $task = Task::create([
            'name' => $request->name,
            'stage_id' => $request->stage
        ]);
        return response(['message'=> 'ok', 'task' => $task], 201);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $question)
    {
        //
    }
}
