<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Http\Resources\User;
use Kinytron\Leaderboard;
use Illuminate\Http\Request;
use Kinytron\Http\Resources\Leaderboard as LeaderboardResource;


class LeaderboardController extends Controller
{
    public function index()
    {
        $rankings = Leaderboard::orderBy('score', 'desc')->take(5)->get();
        return LeaderboardResource::collection($rankings);
    }
    public function leaderboard(Request $request)
    {
        $rankings = Leaderboard::orderBy('score', 'desc')->where('exam_id', $request->input('exam_id'))->take(5)->get();
        return LeaderboardResource::collection($rankings);
    }
    public function create()
    { }
    public function store(Request $request)
    {
        $leaderboard = new Leaderboard();
        $leaderboard->score = $request->input('score');
        $leaderboard->user_id = $request->input('user_id');
        $leaderboard->exam_id = $request->input('exam_id');
        if ($leaderboard->save()) {
            return new LeaderboardResource($leaderboard);
        }
    }
    public function show(Request $request)
    {
        $leaderboards = Leaderboard::where('user_id', $request->input('user_id'))->where('exam_id', $request->input('exam_id'))->get();
        return LeaderboardResource::collection($leaderboards);
    }
    public function edit(Request $request)
    {
        $leaderboard = Leaderboard::find($request->input('user_id'));
        $leaderboard->score = $request->input('score');
        if ($leaderboard->save()) {
            return new LeaderboardResource($leaderboard);
        }
    }
    public function update(Request $request)
    {
        $leaderboards = Leaderboard::where('user_id', $request->input('user_id'))->where('exam_id', $request->input('exam_id'))->get();
        foreach ($leaderboards as $leaderboard) {
            $leaderboard->score = $request->input('score');
            if ($leaderboard->save()) {
                return new LeaderboardResource($leaderboard);
            }
        }
    }
    public function destroy(Leaderboard $leaderboard)
    { }
}
