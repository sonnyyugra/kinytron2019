<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Answer;
use Illuminate\Http\Request;
use Kinytron\Http\Resources\Answer as AnswerResource;

class AnswerController extends Controller
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
        $answer = new Answer();
        $answer->answer = $request->input('answer');
        $answer->user_id = $request->input('user_id');
        $answer->question_number = $request->input('question_number');
        $answer->measurement_id = $request->input('measurement_id');
        if($answer->save()){
            return new AnswerResource($answer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kinytron\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
    public function showAnswers(Request $request){
        $answers = Answer::where('user_id',$request->get('user_id'))->where('measurement_id',$request->get('measurement_id'))->get();
        return AnswerResource::collection($answers);
    }
}
