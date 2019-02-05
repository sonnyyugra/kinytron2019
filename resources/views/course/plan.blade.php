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
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/1.pdf')}}" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Introducción 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i> Dibujo en Equipo</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los equipos deben ser
                                            capaz en desarrollar
                                            habilidades para lograr
                                            implementar dibujos con
                                            la finalidad de lograr la
                                            escena.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><a href="{{asset('workshops/'.$course->level.'/2.pdf')}}" style="color: #ffffff"><i class="fa fa-file-word" style="margin-left: 17px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Introducción 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i> Encontrando mi casa</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en desarrollar
                                            habilidades para lograr
                                            cumplir las instrucciones
                                            en ser inquilinos o casas.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <!-- introduccion -->
                            <!-- trabajo en equipo -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/3.pdf')}}" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Trabajo en Equipo</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir el
                                            trabajo de equipo.
                                        </p>
                                        <div class="row">
                                            @if($course->mod1 == 1)
                                                <div class="col-md-2">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-primary btn-xs pull-right disabled']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <!--  desabilitar -->
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-primary btn-xs pull-right']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                            @if($course->mod1 == 0)
                                                <div class="col-md-2">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-primary btn-xs pull-right']) !!}
                                                    {!! Form::close() !!}

                                                </div>
                                                <div class="col-md-2">
                                                    <!--  desabilitar -->
                                                    {!! Form::open(['route' => 'mod1','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-primary btn-xs pull-right disabled']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge info" id="abc" ><a href="{{asset('workshops/'.$course->level.'/4.pdf')}}" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Trabajo de Equipo 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Dibuja sin mirar</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            desarrollar la confianza
                                            en sí mismo y seguir las
                                            instrucciones que dirige
                                            el tutor.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge info" id="abc" ><a href="{{asset('workshops/'.$course->level.'/5.pdf')}}" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Trabajo en Equipo 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Guiándome</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben
                                            desarrollar la confianza
                                            entre compañeros y
                                            seguir las instrucciones
                                            que dirige el tutor.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/6.pdf')}}" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 1</h4>
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
                                                <div class="col-md-2">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod1" id="mod1" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-primary btn-xs pull-right disabled']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <!--  desabilitar -->
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod2" id="mod2" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-primary btn-xs pull-right']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                            @if($course->mod2 == 0)
                                                <div class="col-md-2">
                                                    <!-- habilitar -->
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod2" id="mod2" value="1">
                                                    {!! Form::submit('Habilitar',['class' => 'btn btn-primary btn-xs pull-right']) !!}
                                                    {!! Form::close() !!}

                                                </div>
                                                <div class="col-md-2">
                                                    <!--  desabilitar -->
                                                    {!! Form::open(['route' => 'mod2','style'=>'display:inline']) !!}
                                                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                    <input type="hidden" name="mod2" id="mod2" value="0">
                                                    {!! Form::submit('Deshabilitar',['class' => 'btn btn-primary btn-xs pull-right disabled']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!-- trabajo en equipo fin -->
                            <!-- comunicacion asertiva -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/6.pdf')}}" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Comunicación Asertiva</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            comunicación asertiva.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning" id="abc" ><a href="{{asset('workshops/'.$course->level.'/7.pdf')}}" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Comunicación Asertiva 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Situaciones</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en diferenciar e
                                            identificar las formas de
                                            comunicarse, por medio
                                            de la expresión.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning" id="abc" ><a href="{{asset('workshops/'.$course->level.'/8.pdf')}}" style="color: #ffffff"><i class="fa fa-brain" style="margin-left: 13px"></i></a> </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Comunicación Asertiva 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> La mejor forma</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en modificar los
                                            diálogos, utilizando la
                                            comunicación asertiva.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/9.pdf')}}" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 2</h4>
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
                                    </div>
                                </div>
                            </li>
                            <!-- comunicacion asertiva fin -->
                            <!-- empatia -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><a href="{{asset('workshops/'.$course->level.'/9.pdf')}}" style="color: #ffffff"><i class="fa fa-gamepad" style="margin-left: 13px"></i></a></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 3</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Empatía</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            empatía.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-indigo" id="abc" ><i class="fa fa-brain" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Empatía 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Pérfil</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz de identificar las
                                            personalidades de
                                            diferentes expresiones de
                                            comunicación.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-indigo" id="abc" ><i class="fa fa-brain" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Empatía 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Máscaras</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz de identificar los
                                            movimientos corporales
                                            de diferentes expresiones
                                            de comunicación.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><i class="fa fa-gamepad" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 3</h4>
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
                                    </div>
                                </div>
                            </li>
                            <!-- empatia fin -->
                            <!-- disciplina -->
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><i class="fa fa-gamepad" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Módulo 4</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-headset"></i> Disciplina</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en cumplir las
                                            misiones con el objetivo
                                            de lograr en percibir la
                                            disciplina.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-yellow" id="abc" ><i class="fa fa-brain" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Disciplina 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Comportamiento</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en crear las
                                            normas para mantener
                                            un buen clima de aula
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge bg-yellow" id="abc" ><i class="fa fa-brain" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Disciplina 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-smile-beam"></i> Advertencia</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en crear señales
                                            para crear conciencia de
                                            los actos.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-badge success" id="abc" ><i class="fa fa-gamepad" style="margin-left: 13px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Videojuego 4</h4>
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
                                    </div>
                                </div>
                            </li>
                            <!-- conclusion -->
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><i class="fa fa-file-word" style="margin-left: 17px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Cierre 1</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i> Organización</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en crear ideas y
                                            organizarse para
                                            presentar en la próxima
                                            sesión la intervención.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge danger" id="abc" ><i class="fa fa-file-word" style="margin-left: 17px"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Cierre 2</h4>
                                        <p><h5 class="text-muted"><i class="fa fa-flag"></i> Intervención</h5></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Los alumnos deben ser
                                            capaz en intervenir al
                                            establecimiento sobre la
                                            sana convivencia.
                                        </p>
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

@endsection