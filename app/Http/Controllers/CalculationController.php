<?php

namespace App\Http\Controllers;

use App\calculation;
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
        return view('calculation.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function show(calculation $calculation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function edit(calculation $calculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calculation $calculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(calculation $calculation)
    {
        //
    }
}
