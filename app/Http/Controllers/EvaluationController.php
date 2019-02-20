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
        if($course->evaluations->where('workshop',$request->workshop)->where('criterio',$request->criterio)->isEmpty()){
            if($request->evaluations =! null) {
                for ($i=0;$i<count($request->users);$i++){
                    $evaluation = new Evaluation([
                        'score' => $request->input('evaluations.'.$i.''),
                        'workshop' => $request->workshop,
                        'criterio' => $request->criterio,
                        'user_id' => $request->input('users.'.$i.''),
                        'course_id' => $request->course_id
                    ]);
                    $evaluation->save();
                }
            }
        }



        $workshop = $request->workshop;
        $criterio = $request->criterio;
        switch ($workshop) {
            case 1:
                switch ($criterio){
                    case 1:
                        $course->e1c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e1c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e1c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e1c4 = 1;
                        $course->save();
                        break;
                }
            break;
            case 2:
                switch ($criterio){
                    case 1:
                        $course->e2c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e2c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e2c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e2c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 3:
                switch ($criterio){
                    case 1:
                        $course->e3c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e3c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e3c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e3c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 4:
                switch ($criterio){
                    case 1:
                        $course->e4c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e4c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e4c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e4c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 5:
                switch ($criterio){
                    case 1:
                        $course->e5c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e5c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e5c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e5c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 6:
                switch ($criterio){
                    case 1:
                        $course->e6c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e6c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e6c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e6c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 7:
                switch ($criterio){
                    case 1:
                        $course->e7c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e7c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e7c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e7c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 8:
                switch ($criterio){
                    case 1:
                        $course->e8c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e8c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e8c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e8c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 9:
                switch ($criterio){
                    case 1:
                        $course->e9c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e9c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e9c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e9c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 10:
                switch ($criterio){
                    case 1:
                        $course->e10c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e10c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e10c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e10c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 11:
                switch ($criterio){
                    case 1:
                        $course->e11c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e11c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e11c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e11c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 12:
                switch ($criterio){
                    case 1:
                        $course->e12c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e12c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e12c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e12c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 13:
                switch ($criterio){
                    case 1:
                        $course->e13c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e13c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e13c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e13c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 14:
                switch ($criterio){
                    case 1:
                        $course->e14c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e14c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e14c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e14c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 15:
                switch ($criterio){
                    case 1:
                        $course->e15c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e15c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e15c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e15c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 16:
                switch ($criterio){
                    case 1:
                        $course->e16c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e16c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e16c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e16c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 17:
                switch ($criterio){
                    case 1:
                        $course->e17c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e17c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e17c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e17c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 18:
                switch ($criterio){
                    case 1:
                        $course->e18c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e18c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e18c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e18c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 19:
                switch ($criterio){
                    case 1:
                        $course->e19c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e19c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e19c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e19c4 = 1;
                        $course->save();
                        break;
                }
            break;

            case 20:
                switch ($criterio){
                    case 1:
                        $course->e20c1 = 1;
                        $course->save();
                        break;
                    case 2:
                        $course->e20c2 = 1;
                        $course->save();
                        break;
                    case 3:
                        $course->e20c3 = 1;
                        $course->save();
                        break;
                    case 4:
                        $course->e20c4 = 1;
                        $course->save();
                        break;
                }
            break;

        }
        Session::flash('message', 'agregar');
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
        $chart_c1 =  new \Kinytron\Charts\Evaluation();
        $chart_c2 =  new \Kinytron\Charts\Evaluation();
        $chart_c3 =  new \Kinytron\Charts\Evaluation();
        $chart_c4 =  new \Kinytron\Charts\Evaluation();

        $Deficiente_c1 = 0;
        $Regular_c1 = 0;
        $Muy_Bueno_c1 = 0;

        $Deficiente_c2 = 0;
        $Regular_c2 = 0;
        $Muy_Bueno_c2 = 0;

        $Deficiente_c3 = 0;
        $Regular_c3 = 0;
        $Muy_Bueno_c3 = 0;

        $Deficiente_c4 = 0;
        $Regular_c4 = 0;
        $Muy_Bueno_c4 = 0;

        foreach ($users as $user){
            //c1
            foreach ($user->evaluations->where('workshop',$workshop_number)->where('criterio',1) as $evaluation){
                if($evaluation->score == 1){
                    $Deficiente_c1++;
                }
                if($evaluation->score == 2){
                    $Regular_c1++;
                }
                if($evaluation->score == 3){
                    $Muy_Bueno_c1++;
                }
            }
            //c2
            foreach ($user->evaluations->where('workshop',$workshop_number)->where('criterio',2) as $evaluation){
                if($evaluation->score == 1){
                    $Deficiente_c2++;
                }
                if($evaluation->score == 2){
                    $Regular_c2++;
                }
                if($evaluation->score == 3){
                    $Muy_Bueno_c2++;
                }
            }
            //c3
            foreach ($user->evaluations->where('workshop',$workshop_number)->where('criterio',3) as $evaluation){
                if($evaluation->score == 1){
                    $Deficiente_c3++;
                }
                if($evaluation->score == 2){
                    $Regular_c3++;
                }
                if($evaluation->score == 3){
                    $Muy_Bueno_c3++;
                }
            }
            //c4
            foreach ($user->evaluations->where('workshop',$workshop_number)->where('criterio',4) as $evaluation){
                if($evaluation->score == 1){
                    $Deficiente_c4++;
                }
                if($evaluation->score == 2){
                    $Regular_c4++;
                }
                if($evaluation->score == 3){
                    $Muy_Bueno_c4++;
                }
            }

        }

        $chart_c1->displayAxes(false)->dataset('Sample', 'doughnut', [$Deficiente_c1,$Regular_c1,$Muy_Bueno_c1])->BackgroundColor(['red','yellow','green']);
        $chart_c2->displayAxes(false)->dataset('Sample', 'doughnut', [$Deficiente_c2,$Regular_c2,$Muy_Bueno_c2])->BackgroundColor(['red','yellow','green']);
        $chart_c3->displayAxes(false)->dataset('Sample', 'doughnut', [$Deficiente_c3,$Regular_c3,$Muy_Bueno_c3])->BackgroundColor(['red','yellow','green']);
        $chart_c4->displayAxes(false)->dataset('Sample', 'doughnut', [$Deficiente_c4,$Regular_c4,$Muy_Bueno_c4])->BackgroundColor(['red','yellow','green']);

        return view('evaluation.showResult',compact('users','chart_c1','chart_c2','chart_c3','chart_c4','course','workshop_number'));
    }
}
