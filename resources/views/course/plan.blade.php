@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">Timeline {{$course->level." ".$course->letter}}</div>
                    @if (Session::has('message'))
                        @if(Session::get('message') == 'editar')
                            <div class="alert alert-warning" role="alert">Elemento editado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'eliminar')
                            <div class="alert alert-danger" role="alert">Elemento eliminado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'agregar')
                            <div class="alert alert-success" role="alert">Elemento agregado correctamente</div>
                        @endif
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <!-- Timeline 3 basico -->
                        <ul class="timeline">
                            <!-- introduccion -->
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/1.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Autoestima académica y motivación escolar</h4>
                                        @if($course->e1c1 == 0 || $course->e1c2 == 0 || $course->e1c3 == 0|| $course->e1c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p>
                                        <h5 class="text-muted">
                                            <i class="fa fa-flag"></i>
                                            @if($course->level == 3)
                                                Dibujo en Equipo
                                            @endif
                                            @if($course->level == 4)
                                                Conoce tu compañero
                                            @endif
                                            @if($course->level == 5)
                                                Dibujo en equipo
                                            @endif
                                            @if($course->level == 6)
                                                Conoce tu compañero
                                            @endif
                                            @if($course->level == 7)
                                                Conozcámonos
                                            @endif
                                            @if($course->level == 8)
                                                ¿Cómo soy?
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los equipos deben ser
                                                capaces en desarrollar
                                                habilidades para lograr
                                                implementar dibujos con
                                                la finalidad de lograr la
                                                escena.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces de conocer a su
                                                pareja y tomar atención.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces en
                                                complementar los dibujos
                                                para obtener el resultado
                                                solicitado del paisaje.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces en conocer a su
                                                pareja y tomar atención.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces en conocerse entre
                                                ellos y con los demás,
                                                para observar sus interés
                                                y sus propósito en la
                                                vida.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces en reconocer lo
                                                mejor que tiene cada
                                                compañero(a) de su curso.
                                            @endif
                                        </p>
                                        @if($course->e1c1 == 0 || $course->e1c2 == 0 || $course->e1c3 == 0|| $course->e1c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e1c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="1" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e1c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="1" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e1c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="1" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e1c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="1" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="1">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/2.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Autoestima académica y motivación escolar</h4>
                                        @if($course->e2c1 == 0 || $course->e2c2 == 0 || $course->e2c3 == 0|| $course->e2c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p>
                                        <h5 class="text-muted"><i class="fa fa-flag"></i>
                                            @if($course->level == 3)
                                                Encontrando mi casa
                                            @endif
                                            @if($course->level == 4)
                                                Mi descripción
                                            @endif
                                            @if($course->level == 5)
                                                El perfil
                                            @endif
                                            @if($course->level == 6)
                                                Mi descripción
                                            @endif
                                            @if($course->level == 7)
                                                Escoger a un líder
                                            @endif
                                            @if($course->level == 8)
                                                Proyectarse
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces en desarrollar
                                                habilidades para lograr
                                                cumplir las instrucciones
                                                en ser inquilinos o casas.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces reconocer
                                                positivas de su
                                                compañero.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces de complementar
                                                su perfil y adivinar de
                                                quién es el perfil.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces reconocer
                                                positivas de su
                                                compañero.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces en reconocer y
                                                escoger el perfil de un
                                                líder, con la finalidad de
                                                mejorar la influencia de
                                                los comportamientos.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces en visualizarse en
                                                diez años más, teniendo
                                                claro cada uno sus
                                                propósito en la vida.
                                            @endif
                                        </p>
                                        @if($course->e2c1 == 0 || $course->e2c2 == 0 || $course->e2c3 == 0|| $course->e2c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e2c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="2" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e2c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="2" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e2c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="2" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e2c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="2" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="2">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <!-- introduccion -->
                            <!-- trabajo en equipo -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/3.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 1</h4>
                                        @if($course->e3c1 == 0 || $course->e3c2 == 0 || $course->e3c3 == 0|| $course->e3c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Trabajo en Equipo</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaces en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir el
                                            trabajo de equipo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod1 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod1 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>
                                        @if($course->e3c1 == 0 || $course->e3c2 == 0 || $course->e3c3 == 0|| $course->e3c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e3c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="3" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e3c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="3" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e3c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="3" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e3c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="3" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="3">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge info" id="abc" ><a href="{{asset('workshops/'.$course->level.'/4.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Clima de convivencia escolar</h4>
                                        @if($course->e4c1 == 0 || $course->e4c2 == 0 || $course->e4c3 == 0|| $course->e4c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p>
                                        <h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Dibuja sin mirar
                                            @endif
                                            @if($course->level == 4)
                                                Sobrevivencia
                                            @endif
                                            @if($course->level == 5)
                                                Confía en mi
                                            @endif
                                            @if($course->level == 6)
                                                Monoquemado
                                            @endif
                                            @if($course->level == 7)
                                                Excursión
                                            @endif
                                            @if($course->level == 8)
                                                Adivina
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben
                                                desarrollar la confianza
                                                en sí mismos y seguir las
                                                instrucciones que dirige
                                                el tutor.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces en organizarse
                                                para priorizar que objetos
                                                llevar en el desierto.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces en confiar en su
                                                pareja para seguir las
                                                instrucciones hasta llegar
                                                a la señalética.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces de adivinar
                                                palabras de videojuegos.
                                            @endif
                                            @if($course->level == 7)
                                                Los equipos deben
                                                desarrollar la
                                                organización entre ellos.
                                            @endif
                                            @if($course->level == 8)
                                                Los equipos deben
                                                desarrollar la
                                                organización entre ellos,
                                                para adivinar el dibujo.
                                            @endif
                                        </p>
                                        @if($course->e4c1 == 0 || $course->e4c2 == 0 || $course->e4c3 == 0|| $course->e4c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e4c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="4" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e4c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="4" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e4c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="4" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e4c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="4" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="4">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge info" id="abc" ><a href="{{asset('workshops/'.$course->level.'/5.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Clima de convivencia escolar</h4>
                                        @if($course->e5c1 == 0 || $course->e5c2 == 0 || $course->e5c3 == 0|| $course->e5c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p>
                                        <h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Guiándome
                                            @endif
                                            @if($course->level == 4)
                                                La cadena
                                            @endif
                                            @if($course->level == 5)
                                                Encontrando mi casa
                                            @endif
                                            @if($course->level == 6)
                                                Adivina las casillas
                                            @endif
                                            @if($course->level == 7)
                                                Creatividad
                                            @endif
                                            @if($course->level == 8)
                                                Encontrar el tesoro
                                            @endif

                                        </h5>
                                        </p>
                                        @if($course->e5c1 == 0 || $course->e5c2 == 0 || $course->e5c3 == 0|| $course->e5c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e5c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="5" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e5c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="5" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e5c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="5" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e5c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="5" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="5">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben
                                                desarrollar la confianza
                                                entre compañeros y
                                                seguir las instrucciones
                                                que dirige el tutor.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces en desenredarse,
                                                recordando el camino de
                                                vuelta.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces en seguir
                                                instrucciones para lograr
                                                que cada inquilino tenga
                                                su casa.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces de adivinar cada
                                                letras hasta completar
                                                conceptos sobre
                                                habilidades sociales.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben
                                                desarrollar la creatividad
                                                en realizar las acciones
                                                con los objetos escogidos.
                                            @endif
                                            @if($course->level == 8)
                                                Los equipos deben
                                                desarrollar la
                                                organización entre ellos,
                                                para encontrar el tesoro.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/6.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 1</h4>
                                        @if($course->e6c1 == 0 || $course->e6c2 == 0 || $course->e6c3 == 0|| $course->e6c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Cuestionario</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            contestar las preguntas
                                            dirigidas al trabajo en
                                            equipo para observar si
                                            han desarrollado el
                                            concepto en sí mismo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod2 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod2" id="mod2" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod2 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod2" id="mod2" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e6c1 == 0 || $course->e6c2 == 0 || $course->e6c3 == 0|| $course->e6c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e6c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="6" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e6c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="6" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e6c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="6" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e6c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="6" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="6">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- trabajo en equipo fin -->
                            <!-- comunicacion asertiva -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/7.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 2</h4>
                                        @if($course->e7c1 == 0 || $course->e7c2 == 0 || $course->e7c3 == 0|| $course->e7c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Comunicación Asertiva</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaces en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            comunicación asertiva.
                                        </p>
                                        <div class="row">
                                            @if($course->mod3 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod3','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod3" id="mod3" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod3 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod3','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod3" id="mod3" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e7c1 == 0 || $course->e7c2 == 0 || $course->e7c3 == 0|| $course->e7c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e7c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="7" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e7c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="7" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e7c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="7" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e7c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="7" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="7">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning" id="abc" ><a href="{{asset('workshops/'.$course->level.'/8.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Participación y formación ciudadana</h4>
                                        @if($course->e8c1 == 0 || $course->e8c2 == 0 || $course->e8c3 == 0|| $course->e8c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Situaciones
                                            @endif
                                            @if($course->level == 4)
                                                Rol de Personaje
                                            @endif
                                            @if($course->level == 5)
                                                Controlar las emociones
                                            @endif
                                            @if($course->level == 6)
                                                La caja comunicativa
                                            @endif
                                            @if($course->level == 7)
                                                Haz tu propio teatro
                                            @endif
                                            @if($course->level == 8)
                                                Personalidades
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces en diferenciar e
                                                identificar las formas de
                                                comunicarse, por medio
                                                de la expresión.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben
                                                identificar las
                                                personalidades de cada
                                                personaje.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben
                                                capaces en responder las
                                                preguntas de manera
                                                asertiva.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben
                                                capaces de escribir sus
                                                malestares de forma
                                                asertiva.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben
                                                recordar la escena del
                                                videojuego entre la
                                                conversación de Athom
                                                y Jefe.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben
                                                identificar las
                                                personalidades de cada
                                                personaje del videojuego
                                                Kinytron, Athom y Jefe.
                                            @endif
                                        </p>
                                        @if($course->e8c1 == 0 || $course->e8c2 == 0 || $course->e8c3 == 0|| $course->e8c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e8c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="8" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e8c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="8" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e8c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="8" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e8c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="8" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="8">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning" id="abc" ><a href="{{asset('workshops/'.$course->level.'/9.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Participación y formación ciudadana</h4>
                                        @if($course->e9c1 == 0 || $course->e9c2 == 0 || $course->e9c3 == 0|| $course->e9c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                La mejor forma
                                            @endif
                                            @if($course->level == 4)
                                                Actuar y resolver
                                            @endif
                                            @if($course->level == 5)
                                                Asertivo, pasivo y agresivo
                                            @endif
                                            @if($course->level == 6)
                                                ¿Cuál comunicación soy?
                                            @endif
                                            @if($course->level == 7)
                                                ¿Que harías, sí?
                                            @endif
                                            @if($course->level == 8)
                                                Juego de rol
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces en modificar los
                                                diálogos, utilizando la
                                                comunicación asertiva.                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben
                                                identificar las
                                                interpretaciones de
                                                comunicación.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben
                                                identificar las
                                                interpretaciones de
                                                comunicación.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben
                                                identificar cuál
                                                comunicación me
                                                identifica en mi vida
                                                diaria.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben
                                                arreglar situaciones de
                                                escenas, para poner en
                                                práctica la comunicación
                                                asertiva.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben
                                                interpretar roles para
                                                identificar personajes.
                                            @endif

                                        </p>
                                        @if($course->e9c1 == 0 || $course->e9c2 == 0 || $course->e9c3 == 0|| $course->e9c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e9c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="9" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e9c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="9" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e9c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="9" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e9c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="9" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="9">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/10.pdf')}}" target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 2</h4>
                                        @if($course->e10c1 == 0 || $course->e10c2 == 0 || $course->e10c3 == 0|| $course->e10c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Cuestionario</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            contestar las preguntas
                                            dirigidas a la comunicacion
                                            asertiva para observar si
                                            han desarrollado el
                                            concepto en sí mismo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod4 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod4','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod4" id="mod4" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod4 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod4','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod4" id="mod4" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e10c1 == 0 || $course->e10c2 == 0 || $course->e10c3 == 0|| $course->e10c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e10c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="10" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e10c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="10" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e10c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="10" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e10c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="10" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="10">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- comunicacion asertiva fin -->
                            <!-- empatia -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/11.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 3</h4>
                                        @if($course->e11c1 == 0 || $course->e11c2 == 0 || $course->e11c3 == 0|| $course->e11c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Empatía</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaces en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            empatía.
                                        </p>
                                        <div class="row">
                                            @if($course->mod5 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod5','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod5" id="mod5" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod5 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod5','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod5" id="mod5" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e11c1 == 0 || $course->e11c2 == 0 || $course->e11c3 == 0|| $course->e11c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e11c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="11" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e11c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="11" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e11c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="11" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e11c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="11" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="11">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-indigo" id="abc" ><a href="{{asset('workshops/'.$course->level.'/12.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Clima de convivencia escolar</h4>
                                        @if($course->e12c1 == 0 || $course->e12c2 == 0 || $course->e12c3 == 0|| $course->e12c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Pérfil
                                            @endif
                                            @if($course->level == 4)
                                                Expresa tu dibujo
                                            @endif
                                            @if($course->level == 5)
                                                Ser empático
                                            @endif
                                            @if($course->level == 6)
                                                El ovillo empático
                                            @endif
                                            @if($course->level == 7)
                                                Kinytron
                                            @endif
                                            @if($course->level == 8)
                                                Acontecimientos
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces de identificar las
                                                personalidades de
                                                diferentes expresiones de
                                                comunicación.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces de recrear el
                                                dibujo de empatía en
                                                representación.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces de identificar
                                                que parte de la escena del
                                                videojuego se presenta la
                                                empatía.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces de conocer y
                                                saber lo que le ocurre a la
                                                persona antes de juzgarlo
                                                por la apariencia.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces en empatizar a
                                                kinytron en colocarse en
                                                el lugar de él y sentir lo
                                                que siente él.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces en empatizar las
                                                situaciones que se viven
                                                a diario.
                                            @endif
                                        </p>

                                        @if($course->e12c1 == 0 || $course->e12c2 == 0 || $course->e12c3 == 0|| $course->e12c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e12c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="12" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e12c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="12" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e12c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="12" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e12c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="12" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="12">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-indigo" id="abc" ><a href="{{asset('workshops/'.$course->level.'/13.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Clima de convivencia escolar</h4>
                                        @if($course->e13c1 == 0 || $course->e13c2 == 0 || $course->e13c3 == 0|| $course->e13c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Máscaras
                                            @endif
                                            @if($course->level == 4)
                                                Describir el objeto
                                            @endif
                                            @if($course->level == 5)
                                                Ponte en sus zapatos
                                            @endif
                                            @if($course->level == 6)
                                                Mi carácter
                                            @endif
                                            @if($course->level == 7)
                                                Conflictos
                                            @endif
                                            @if($course->level == 8)
                                                Resolver los acontecimientoss
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces de identificar los
                                                movimientos corporales
                                                de diferentes expresiones
                                                de comunicación.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces de reconocer el
                                                objeto de su
                                                compañero(a) y describir
                                                su personalidad de forma
                                                positiva.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces de empatizar con
                                                sus compañero(a) y
                                                ponerse los zapatos de él
                                                o ella.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces de interpretar el
                                                carácter de su
                                                compañero(a) de manera
                                                asertiva.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces de empatizar los
                                                conflictos que presenta a
                                                cada compañero(a) y
                                                llegar a solucionarlo de
                                                manera asertiva.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces de empatizar los
                                                conflictos para
                                                resolverlos de manera
                                                asertiva.
                                            @endif

                                        </p>

                                        @if($course->e13c1 == 0 || $course->e13c2 == 0 || $course->e13c3 == 0|| $course->e13c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e13c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="13" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e13c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="13" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e13c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="13" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e13c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="13" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="13">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/14.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 3</h4>
                                        @if($course->e14c1 == 0 || $course->e14c2 == 0 || $course->e14c3 == 0|| $course->e14c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Cuestionario</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            contestar las preguntas
                                            dirigidas a la empatía para observar si
                                            han desarrollado el
                                            concepto en sí mismo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod6 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod6','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod6" id="mod6" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod6 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod6','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod6" id="mod6" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e14c1 == 0 || $course->e14c2 == 0 || $course->e14c3 == 0|| $course->e14c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e14c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="14" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e14c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="14" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e14c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="14" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e14c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="14" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="14">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- empatia fin -->
                            <!-- disciplina -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/15.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 4</h4>
                                        @if($course->e15c1 == 0 || $course->e15c2 == 0 || $course->e15c3 == 0|| $course->e15c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Disciplina</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaces en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            disciplina.
                                        </p>
                                        <div class="row">
                                            @if($course->mod7 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod7','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod7" id="mod7" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>

                                            @endif
                                            @if($course->mod7 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod7','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod7" id="mod7" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e15c1 == 0 || $course->e15c2 == 0 || $course->e15c3 == 0|| $course->e15c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e15c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="15" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e15c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="15" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e15c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="15" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e15c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="15" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="15">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-yellow" id="abc" ><a href="{{asset('workshops/'.$course->level.'/16.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Hábitos de vida saludable</h4>
                                        @if($course->e16c1 == 0 || $course->e16c2 == 0 || $course->e16c3 == 0|| $course->e16c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Excursión
                                            @endif
                                            @if($course->level == 4)
                                                Nuevos hábitos
                                            @endif
                                            @if($course->level == 5)
                                                Hidratación
                                            @endif
                                            @if($course->level == 6)
                                                Recorrido
                                            @endif
                                            @if($course->level == 7)
                                                Disciplina en hábitos
                                            @endif
                                            @if($course->level == 8)
                                                Beneficio de hidratación
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces de utilizar la disciplina
                                                como hábito de vida saludable
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces en
                                                identificar que alimentos son
                                                saludables para reducir alteraciones
                                                del cuerpo humano
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces en
                                                tomar conciencia en la
                                                cantidad de agua que necesitan
                                                para hidratarse correctamente
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces en tomar
                                                conciencia del hábito
                                                de vida saludable como
                                                la disciplina
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces de reconocer
                                                que alimentos son saludables
                                                para prevenir enfermedades
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben
                                                ser capaces de tomar
                                                conciencia en hidratarse
                                            @endif
                                        </p>
                                        @if($course->e16c1 == 0 || $course->e16c2 == 0 || $course->e16c3 == 0|| $course->e16c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e16c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="16" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e16c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="16" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e16c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="16" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e16c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="16" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="16">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-yellow" id="abc" ><a href="{{asset('workshops/'.$course->level.'/17.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Hábitos de vida saludable</h4>
                                        @if($course->e17c1 == 0 || $course->e17c2 == 0 || $course->e17c3 == 0|| $course->e17c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i>
                                            @if($course->level == 3)
                                                Alimentos saludables
                                            @endif
                                            @if($course->level == 4)
                                                Carbohidratos
                                            @endif
                                            @if($course->level == 5)
                                                El agua
                                            @endif
                                            @if($course->level == 6)
                                                Comer bien
                                            @endif
                                            @if($course->level == 7)
                                                Tipos de carbohidrato
                                            @endif
                                            @if($course->level == 8)
                                                Buena hidratación
                                            @endif

                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces en saber
                                                que alimentos consumir
                                                de lunes a viernes para obtener una
                                                vida saludable
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces de saber que
                                                carbohidratos son saludables
                                                y tomar conciencia de la
                                                cantidad que deberían
                                                consumir
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben
                                                ser capaces de identificar
                                                los beneficios del agua
                                                y la cantidad de agua recomendable
                                                que deben consumir
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser capaces de crear
                                                hábitos saludables como disciplina diaria
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser capaces
                                                de identificar los tipos de
                                                carbohidratos
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser capaces
                                                en saber cuanta agua debemos tomar
                                                para obtener una buena hidratación
                                            @endif

                                        </p>

                                        @if($course->e17c1 == 0 || $course->e17c2 == 0 || $course->e17c3 == 0|| $course->e17c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e17c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="17" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e17c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="17" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e17c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="17" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e17c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="17" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="17">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/18.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 4</h4>
                                        @if($course->e18c1 == 0 || $course->e18c2 == 0 || $course->e18c3 == 0|| $course->e18c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Cuestionario</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            contestar las preguntas
                                            dirigidas a la disciplina
                                            para observar si
                                            han desarrollado el
                                            concepto en sí mismo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod8 == 1)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    <button class="btn btn-pill btn-block btn-success disabled" type="button">Habilitar</button>
                                                    {!! Form::open(['route' => 'mod8','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod8" id="mod8" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-pill btn-block btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                            @if($course->mod8 == 0)
                                                <div class="col-md-12">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod8','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod8" id="mod8" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-pill btn-block btn-success']) !!}
                                                    {!! Form::close() !!}
                                                    <button class="btn btn-pill btn-block btn-danger disabled" type="button">Deshabilitar</button>

                                                </div>
                                            @endif
                                        </div>

                                        @if($course->e18c1 == 0 || $course->e18c2 == 0 || $course->e18c3 == 0|| $course->e18c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e18c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="18" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e18c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="18" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e18c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="18" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e18c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="18" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="18">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <!-- conclusion -->
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/19.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Autoestima acádemica y motivación escolar</h4>
                                        @if($course->e19c1 == 0 || $course->e19c2 == 0 || $course->e19c3 == 0|| $course->e19c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i>
                                            @if($course->level == 3)
                                                Organización
                                            @endif
                                            @if($course->level == 4)
                                                Organización
                                            @endif
                                            @if($course->level == 5)
                                                Organización
                                            @endif
                                            @if($course->level == 6)
                                                Organización
                                            @endif
                                            @if($course->level == 7)
                                                Organización
                                            @endif
                                            @if($course->level == 8)
                                                Organización
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces en crear ideas y
                                                organizarse para
                                                presentar en la próxima
                                                sesión la intervención.
                                            @endif
                                        </p>

                                        @if($course->e19c1 == 0 || $course->e19c2 == 0 || $course->e19c3 == 0|| $course->e19c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e19c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="19" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e19c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="19" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e19c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="19" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e19c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="19" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="19">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/20.pdf')}}"  target="_blank" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Autoestima acádemica y motivación escolar</h4>
                                        @if($course->e20c1 == 0 || $course->e20c2 == 0 || $course->e20c3 == 0|| $course->e20c4 == 0)
                                            <span class="badge badge-pill badge-secondary pull-right">No evaluado</span>
                                        @else
                                            <span class="badge badge-pill badge-success pull-right">Evaluado</span>
                                        @endif
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i>
                                            @if($course->level == 3)
                                                Intervención
                                            @endif
                                            @if($course->level == 4)
                                                Intervención
                                            @endif
                                            @if($course->level == 5)
                                                Intervención
                                            @endif
                                            @if($course->level == 6)
                                                Intervención
                                            @endif
                                            @if($course->level == 7)
                                                Intervención
                                            @endif
                                            @if($course->level == 8)
                                                Intervención
                                            @endif
                                        </h5>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            @if($course->level == 3)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                            @if($course->level == 4)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                            @if($course->level == 5)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                            @if($course->level == 6)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                            @if($course->level == 7)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                            @if($course->level == 8)
                                                Los alumnos deben ser
                                                capaces de intervenir el
                                                establecimiento educacional sobre la
                                                sana convivencia.
                                            @endif
                                        </p>

                                        @if($course->e20c1 == 0 || $course->e20c2 == 0 || $course->e20c3 == 0|| $course->e20c4 == 0)
                                            <div class="row">
                                                <div class="btn-group col-md-12" role="group" aria-label="First group">
                                                    @if($course->e20c1 == 0)
                                                        <button type="button" class="btn bg-orange" data-toggle="modal" data-whatever="20" data-criterio="1" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Atención</button>
                                                    @else
                                                        <button class="btn bg-orange disabled" type="button">Atención</button>
                                                    @endif
                                                    @if($course->e20c2 == 0)
                                                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-whatever="20" data-criterio="2" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Participación</button>
                                                    @else
                                                        <button class="btn bg-cyan disabled" type="button">Participación</button>
                                                    @endif
                                                    @if($course->e20c3 == 0)
                                                        <button type="button" class="btn bg-teal" data-toggle="modal" data-whatever="20" data-criterio="3" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Expresión</button>
                                                    @else
                                                        <button class="btn bg-teal disabled" type="button">Expresión</button>
                                                    @endif
                                                    @if($course->e20c4 == 0)
                                                        <button type="button" class="btn bg-red" data-toggle="modal" data-whatever="20" data-criterio="4" data-level="{{$course->level}}" data-target="#evaluarAlumnos">Aplicación</button>
                                                    @else
                                                        <button class="btn bg-red disabled" type="button">Aplicación</button>
                                                    @endif
                                                </div>

                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => 'searchEvaluation','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="workshop_number" id="workshop_number" value="20">
                                                    {!! Form::button('<i class="fa fa-chart-pie"></i> Ver Estadísticas', ['type' => 'submit', 'class' => 'btn btn-pill btn-block btn-dark'] )  !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <!-- conclusion -->

                        </ul>
                        <!-- Fin Timeline 3 basico -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EVALUCION MODAL -->
    <div id="evaluarAlumnos" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Evalua el desempeño de tu curso {{$course->level." ".$course->letter}} </h4>
                </div>
                {!! Form::open(['route' => 'evaluation.store']) !!}
                <div class="modal-body">
                    <div>
                        <p id="texto">

                        </p>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>   </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Nombre del alumno</th>
                            <th>Calificación</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name." ".$user->lastname}}</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="evaluations[{{$loop->index}}]" value="1"> Deficiente
                                        </label>
                                        <label class="btn btn-secondary active">
                                            <input type="radio" name="evaluations[{{$loop->index}}]" value="2" checked> Regular
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="evaluations[{{$loop->index}}]" value="3"> Muy Bueno
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="evaluations[{{$loop->index}}]" value="0"> Ausente
                                        </label>
                                    </div>
                                    <input type="hidden" name="users[{{$loop->index}}]" value="{{$user->id}}">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="workshop" id="workshop" value="">
                    <input type="hidden" name="criterio" id="criterio" value="">
                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">



                </div>
                <div class="modal-footer">
                    {{ Form::submit('Enviar Evaluación', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- TERMINO MODAL EVALUATION -->
@endsection