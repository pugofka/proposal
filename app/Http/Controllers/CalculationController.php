<?php

namespace App\Http\Controllers;

use App\calculation;
use App\Stage;
use App\Template;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::get(['id', 'name']);

        return $calculateData = Stage::with('tasks', 'tasks.variants')->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
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
        //
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
        //Принимаем айдишник шаблона и отдаём в ответе Этапы->задачи->варианты
        if ($request->ajax()) {
            Validator::make($request->all(), [
                'id' => 'required',
            ])->validate();
            $calculateData = Stage::with('tasks', 'tasks.variants');
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
