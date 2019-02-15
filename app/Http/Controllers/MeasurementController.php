<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Kinytron\Charts\Clima;
use Kinytron\Exam;
use Kinytron\Http\Resources\Course;
use Kinytron\Http\Resources\User;
use Kinytron\Measurement;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Session;
use Kinytron\Http\Resources\Measurement as MeasurementResource;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college_id = Auth::user()->college->id;
        $measurements = Measurement::where('college_id',$college_id)->orderBy('created_at', 'desc')->get();
        return view('measurement.index',compact('measurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Auth::user()->college->courses->pluck('full_name','id');
        $exams = Exam::all()->pluck('name','id');
        return view('measurement.create',compact('courses','exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bandera = 0;
        $measurements = Auth::user()->college->measurements->where('active',1)->where('course_id',$request->get('course_id'));
        foreach ($measurements as $measurement){
            if($measurement->exam_id == $request->get('exam_id')){
                $bandera = 1;
            }
        }
        if ($bandera == 1){
            Session::flash('message','error');
            //Alert::error('Actualmente tienes una medición activa con los mismos parametros', 'ERROR');
            return redirect('/measurement/create');
        }
        else{
            $measurement = new Measurement();
            $measurement->exam_id = $request->get('exam_id');
            $measurement->course_id = $request->get('course_id');
            $measurement->active = 1;
            $measurement->user_id = Auth::user()->id;
            $measurement->college_id = Auth::user()->college->id;
            if($measurement->save()){
                Session::flash('message','agregar');
                //Alert::success('Medición agregada correctamente', 'Bien!');
                return redirect('/measurement');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kinytron\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        if($measurement->exam_id == 1){
            $chart_escala = new Clima();
            $bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = round($user->answers->where('measurement_id',$measurement->id)->avg('answer'),1);
                if($score <= 1.6){
                    $bueno++;
                }
                if($score >= 1.7 && $score <= 3.3){
                    $regular++;
                }
                if($score >= 3.4){
                    $insuficiente++;
                }
            }
            $chart_escala->displayAxes(false)->dataset('Sample', 'doughnut', [$bueno,$regular,$insuficiente])->BackgroundColor(['green','yellow','red']);

            return view('measurement.escala',compact('measurement','chart_escala'));
        }
        else{
            return view('measurement.autoestima',compact('measurement'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        //
    }
    public function inactive(Measurement $measurement){
        $measurement->active = 0;
        if($measurement->save()){
            Session::flash('message','editar');
            //Alert::success('Medición finalizada correctamente', 'Bien!');
            return redirect('/measurement');
        }
    }
    public function consult(Request $request){
        $measurements = Measurement::where('active',1)->where('course_id',$request->get('course_id'))->get();
        return MeasurementResource::collection($measurements);
    }
    public function escala($measurement , $user){
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        return view('measurement.escalaShow',compact('medicion','usuario'));

    }
}
