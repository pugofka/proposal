<?php

namespace App\Http\Controllers;

use App\Stage;
use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates=Template::get();
        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
        ];

        $this->validate($request, [
            'name' => 'required|string|min:1',
        ], $messages);

        $template = Template::create([
            'name' => $request->name
        ]);

        return redirect(route('templates.edit', ['id' => $template->id]))->with('status', 'Шаблон '.$template->name.' успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        $stages = Stage::with('tasks', 'tasks.variants', 'tasks.templates_data')->get();
        return view('templates.show', compact('template', 'stages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
        ];


        $this->validate($request, [
            'name' => 'required|string|min:1',
        ], $messages);

        $template->name = $request->name;

        $template->save();

        return redirect(url()->previous())->with('status', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect(route('templates.index'))->with('status', 'Шаблон deleted!');
    }
}
