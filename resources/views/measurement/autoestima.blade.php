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
                    <div class="card-header" align="center">Gráfico</div>

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
                                    <td>{{ $user->answers->where('measurement_id',$measurement->id)->sum('answer') }}</td>
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
