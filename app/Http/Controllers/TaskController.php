<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Stage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('variants')->get();
        $stages = Stage::all();
        return view('tasks.index', compact('stages', 'tasks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            Validator::make($request->all(), [
                'name' => 'required|min:3',
                'stage' => 'required',
            ])->validate();

            $stage = Stage::find($request->stage);
            if (!$stage)
                return response('stage not found', 400);

            $task = Task::create([
                'name' => $request->name,
                'stage_id' => $request->stage
            ]);

            // @todo add updates templates
            return response(['message' => 'ok', 'id' => $task->id], 201);
        }

        Task::create([
            'name' => $request->question,
            'stage_id' => $request->stage_id
        ]);
        // @todo add updates templates

        return redirect(route('stages.index'))->with('status', 'Этап успешно создан');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            Validator::make($request->all(), [
                'name' => 'required|min:3',
                'stage' => 'required',
                'id' => 'reqiured'
            ])->validate();

            $task = Task::find($id);
            if (!$task)
                return response('Task not found', 404);

            $stage = Stage::find($request->stage);
            if (!$stage)
                return response('stage not found', 400);

            $task->name = $request->name;
            $task->stage_id = $request->stage;

            $task->save();

            // @todo add updates templates
            //

            return response(['message' => 'ok', 'id' => $task->id], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, Request $request)
    {
        $task->delete();
        if($request->ajax()) {
            return response('task deleted', 200);
        }
    }

}
