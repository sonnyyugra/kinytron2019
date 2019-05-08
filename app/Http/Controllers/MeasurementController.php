<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Kinytron\Charts\Autoestima;
use Kinytron\Charts\Clima;
use Kinytron\Charts\ComunicacionAsertiva;
use Kinytron\Charts\Disciplina;
use Kinytron\Charts\Empatia;
use Kinytron\Charts\IndAutoestima;
use Kinytron\Charts\IndClima;
use Kinytron\Charts\IndComunicacionAsertiva;
use Kinytron\Charts\IndDisciplina;
use Kinytron\Charts\IndEmpatia;
use Kinytron\Charts\IndividualClima;
use Kinytron\Charts\IndTrabajoEnEquipo;
use Kinytron\Charts\TrabajoEnEquipo;
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
                if($score <= 1.6 && $score > 0){
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
        if($measurement->exam_id == 2){
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
        if($measurement->exam_id == 3){
            $chart_TrabajoEnEquipo = new TrabajoEnEquipo();
            $muy_bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = $user->answers->where('measurement_id',$measurement->id)->sum('answer');

                if($score >= 7 && $score <=11){
                    $insuficiente++;
                }
                if($score >= 12 && $score <=16){
                    $regular++;
                }
                if($score >= 17 && $score <=21){
                    $muy_bueno++;
                }
            }
            $chart_TrabajoEnEquipo->displayAxes(false)->dataset('Sample', 'doughnut', [$insuficiente,$regular,$muy_bueno])->BackgroundColor(['red','yellow','green']);;
            return view('measurement.trabajo_en_equipo',compact('measurement','chart_TrabajoEnEquipo'));
        }
        if($measurement->exam_id == 4){
            $chart_ComunicacionAsertiva = new ComunicacionAsertiva();
            $muy_bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = $user->answers->where('measurement_id',$measurement->id)->sum('answer');

                if($score >= 7 && $score <=11){
                    $insuficiente++;
                }
                if($score >= 12 && $score <=16){
                    $regular++;
                }
                if($score >= 17 && $score <=21){
                    $muy_bueno++;
                }
            }
            $chart_ComunicacionAsertiva->displayAxes(false)->dataset('Sample', 'doughnut', [$insuficiente,$regular,$muy_bueno])->BackgroundColor(['red','yellow','green']);;
            return view('measurement.comunicacion_asertiva',compact('measurement','chart_ComunicacionAsertiva'));
        }
        if($measurement->exam_id == 5){
            $chart_Empatia = new Empatia();
            $muy_bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = $user->answers->where('measurement_id',$measurement->id)->sum('answer');
                if($score >= 7 && $score <=11){
                    $insuficiente++;
                }
                if($score >= 12 && $score <=16){
                    $regular++;
                }
                if($score >= 17 && $score <=21){
                    $muy_bueno++;
                }
            }
            $chart_Empatia->displayAxes(false)->dataset('Sample', 'doughnut', [$insuficiente,$regular,$muy_bueno])->BackgroundColor(['red','yellow','green']);;
            return view('measurement.empatia',compact('measurement','chart_Empatia'));
        }
        if($measurement->exam_id == 6){
            $chart_Disciplina = new Disciplina();
            $muy_bueno = 0;
            $regular = 0;
            $insuficiente = 0;
            foreach ($measurement->course->users as $user){
                $score = $user->answers->where('measurement_id',$measurement->id)->sum('answer');
                if($score >= 7 && $score <=11){
                    $insuficiente++;
                }
                if($score >= 12 && $score <=16){
                    $regular++;
                }
                if($score >= 17 && $score <=21){
                    $muy_bueno++;
                }
            }
            $chart_Disciplina->displayAxes(false)->dataset('Sample', 'doughnut', [$insuficiente,$regular,$muy_bueno])->BackgroundColor(['red','yellow','green']);;
            return view('measurement.disciplina',compact('measurement','chart_Disciplina'));
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
    public function trabajo($measurement,$user){
        $individual = new IndTrabajoEnEquipo();
        $si = 0; // SI
        $a_veces = 0; // A veces
        $no = 0; // No
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if($answer->answer == 1){
                $no++;
            }
            if($answer->answer == 2){
                $a_veces++;
            }
            if($answer->answer == 3){
                $si++;
            }
        }
        $preguntas = collect([
            "¿Prefieres trabajar con tus compañeros(as)?",
            "¿Te gusta trabajar con compañeros(as) para lograr realizar la tarea en conjunta?",
            "¿Te gusta trabajar con compañeros(as) y ser comprometidos en realizar la tarea?",
            "¿Al momento de trabajar con compañeros(as), se distribuyen tareas para agilizar el proceso?",
            "¿Cuándo hay diferentes opiniones, se llega a consenso para tomar decisiones?",
            "¿Cuándo trabajas con tus compañeros(as) existe confianza?",
            "¿Cuándo trabajas con tus compañeros(as) existe apoyo mutuo?",
            "¿Eres tolerante con las demás opiniones que no estás de acuerdo?",
            "¿Cuándo te designa una tarea por parte de tus compañeros(as), la cumples a tiempo?",
            "¿Cuándo alguno de los integrantes de tu equipo necesitan ayuda, tú le brindas apoyo?",
            "¿Eres capaz de reconocer y operar en los conflictos, para lograr un acuerdo mutuo?",
            "¿Me siento cómodo en trabajar en equipo?",
            "¿Acepto las críticas de mis compañeros(as)?",
            "¿Por lo general nos distribuimos los materiales para que cada uno traiga algo?",
            "¿Las clases son más entretenidas cuando se trabaja en grupos?",
            "¿Aprendo más compartiendo mis aprendizajes con los demás compañeros(as)?",
            "¿Existen compañeros(as) que no les gusta trabajar en grupo?",
            "¿Existen compañeros(as) que no les gusta cooperar?",
            "¿Te gustaría que los grupos de trabajo fueran al azar?",
            "¿Crees que sirve de algo trabajar en grupo con diferentes compañeros(as)?",
            "¿Crees que trabajar en grupo te ayudará en el futuro?",
            "¿Permanezco sentado hasta que todos hayan tenido su grupo de trabajo?",
            "¿Me gusta tener iniciativa para reintegrarme en un grupo?",
            "¿Me siento motivado en lograr cumplir el trabajo en grupo?",
            "¿Son divertidos los trabajos en grupo que se realizan en clases?",
            "¿Mi profesor(a) realiza muchos trabajos en grupo dentro de clases?",
            "¿A la hora de presentar el trabajo o presentación, cada uno cooperó?",
            "¿Crees que con trabajar en grupo desarrollarás habilidades sociales?",
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$no,$a_veces,$si])->BackgroundColor(['red','yellow','green']);
        return view('measurement.trabajoShow',compact('medicion','usuario','preguntas','individual'));
    }
    public function comunicacion($measurement,$user){
        $individual = new IndComunicacionAsertiva();
        $si = 0; // SI
        $a_veces = 0; // A veces
        $no = 0; // No
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if($answer->answer == 1){
                $no++;
            }
            if($answer->answer == 2){
                $a_veces++;
            }
            if($answer->answer == 3){
                $si++;
            }
        }
        $preguntas = collect([
            "¿Escucho activamente a mis compañeros(as) cuando me hablan?",
            "¿Hablas de temas que tu otro(a) compañero(a) le gusta?",
            "¿Existe una buena comunicación entre yo y mis compañeros(as)?",
            "¿Existe una buena comunicación entre yo y mi profesor(a)?",
            "¿Los profesores toman en cuenta mi opinión?",
            "¿Mis compañeros toman en cuenta mi opinión?",
            "¿Se faltan el respeto entre mis compañeros(as)?",
            "¿Existe modalidad de turnos para la conversación en el curso?",
            "¿Existe respeto de turno, a la hora de conversar?",
            "¿Trato de llegar a una solución a través de una conversación tranquila?",
            "¿Cuándo alguien es injusto, usted le dice algo?",
            "¿Siempre tratas de no tener problemas con nadie?",
            "¿Tratas de no decir tu opinión frente a tus compañeros(as) o profesores?",
            "¿Te gusta participar en clases en decir lo que aprendiste?",
            "¿Siempre te quedas callado cuando tienes dudas?",
            "¿Cuánto te pasa algo malo, frecuentemente le cuentas a tus padres?",
            "¿Cuándo te sientes en peligro, dudas en contarle a alguien?",
            "¿Prefiere quedarte callado antes de meterse en problema?",
            "¿Sí alguien lo está amenazando, usted le dice a alguien?",
            "¿Consideras que cada compañero(a) tiene derecho de decir su opinión?",
            "¿Consideras que cada compañero(a) tiene derecho de respetar su opinión?",
            "¿Cuándo te sientes incomodo con alguien, tratas de decirle a alguien?",
            "Si alguien, te dice: “No digas nada”, ¿Te quedas callado?",
            "¿Sí todos los días alguien te empieza molestar, tú te quedas callado?",
            "¿Tienes problemas en expresar tu enojo?",
            "¿Tratas de decir tus molestias de una forma asertiva?",
            "¿Me cuesta pedir disculpa, cuando cometo un error?",
            "¿Por lo general trato de controlarme, cuando estoy enojado(a)?",
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$no,$a_veces,$si])->BackgroundColor(['red','yellow','green']);
        return view('measurement.comunicacionShow',compact('medicion','usuario','preguntas','individual'));
    }
    public function empatia($measurement,$user){
        $individual = new IndEmpatia();
        $si = 0; // SI
        $a_veces = 0; // A veces
        $no = 0; // No
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if ($answer->answer == 1) {
                $no++;
            }
            if ($answer->answer == 2) {
                $a_veces++;
            }
            if ($answer->answer == 3) {
                $si++;
            }
        }
        $preguntas = collect([
            "¿Entiendo cómo se siente mi compañero(a)?",
            "¿Cuándo veo algún compañero(a) que se siente mal, le pregunto?",
            "¿Le busco una solución a mi compañero(a) cuando lo veo mal?",
            "¿Dejas que algún compañero(a) exprese lo que siente?",
            "¿Eres capaz de sentir lo mismo que siente tu compañero(a)?",
            "¿Mis compañeros toman en cuenta mi opinión?",
            "¿Por lo general, mis compañeros(as) se ríen de lo que expresan los demás?",
            "¿Sí veo que alguien le molesta algo, trato de avisar a los demás?",
            "¿Sí ves que algún compañero(a) no le gusta tu conducta, paras de hacerlo?",
            "¿Eres de esas personas que no oyes a las personas?",
            "¿Eres de esas personas que finge que estas oyendo a la persona?",
            "¿Siempre tratas de no tener problemas con nadie?",
            "¿Tratas de decir tu opinión frente a tus compañeros(as) o profesores?",
            "¿Sueles ayudar a los demás a satisfacer sus deseos?",
            "¿Siempre te quedas callado, cuando ves alguna situación que no corresponde?",
            "¿Imagino la escena cuando alguien me cuenta algún problema?",
            "¿Me cuesta conectarme con los sentimientos de mi compañero(a)?",
            "¿Me hago una ligera idea de cómo se debe sentir mi compañero(a)?",
            "¿Sí alguien lo está amenazando, usted le dice a alguien?",
            "¿Me fijo en cómo lo dice y en que tono lo dice?",
            "¿Le haces preguntas a tu compañeros(as) cuando tienes dudas?",
            "¿Respetas la opinión de tu compañeros(as)?",
            "¿Te pones en el lugar de los demás?",
            "¿Te preocupan las consecuencias que traerías de tus acciones?",
            "¿Tienes problemas en comprender las situaciones de los demás?",
            "¿Tratas de subir el ánimo a tu compañero(a)?",
            "¿Sí alguien me dice algo positivo, se lo agradezco?",
            "¿Mi compañero(a) me cuenta una tontería por lo que se siente triste, lo respeto?",
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$no,$a_veces,$si])->BackgroundColor(['red','yellow','green']);
        return view('measurement.empatiaShow',compact('medicion','usuario','preguntas','individual'));
    }
    public function disciplina($measurement,$user){
        $individual = new IndDisciplina();
        $si = 0; // SI
        $a_veces = 0; // A veces
        $no = 0; // No
        $medicion = Measurement::find($measurement);
        $usuario = \Kinytron\User::find($user);
        foreach ($usuario->answers->where('measurement_id',$measurement) as $answer){
            if($answer->answer == 1){
                $no++;
            }
            if($answer->answer == 2){
                $a_veces++;
            }
            if($answer->answer == 3){
                $si++;
            }
        }
        $preguntas = collect([
            "¿Me preocupo de mis tareas de colegio?",
            "¿Me preocupo de mis tareas de la casa?",
            "¿Hago mis tareas del colegio con anticipación?",
            "¿Estudio con anticipación para las pruebas?",
            "¿Me organizo en la semana para estudiar y hacer mis tareas?",
            "¿Ordeno mi mochila un día antes?",
            "¿Organizo mi uniforme para el día siguiente?",
            "¿Aviso con anticipación los materiales que debo comprar?",
            "¿Escribo la materia en el cuaderno que corresponde?",
            "¿Sigo las instrucciones que me dicen los profesores?",
            "¿En el recreo respeto el espacio de mi compañero(a)?",
            "¿Siempre cumplo con mis deberes?",
            "¿Siempre cumplo con mis quehaceres del hogar?",
            "¿Cuándo algo te hace mal, te rindes fácilmente?",
            "¿Intentas uno y otra vez hasta que me resulta?",
            "¿Colaboras con los que quehaceres de tu casa?",
            "¿Participas frecuentemente en las actividades del colegio?",
            "¿Hago caso a mi profesor(a) cuando me llama la atención?",
            "¿Como(comer) en el recreo y no en la sala?",
            "¿Entro a clases  inmediatamente cuando toca el timbre o campana?",
            "¿Tratas de ordenar tus cosas?",
            "¿Anotas los apuntes cuando habla el profesor?",
            "¿Cuándo estudias haces resumen de toda la materia?",
            "¿Organizas los contenidos que se desarrollarán en la prueba?",
            "¿Cumples con las fechas de entrega en los trabajos?",
            "¿Tratas de realizar las tareas por sí solo?",
            "¿Tratas de estudiar por sí solo?",
            "¿Cuándo tengo duda, busco resolverlo(a) por sí solo(a)?",
        ]);
        $individual->displayAxes(false)->dataset('Sample', 'doughnut', [$no,$a_veces,$si])->BackgroundColor(['red','yellow','green']);
        return view('measurement.disciplinaShow',compact('medicion','usuario','preguntas','individual'));
    }

}
