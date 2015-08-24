@extends('layouts.master')

@section('content')

    {!!$none!!}

<table class="table table-striped table-bordered">
    <thead>
    <tr>

        <td>Data</td>
        <td>Cognome</td>
        <td>Nome</td>
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
        <td>{{ $task->visita }}</td>
        <td>{{ $task->medicazione }}</td>
        <td>{{ $task->sala_gessi }}</td>
        <td>{{ $task->rx_prima}}</td>
        <td>{{ $task->rx_dopo }}</td>
        <td>{{ $task->prenotato_da }}</td>
        <td>

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifica</a>
        </td>
        @endforeach
    </tr>
    </tbody>
</table>

<hr>

<div class="row">

    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Torna alle prenotazioni</a>

    </div>


</div>

@stop