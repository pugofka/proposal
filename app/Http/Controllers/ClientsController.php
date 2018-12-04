<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::orderBy('sort')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name'  => 'required|string|max:255',
            'sort'  => 'numeric'
        ], [
            '*.required' => 'Заполните обязательное поле',
        ]);
        
        $img = $request->file('image')->store('uploads', 'public');
        
        if ($request->active)
            $active = 1;
        else
            $active = 0;

        Clients::create([
            'name'   => $request->name,
            'active' => $active,
            'image'  => $img,
            'sort'   => $request->sort
        ]);

        return redirect(route('clients.index'))->with('status', 'Клиент успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {   
        $client = Clients::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Clients $clients)
    {
        $clients = Clients::find($id);
        if ($request->file('image')) {
            $img = $request->file('image')->store('uploads', 'public');
            $clients->image = $img;
        }
        if ($request->active)
            $active = 1;
        else
            $active = 0;

        $clients->name   = $request->input('name');
        $clients->active = $active;
        $clients->sort   = $request->input('sort');
        $clients->save();
        return redirect(route('clients.index'))->with('status', 'Клиент успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        return redirect(route('clients.index'))->with('status', 'Клиент удалён.');
    }
}
