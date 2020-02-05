<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->user_type == 5){
            $quantityEvaluations = 0;
            $quantityAnswers = 0;
            $college = Auth::user()->college;
            $courses = $college->courses;
            $users = $college->users->where('user_type',3);
            $quantityUsers = $college->users->where('user_type',3)->count();
            $quantityCourses = $college->courses->count();
            $quantityMeasurements = $college->measurements->count();
            foreach($college->courses as $course){
                $quantityEvaluations = $quantityEvaluations + $course->evaluations->count();
            }
            foreach($users as $user){
                $quantityAnswers = $quantityAnswers + $user->answers->count();
            }
            return view('home',compact('quantityUsers','quantityCourses','quantityEvaluations','quantityAnswers','courses','quantityMeasurements'));

        }
        if(Auth::user()->user_type == 10){
            return redirect('/college');
        }
        if(Auth::user()->user_type == 3){
            // return redirect('/intro');
            Auth::logout();
            return redirect('/login');
        }
    }
}
