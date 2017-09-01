<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Stage;
use App\Template;
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
        $templates = Template::get();
        $stages = Stage::with('tasks', 'tasks.variants')->get();

        return view('tasks.index', compact('stages', 'templates'));
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
                'templates' => 'array'
            ])->validate();

            $stage = Stage::find($request->stage);
            if (!$stage)
                return response('stage not found', 400);

            $task = Task::create([
                'name' => $request->name,
                'stage_id' => $request->stage
            ]);

            try {
                $task->templates()->attach($request->templates);
            }
            catch (\PDOException  $e) {
                return response('Не верные параметры шаблона', 400);
            }
            catch (\Exception  $e) {
                return response('some error', 400);
            }

            return response(['message' => 'ok', 'id' => $task->id], 201);
        }


        $task = Task::create([
            'name' => $request->name,
            'stage_id' => $request->stage
        ]);


        $task->templates()->attach($request->templates);

        return redirect(route('stages.index'))->with('status', 'Этап успешно создан');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            Validator::make($request->all(), [
                'name' => 'required|min:3',
                'stage' => 'required',
                'id' => 'required',
                'templates' => 'array'
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
            try {
                $task->templates()->sync($request->templates);
            }
            catch (\PDOException  $e) {
                return response('Не верные параметры шаблона', 400);
            }
            catch (\Exception  $e) {
                return response('some error', 400);
            }


            return response(['message' => 'ok', 'id' => $task->id], 200);
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
