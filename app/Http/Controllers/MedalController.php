<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Medal;
use Illuminate\Http\Request;
use Kinytron\Http\Resources\Medal as MedalResource;


class MedalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medals = Medal::all();
        return MedalResource::collection($medals);
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
     * @param  \Kinytron\Medal  $medal
     * @return \Illuminate\Http\Response
     */
    public function show(Medal $medal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\Medal  $medal
     * @return \Illuminate\Http\Response
     */
    public function edit(Medal $medal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\Medal  $medal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medal $medal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\Medal  $medal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medal $medal)
    {
        //
    }
    public function showMedals(Request $request){
        $user = \Kinytron\User::find($request->user_id);
        $medals = $user->medals;
        return MedalResource::collection($medals);
    }
    public function attachMedal(Request $request){
        $user = \Kinytron\User::find($request->user_id);
        $user->medals()->attach($request->medal_id);
        return "success";

    }
}
