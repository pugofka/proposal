<?php

namespace App\Http\Controllers;

use App\PersonalPage;
use Illuminate\Http\Request;

class PersonalPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personalPages.index');
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
     * @param  \App\PersonalPage  $personalPage
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalPage $personalPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalPage  $personalPage
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalPage $personalPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalPage  $personalPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalPage $personalPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalPage  $personalPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalPage $personalPage)
    {
        //
    }
}
