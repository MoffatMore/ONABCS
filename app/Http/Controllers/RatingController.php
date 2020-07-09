<?php

namespace App\Http\Controllers;

use App\Fault;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Rating::create([
            'rating'=>$request->selected_rating,
            'user_id' => $request->expert
        ]);
        $fault = Fault::find($request->fault);
        $fault->update([
            'status'=>'Rated'
        ]);
        return redirect()->route('customer.faults')->with('success','Successfully rated an expert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return Response
     */
    public function update(Request $request,  $user)
    {
        $expert = User::find($user);
        $expert->update($request);

        return redirect()->route('customer.faults');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
