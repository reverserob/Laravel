@extends('layouts.master')

@section('content')

    @if(!empty($none))

        {!!$none!!}


        <div class="row">

            <div class="col-md-6">
                <a href="{{ route('tasks.index') }}" class="btn btn-info">Torna alle prenotazioni</a>

            </div>


        </div>

        @stop
@else
    {!!$string!!}

<table class="table table-striped table-bordered">
    <thead>
    <tr>

        <td>Data</td>
        <td>Cognome</td>
        <td>Nome</td>
        <td>Telefono</td>
        <td>Visita</td>
        <td>Medicazione</td>
        <td>Sala Gessi</td>
        <td>RX - prima</td>
        <td>RX - dopo</td>
        <td>Prenotato da</td>
        <td>Action</td>
    </tr>
    </thead>


    <tbody>
    @foreach($tasks as $task)
    <tr>
        <td>{{ $task->data}}</td>
        <td>{{ $task->cognome }}</td>
        <td>{{ $task->nome }}</td>
        <td>{{ $task->telefono}}</td>
        <td>{{ $task->visita }}</td>
        <td>{{ $task->medicazione }}</td>
        <td>{{ $task->sala_gessi }}</td>
        <td>{{ $task->rx_prima}}</td>
        <td>{{ $task->rx_dopo }}</td>
        <td>{{ $task->prenotato_da }}</td>
        <td>
            @if(Auth::user()->edit === 1)
                <a href="{{ route('tasks.edit', $task->id,$task->nome, $task->cognome) }}" class="btn btn-primary">Modifica</a>
            @elseif(Auth::user()->name ==  $task->prenotato_da)
                <a href="{{ route('tasks.edit', $task->id,$task->nome, $task->cognome) }}" class="btn btn-primary">Modifica</a>
            @else
                {!! Form::submit('X', ['class' => 'btn btn-danger', 'name'=>'overedit']) !!}
            @endif
        </td>
    @endforeach
    </tr>

    @foreach($overbooking as $over)
        <tr bgcolor="#FFCC66">
            <td>{{ $over->data}}</td>
            <td>{{ $over->cognome }}</td>
            <td>{{ $over->nome }}</td>
            <td>{{ $over->telefono }}</td>
            <td>{{ $over->visita }}</td>
            <td>{{ $over->medicazione }}</td>
            <td>{{ $over->sala_gessi }}</td>
            <td>{{ $over->rx_prima}}</td>
            <td>{{ $over->rx_dopo }}</td>
            <td>{{$over->prenotato_da }}</td>
            <td>
                @if(Auth::user()->admin !== 1)

                    {!! Form::submit('X', ['class' => 'btn btn-danger', 'name'=>'overedit']) !!}

                @else
                    {!! Form::open([ 'method' => 'get','route'=>['tasks.edit', $over->id,$over->nome,$over->cognome]])!!}
                    {!! Form::submit('Modifica', ['class' => 'btn btn-primary', 'name'=>'overedit']) !!}
                    {!! Form::close()!!}
                @endif
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

<hr>

<div class="row">

    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Torna alle prenotazioni</a>

    </div>


</div>

@stop

@endif