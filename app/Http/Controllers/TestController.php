<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Charts\UserChart;
use Kinytron\College;
use Kinytron\Course;
use Kinytron\User;
use Kinytron\Test;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Http\Request;
use Kinytron\Http\Resources\Test as TestResource;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return TestResource::collection($tests);
    }


    public function store(Request $request)
    {
        $test = new Test();
        $test->p1 = $request->input('p1');
        $test->p2 = $request->input('p2');
        $test->p3 = $request->input('p3');
        $test->p4 = $request->input('p4');
        $test->p5 = $request->input('p5');
        $test->p6 = $request->input('p6');
        $test->p7 = $request->input('p7');
        $test->p8 = $request->input('p8');
        $test->p9 = $request->input('p9');
        $test->p10 = $request->input('p10');
        $test->p11 = $request->input('p11');
        $test->p12 = $request->input('p12');
        $test->p13 = $request->input('p13');
        $test->p14 = $request->input('p14');
        $test->p15 = $request->input('p15');
        $test->p16 = $request->input('p16');
        $test->p17 = $request->input('p17');
        $test->p18 = $request->input('p18');
        $test->p19 = $request->input('p19');
        $test->p20 = $request->input('p20');
        $test->user_id = $request->input('user_id');

        $user = User::find($request->input('user_id'));
        $number = $user->test_number;
        $test->number = $number+1;
        $user->test_number = $number+1;
        if($test->save() && $user->save()){
            return new TestResource($test);
        }
    }


    public function show($id)
    {
        $test = Test::findOrFail($id);
        return new TestResource($test);
    }

    public function edit(Test $test)
    {
        //
    }

    public function update(Request $request, Test $test)
    {
        //
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        if($test->delete()){
            return new TestResource($test);
        }
    }
    public function showForm(){
        $college = Auth::user()->college->id;
        $courses = College::find($college)->courses;
        return view('test.showForm',compact('courses'));
    }
    public function searchCourse(Request $request){
        $test_number = $request->test_number;
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $chart =  new UserChart();
        $Deficiente = 0;
        $Insuficiente = 0;
        $Regular = 0;
        $Bueno = 0;
        $Muy_Bueno = 0;
        $flag = true;

        foreach ($users as $user){
            if($user->tests->where('number',$test_number)->isNotEmpty()){
                foreach($user->tests->where('number',$test_number) as $test){
                    $total = $test->p1+$test->p2+$test->p3+$test->p4+$test->p5+$test->p6+$test->p7+$test->p8+$test->p9+$test->p10+
                        $test->p11+$test->p12+$test->p13+$test->p14+$test->p15+$test->p16+$test->p17+$test->p18+$test->p19+$test->p20;
                }
                if($total >= 20 && $total <= 27){
                    $Deficiente++;
                }
                if($total >= 28 && $total <= 36){
                    $Insuficiente++;
                }
                if($total >= 37 && $total <= 45){
                    $Regular++;
                }
                if($total >= 46 && $total <= 54){
                    $Bueno++;
                }
                if($total >= 55 && $total <= 60){
                    $Muy_Bueno++;
                }
            }
        }
        $chart->displayAxes(false)->dataset('Sample', 'pie', [$Deficiente,$Insuficiente,$Regular,$Bueno,$Muy_Bueno])
            ->BackgroundColor(['red','#ff4500','yellow','#adff2f','green']);
        return view('test.showResult',compact('users','chart','course','flag','test_number'));
    }
    public function showTestText(){
        return view('test.showTestText');
    }
}
