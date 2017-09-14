<?php

namespace App\Http\Controllers;

use App\Calculation;
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
        $calculations = Calculation::get();
        return view('calculations.index', compact('calculations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::get(['id', 'name']);
        return view('calculations.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $calculateData = Calculation::where('id', $calculation->id)->get();
        return view('calculations.show', compact('calculation', $calculateData));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calculation $calculation
     * @return \Illuminate\Http\Response
     */
    public function edit(Calculation $calculation)
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
    public function update(Request $request, Calculation $calculation)
    {
        if ($request->ajax()) {

//            $messages = [
//                'required' => 'Поле :attribute обязательно к заполнению.',
//                'numeric' => 'Поле :attribute должно быть числом',
//            ];
//
//            $this->validate($request, [
//                'name' => 'required|string|min:1',
//                'sort' => 'required|numeric',
//            ], $messages);

            $calculation->name = $request->name;
            $calculation->cost_per_hour = $request->cost_per_hour;
            $calculation->user_name = $request->user_name;
            $calculation->user_phone = $request->user_phone;
            $calculation->user_email = $request->user_email;
            $calculation->template_id = $request->template_id;
            $calculation->additional_tasks = json_encode($request->additional_tasks);
            $calculation->tasks = json_encode($request->tasks);
            $calculation->info = json_encode($request->info);
            $calculation->save();

        }
    }

    public function selectTemplate(Request $request)
    {
        //Принимаем айдишник шаблона и отдаём в ответе Этапы->задачи->варианты
        if ($request->ajax()) {
            Validator::make($request->all(), [
                'id' => 'required',
            ])->validate();

            $calculateData = Template::where('id', $request->id)->with('tasks', 'tasks.templates', 'tasks.variants')->get();
            dd($calculateData);
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

