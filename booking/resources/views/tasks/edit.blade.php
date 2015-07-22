@extends('layouts.master')

@section('content')

    <h1> Modifica la prenotazione</h1>
    <p class="lead">{{  $task->cognome }} {{  $task->nome }} </p>
    <hr>




    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

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
            <td>Action</td>
        </tr>
        </thead>


        <tbody>

    {!! Form::model($task, [
    'method' => 'PATCH',
    'route' => ['tasks.update', $task->id,$task->nome, $task->cognome]
    ]) !!}

    <tr>

        <td>{!! Form::text('id', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::input('date', 'data_ora', Carbon\Carbon::now('Europe/Rome'), ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('nome', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('cognome', null, ['class' => 'form-control']) !!}</td>
        <td>
            {!!Form::hidden('visita', 0)!!}
            {!! Form::checkbox('visita') !!}
        </td>
        <td>{!! Form::checkbox('medicazione', 'si') !!}</td>
        <td>{!! Form::checkbox('sala_gessi', 'si') !!}</td>
        <td>{!! Form::checkbox('rx_prima', 'si') !!}</td>
        <td>{!! Form::checkbox('rx_dopo', 'si') !!}</td>
        <td>{!! Form::text('prenotato_da', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::submit('Aggiorna', ['class' => 'btn btn-primary']) !!}</td>
        <td><a href="{{ route('tasks.destroy') }}"class="btn btn-danger">Elimina</a></td>
    </tr>

    {!! Form::close() !!}
    <tbody>
    </table>
<div>
    <a href="{{ route('tasks.index') }}" class="btn btn-info">Back </a>
</div>
@stop
