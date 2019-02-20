<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Kinytron\Charts\Autoestima;
use Kinytron\Charts\Clima;
use Kinytron\Charts\IndAutoestima;
use Kinytron\Charts\IndClima;
use Kinytron\Charts\IndividualClima;
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
            $chart_autoestima = new Autoestima();
            $muy_bueno = 0;
            $bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            $deficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = $user->answers->where('measurement_id',$measurement->id)->sum('answer');
                if($score >= 20 && $score <=27){
                    $deficiente++;
                }
                if($score >= 28 && $score <=36){
                    $insuficiente++;
                }
                if($score >= 37 && $score <=45){
                    $regular++;
                }
                if($score >= 46 && $score <=54){
                    $bueno++;
                }
                if($score >= 55 && $score <=60){
                    $muy_bueno++;
                }
            }
            $chart_autoestima->displayAxes(false)->dataset('Sample', 'doughnut', [$deficiente,$insuficiente,$regular,$bueno,$muy_bueno])->BackgroundColor(['red','orange','yellow','blue','green']);;
            return view('measurement.autoestima',compact('measurement','chart_autoestima'));
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
        $individual = new IndClima();
        $uno = 0; // Muy de acuerdo
        $dos = 0; // De acuerdo
        $tres = 0; // Ni de acuerdo ni desacuerdo
        $cuatro = 0; // En desacuerdo
        $cinco = 0; // Muy en desacuerdo
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if($answer->answer == 1){
                $uno++;
            }
            if($answer->answer == 2){
                $dos++;
            }
            if($answer->answer == 3){
                $tres++;
            }
            if($answer->answer == 4){
                $cuatro++;
            }
            if($answer->answer == 5){
                $cinco++;
            }
        }
        $preguntas = collect([
            "Cuando los estudiantes rompen las reglas, son tratados con firmeza pero de manera justa",
            "Mis profesores son justos.",
            "Obedecer las reglas en mi escuela tiene beneficios.",
            "Las reglas en mi escuela son justas.",
            "Los profesores hacen un buen trabajo protegiendo a los estudiantes de los revoltosos.",
            "Cuando me quejo de alguien que me está haciendo daño, los profesores me ayudan.",
            "En mi escuela hay reglas claras y conocidas contra la violencia.",
            "En mi escuela hay reglas claras y conocidas contra el acoso sexual.",
            "Cuando los compañeros/as acosan sexualmente a otros compañeros/as, los profesores los detienen.",
            "En mi escuela, los estudiantes participan tomando decisiones importantes y haciendo las reglas.",
            "En mi escuela los estudiantes juegan un rol importante cuando se trata de hacerse cargo de problemas de violencia",
            "El personal de mi escuela se esfuerza en que los estudiantes participen en las decisiones importantes.",
            "Cuando los estudiantes tienen una emergencia (o un problema serio), un adulto siempre está allí para ayudar.",
            "Mis profesores me respetan.",
            "Puedo confiar en la mayoría de los adultos en esta escuela.",
            "Mi relación con mis profesores es buena y cercana.s",
            "Los profesores en esta escuela cuidan a los estudiantes.",
            "Me siento cómodo/a hablando con mis profesores cuando tengo un problema."
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$uno,$dos,$tres,$cuatro,$cinco])->BackgroundColor(['green','#adff2f','yellow','#ff4500','red']);


        return view('measurement.escalaShow',compact('medicion','usuario','preguntas','individual'));

    }
    public function autoestima($measurement,$user){
        $individual = new IndAutoestima();
        $acuerdo = 0; // Muy de acuerdo
        $nose = 0; // Nose
        $desacuerdo = 0; // Desacuerdo
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if($answer->answer == 1){
                $desacuerdo++;
            }
            if($answer->answer == 2){
                $nose++;
            }
            if($answer->answer == 3){
                $acuerdo++;
            }
        }
        $preguntas = collect([
            "Soy una persona con muchas cualidades",
            "Por lo general, si tengo algo que decir lo digo",
            "Con frecuencia meavergüenzo de mi mismo",
            "Casi siempre me siento seguro de lo que pienso",
            "En realidad, no me gusto a mi mismo",
            "Rara vez me siento culpable de cosas que he hecho",
            "Creo que la gente tiene buena opinión de mí",
            "Soy bastante feliz",
            "Me siento orgulloso de lo que hago",
            "Poca gente me hace caso",
            "Hay muchas cosas de mí que cambiaría si pudiera",
            "Me cuesta mucho trabajo hablar delante de la gente",
            "Casi nunca estoy triste",
            "Es muy difícil ser uno mismo",
            "Es fácil que yo le caiga bien a la gente",
            "Si pudiéramos volver al pasado y vivir de nuevo, yo sería distinto",
            "Por lo general, la gente me hace caso cuando los aconsejo",
            "Siempre tiene que haber alguien que me diga que hacer",
            "Con frecuencia desearía ser otra persona",
            "Me siento bastante seguro de mí mismo",
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$acuerdo,$nose,$desacuerdo])->BackgroundColor(['green','yellow','red']);
        return view('measurement.autoestimaShow',compact('medicion','usuario','preguntas','individual'));
    }
}
