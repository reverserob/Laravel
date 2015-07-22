@extends('layouts.master')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Data e Ora</td>
            <td>Nome</td>
            <td>Cognome</td>
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

        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->data_ora }}</td>
            <td>{{ $task->nome }}</td>
            <td>{{ $task->cognome }}</td>
            <td>{{ $task->visita }}</td>
            <td>{{ $task->medicazione }}</td>
            <td>{{ $task->sala_gessi }}</td>
            <td>{{ $task->rx_prima}}</td>
            <td>{{ $task->rx_dopo }}</td>
            <td>{{ $task->prenotato_da }}</td>
            <td>
                <a href="{{ route('tasks.show', $task->id, $task->nome, $task->cognome ) }}" class="btn btn-info">View </a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
            </td>

        </tr>
        </tbody>
    </table>

    <hr>

    <div class="row">

        <div class="col-md-6">
            <a href="{{ route('tasks.index') }}" class="btn btn-info">Torna alle prenotazioni</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifica</a>
        </div>

        <div class="col-md-6 text-right">
            {!! Form::open([
            'method' => 'DELETE',
            'route' => ['tasks.destroy', $task->id]
            ]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    </div>

@stop