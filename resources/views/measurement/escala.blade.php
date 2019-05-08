@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="py-4">
        <div class="row" align="center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">Gráfico de {{ $measurement->exam->name }} del curso {{ $measurement->course->getFullNameAttribute() }}</div>

                    <div class="card-body">
                        {!! $chart_escala->container() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">Resultados</div>
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
                                <th>Resultado</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($measurement->course->users as $user)
                                <tr>
                                    <td>
                                        <a href="{!! route('measurement.escala', ['measurement'=>$measurement->id, 'user'=>$user->id]) !!}">{{$user->name}}</a>
                                    </td>
                                    @php($total = round($user->answers->where('measurement_id',$measurement->id)->avg('answer'),1))
                                    @if($total >= 3.4 && $total <= 5)
                                        <td bgcolor="red">{!! $total !!}</td>
                                    @elseif($total >=1.7 && $total <= 3.3)
                                        <td bgcolor="yellow">{!! $total !!}</td>
                                    @elseif($total >=1 && $total <= 1.6)
                                        <td bgcolor="green">{!! $total !!}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Resultado</th>
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
{!! $chart_escala->script() !!}
