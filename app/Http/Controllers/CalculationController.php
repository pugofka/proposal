<?php

namespace App\Http\Controllers;

use App\calculation;
use App\Stage;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calculations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::get(['id', 'name']);

        $calculateData = Stage::with('tasks', 'tasks.variants')->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
//        dd($calculateData->first()->tasks);
        return view('calculations.create', compact('templates', 'calculateData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->additional_tasks);
        //Принимаем и сохраняем данные для создания нового расчёта
        if ($request->ajax()) {
//            Validator::make($request->all(), [
//                'id' => 'required',
//            ])->validate();

            Calculation::create([
                'name' => $request->name,
                'cost_per_hour' => $request->cost_per_hour,
                'user_name' => $request->user_name,
                'user_phone' => $request->user_phone,
                'user_email' => $request->user_email,
                'template_id' => $request->template_id,
                'additional_tasks' => json_encode($request->additional_tasks),
                'tasks' => json_encode($request->tasks),
                'info' => json_encode($request->info),
            ]);
            return response(['status' => 'Расчёт успешно создан'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\calculation $calculation
     * @return \Illuminate\Http\Response
     */
    public function show(calculation $calculation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calculation $calculation
     * @return \Illuminate\Http\Response
     */
    public function edit(calculation $calculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\calculation $calculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calculation $calculation)
    {
//        //Принимаем айдишник шаблона и отдаём в ответе Этапы->задачи->варианты
//        if ($request->ajax()) {
//            Validator::make($request->all(), [
//                'id' => 'required',
//            ])->validate();
//
//            $calculateData = Template::where('id', $request->id)->with('tasks', 'tasks.templates', 'tasks.variants')->get();
//            return response($calculateData, 200);
//        }
    }

    public function selectTemplate(Request $request)
    {
        //Принимаем айдишник шаблона и отдаём в ответе Этапы->задачи->варианты
        if ($request->ajax()) {
            Validator::make($request->all(), [
                'id' => 'required',
            ])->validate();

            $calculateData = Template::where('id', $request->id)->with('tasks', 'tasks.templates', 'tasks.variants')->get();
            return response($calculateData, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calculation $calculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(calculation $calculation)
    {
        //
    }
}

