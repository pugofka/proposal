<?php

namespace App\Http\Controllers;

use App\Task;
use App\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            Validator::make($request->all(), [
                'name' => 'required|min:3',
                'task' => 'required',
            ])->validate();

            $task = Task::find($request->task);
            if (!$task)
                return response('task not found', 404);
            $variant = Variant::create([
                'name' => $request->name,
                'task_id' => $request->task
            ]);
            return response(['message'=> 'ok', 'id' => $variant->id], 201);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variant $variant)
    {
        if($request->ajax()) {
            Validator::make($request->all(), [
                'name' => 'required|min:3',
                'task' => 'required',
                'id' => 'required',
            ])->validate();

            $variant->name = $request->name;
            $variant->task_id = $request->task;
            $variant->save();

            return response(['message'=> 'ok', 'id' => $variant->id], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant, Request $request)
    {
        $variant->delete();
        if($request->ajax()) {
            return response('Variant deleted', 200);
        }

    }

}
