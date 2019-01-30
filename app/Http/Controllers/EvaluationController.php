<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Charts\EvaluationChart;
use Kinytron\Course;
use Kinytron\Evaluation;
use Kinytron\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kinytron\College;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
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
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        if($course->evaluations->where('workshop',$request->workshop)->isEmpty()){
            if($request->evaluations =! null){
                for ($i=0;$i<count($request->users);$i++){
                    $evaluation = new Evaluation([
                        'score' => $request->input('evaluations.'.$i.''),
                        'workshop' => $request->workshop,
                        'user_id' => $request->input('users.'.$i.''),
                        'course_id' => $request->course_id
                    ]);
                    $evaluation->save();
                }
            }
        }

        $workshop = $request->workshop;
        switch ($workshop) {
            case 1:
                $course->e1 = 1;
                $course->save();
            break;
            case 2:
                $course->e2 = 1;
                $course->save();
                break;
            case 3:
                $course->e3 = 1;
                $course->save();
                break;
            case 4:
                $course->e4 = 1;
                $course->save();
                break;
            case 5:
                $course->e5 = 1;
                $course->save();
                break;
            case 6:
                $course->e6 = 1;
                $course->save();
                break;
            case 7:
                $course->e7 = 1;
                $course->save();
                break;
            case 8:
                $course->e8 = 1;
                $course->save();
                break;
            case 9:
                $course->e9 = 1;
                $course->save();
                break;
            case 10:
                $course->e10 = 1;
                $course->save();
                break;
            case 11:
                $course->e11 = 1;
                $course->save();
                break;
            case 12:
                $course->e12 = 1;
                $course->save();
                break;
            case 13:
                $course->e13 = 1;
                $course->save();
                break;
            case 14:
                $course->e14 = 1;
                $course->save();
                break;
            case 15:
                $course->e15 = 1;
                $course->save();
                break;
            case 16:
                $course->e16 = 1;
                $course->save();
                break;
            case 17:
                $course->e17 = 1;
                $course->save();
                break;
            case 18:
                $course->e18 = 1;
                $course->save();
                break;
            case 19:
                $course->e19 = 1;
                $course->save();
                break;
            case 20:
                $course->e20 = 1;
                $course->save();
                break;
            case 21:
                $course->e21 = 1;
                $course->save();
                break;
            case 22:
                $course->e22 = 1;
                $course->save();
                break;
            case 23:
                $course->e23 = 1;
                $course->save();
                break;
            case 24:
                $course->e24 = 1;
                $course->save();
                break;
        }
        Session::flash('message', 'agregar');
        $course = Course::find($request->course_id);
        return view('course.plan',compact('course','users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kinytron\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
    public function selectCourse(){
        $college = Auth::user()->college->id;
        $courses = College::find($college)->courses;
        return view('evaluation.selectCourse',compact('courses'));
    }
    public function uno(Request $request){
        $course = Course::find($request->course_id);
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        return view('evaluation.1',compact('course','users'));
    }
    public function searchEvaluation(Request $request){
        $workshop_number = $request->workshop_number;
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $chart =  new EvaluationChart();
        $Deficiente = 0;
        $Regular = 0;
        $Muy_Bueno = 0;

        foreach ($users as $user){
            foreach ($user->evaluations->where('workshop',$workshop_number) as $evaluation){
                if($evaluation->score == 1){
                    $Deficiente++;
                }
                if($evaluation->score == 2){
                    $Regular++;
                }
                if($evaluation->score == 3){
                    $Muy_Bueno++;
                }
            }
        }
        $chart->displayAxes(false)->dataset('Sample', 'pie', [$Deficiente,$Regular,$Muy_Bueno])
            ->BackgroundColor(['red','yellow','green']);
        return view('evaluation.showResult',compact('users','chart','course','workshop_number'));
    }
}
