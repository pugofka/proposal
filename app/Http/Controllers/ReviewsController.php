<?php

namespace App\Http\Controllers;

use App\Reviews;
use Illuminate\Http\Request;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{

    public function index()
    {   
        $reviews  = Reviews::orderBy('sort')->get();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('image')->store('uploads', 'public');
    
        if ($request->active)
            $active = 1;
        else
            $active = 0;

        Reviews::create([
            'name'   => $request->name,
            'active' => $active,
            'image'  => $img,
            'sort'   => $request->sort
        ]);

        return redirect(route('reviews.index'))->with('status', 'Отзыв успешно добавлен');
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
        $review = Reviews::find($id);
        return view('reviews.edit', compact('review'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Reviews $reviews)
    {
        $reviews = Reviews::find($id);
        if ($request->file('image')) {
            $img = $request->file('image')->store('uploads', 'public');
            $reviews->image = $img;
        }
        if ($request->active)
            $active = 1;
        else
            $active = 0;

        $reviews->name   = $request->input('name');
        $reviews->sort   = $request->input('sort');
        $reviews->active = $active;
        $reviews->save();
        return redirect(route('reviews.index'))->with('status', 'Отзыв успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Reviews $review)
    {
        $review->delete();
        return redirect(route('reviews.index'))->with('status', 'Отзыв удалён.');
    }
}
