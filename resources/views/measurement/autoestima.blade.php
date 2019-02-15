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
                    <div class="card-header" align="center">Mediciones</div>
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
                    <div class="card-body">
                        <table id="example"  style="width:100%" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th title="Soy una persona con muchas cualidades">1</th>
                                <th title="Por lo general, si tengo algo que decir lo digo">2</th>
                                <th title="Con frecuencia meavergüenzo de mi mismo">3</th>
                                <th title="Casi siempre me siento seguro de lo que pienso">4</th>
                                <th title="En realidad, no me gusto a mi mismo">5</th>
                                <th title="Rara vez me siento culpable de cosas que he hecho">6</th>
                                <th title="Creo que la gente tiene buena opinión de mí">7</th>
                                <th title="Soy bastante feliz">8</th>
                                <th title="Me siento orgulloso de lo que hago">9</th>
                                <th title="Poca gente me hace caso">10</th>
                                <th title="Hay muchas cosas de mí que cambiaría si pudiera">11</th>
                                <th title="Me cuesta mucho trabajo hablar delante de la gente">12</th>
                                <th title="Casi nunca estoy triste">13</th>
                                <th title="Es muy difícil ser uno mismo">14</th>
                                <th title="Es fácil que yo le caiga bien a la gente">15</th>
                                <th title="Si pudiéramos volver al pasado y vivir de nuevo, yo sería distinto">16</th>
                                <th title="Por lo general, la gente me hace caso cuando los aconsejo">17</th>
                                <th title="Siempre tiene que haber alguien que me diga que hacer">18</th>
                                <th title="Con frecuencia desearía ser otra persona">19</th>
                                <th title="Me siento bastante seguro de mí mismo">20</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($measurement->course->users as $user)
                                <tr>
                                    <td>{{ $user->name." ".$user->lastname }}</td>
                                    @for($i=1;$i<21;$i++)
                                        <td>
                                            @php($value = $user->answers->where('measurement_id',$measurement->id)->where('question_number',$i)->first())
                                            {{
                                                $value['answer']
                                            }}
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th title="Soy una persona con muchas cualidades">1</th>
                                <th title="Por lo general, si tengo algo que decir lo digo">2</th>
                                <th title="Con frecuencia meavergüenzo de mi mismo">3</th>
                                <th title="Casi siempre me siento seguro de lo que pienso">4</th>
                                <th title="En realidad, no me gusto a mi mismo">5</th>
                                <th title="Rara vez me siento culpable de cosas que he hecho">6</th>
                                <th title="Creo que la gente tiene buena opinión de mí">7</th>
                                <th title="Soy bastante feliz">8</th>
                                <th title="Me siento orgulloso de lo que hago">9</th>
                                <th title="Poca gente me hace caso">10</th>
                                <th title="Hay muchas cosas de mí que cambiaría si pudiera">11</th>
                                <th title="Me cuesta mucho trabajo hablar delante de la gente">12</th>
                                <th title="Casi nunca estoy triste">13</th>
                                <th title="Es muy difícil ser uno mismo">14</th>
                                <th title="Es fácil que yo le caiga bien a la gente">15</th>
                                <th title="Si pudiéramos volver al pasado y vivir de nuevo, yo sería distinto">16</th>
                                <th title="Por lo general, la gente me hace caso cuando los aconsejo">17</th>
                                <th title="Siempre tiene que haber alguien que me diga que hacer">18</th>
                                <th title="Con frecuencia desearía ser otra persona">19</th>
                                <th title="Me siento bastante seguro de mí mismo">20</th>
                            </tr>
                            </tfoot>
                        </table>

                        <!-- modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection