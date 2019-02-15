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
                    <div class="card-header" align="center">{{$usuario->name}}</div>

                    <div class="card-body">
                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                            </tr>
                            <tr>
                                <th>
                                    Cuando los estudiantes rompen las reglas, son tratados con firmeza pero de manera justa.
                                </th>
                                <th>
                                    {{$usuario->answers->where('measurement_id',$medicion->id)->where('question_number',1)->first()->answer}}
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Mis profesores son justos.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Obedecer las reglas en mi escuela tiene beneficios.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Las reglas en mi escuela son justas.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Los profesores hacen un buen trabajo protegiendo a los estudiantes de los revoltosos.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Cuando me quejo de alguien que me está haciendo daño, los profesores me ayudan.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    En mi escuela hay reglas claras y conocidas contra la violencia.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    En mi escuela hay reglas claras y conocidas contra el acoso sexual.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Cuando los compañeros/as acosan sexualmente a otros compañeros/as, los profesores los detienen.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    En mi escuela, los estudiantes participan tomando decisiones importantes y haciendo las reglas.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    En mi escuela los estudiantes juegan un rol importante cuando se trata de hacerse cargo de problemas de violencia
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    El personal de mi escuela se esfuerza en que los estudiantes participen en las decisiones importantes.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Cuando los estudiantes tienen una emergencia (o un problema serio), un adulto siempre está allí para ayudar.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Mis profesores me respetan.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Puedo confiar en la mayoría de los adultos en esta escuela.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Mi relación con mis profesores es buena y cercana.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Los profesores en esta escuela cuidan a los estudiantes.
                                </th>
                                <th>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Me siento cómodo/a hablando con mis profesores cuando tengo un problema.
                                </th>
                                <th>

                                </th>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection