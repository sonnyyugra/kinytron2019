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
                        {!! $chart_autoestima->container() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">Resultados</div>

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
                                        <a href="{!! route('measurement.autoestima', ['measurement'=>$measurement->id, 'user'=>$user->id]) !!}">{{$user->name}}</a>
                                    </td>
                                    @php($total = $user->answers->where('measurement_id',$measurement->id)->sum('answer'))
                                    @if($total >= 20 && $total <= 27)
                                        <td bgcolor="red">{!! $total !!}</td>
                                    @elseif($total >=28 && $total <= 36)
                                        <td bgcolor="orange">{!! $total !!}</td>
                                    @elseif($total >=37 && $total <= 45)
                                        <td bgcolor="yellow">{!! $total !!}</td>
                                    @elseif($total >=46 && $total <= 54)
                                        <td bgcolor="blue">{!! $total !!}</td>
                                    @elseif($total >=55 && $total <= 60)
                                        <td bgcolor="green">{!! $total !!}</td>
                                    @else
                                        <td bgcolor="grey">No hay registros</td>
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
{!! $chart_autoestima->script() !!}
