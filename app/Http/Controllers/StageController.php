<?php

namespace App\Http\Controllers;

use App\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'numeric' => 'Поле :attribute должно быть числом',
        ];


        $this->validate($request, [
            'name' => 'required',
            'sort' => 'required|numeric',
        ], $messages);

        if ($request->active)
            $active = 1;
        else
            $active = 0;

        dd($request->all());

        Stage::create([
            'name' => $request->name,
            'sort' => $request->sort,
            'active' =>$active
        ]);
        return redirect(route('stages.index'))->with('status', 'Этап успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        return view('stages.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        if ($request->active)
            $active = 1;
        else
            $active = 0;

        $stage->name = $request->name;
        $stage->sort = $request->sort;
        $stage->active = $active;

        $stage->save();

        return redirect(url()->previous())->with('status', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return redirect(route('stages.index'))->with('status', 'Этап удалён с возможностью восстановления.');
    }
}
