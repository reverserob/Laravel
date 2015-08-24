@extends('layouts.master')

@section('content')

    <h1> Nuova Prenotazione</h1>


    <hr>


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

        {!! Form::open(array('action'=>'TasksController@store', 'method' => 'post')) !!}
        <tr>
            <td>{!! Form::input('date', 'data', Carbon\Carbon::today('Europe/Rome')->format('d/m/Y'), ['class' => 'form-control']) !!}</td>
            <td>{!! Form::text('cognome', null, ['class' => 'form-control']) !!}</td>
            <td>{!! Form::text('nome', null, ['class' => 'form-control']) !!}  </td>
            <td>{!! Form::text('telefono', null, ['class' => 'form-control']) !!}</td>
            <td>{!! Form::checkbox('visita', 'X') !!}</td>
            <td>{!! Form::checkbox('medicazione', 'X') !!}</td>
            <td>{!! Form::checkbox('sala_gessi', 'X') !!}</td>
            <td>{!! Form::checkbox('rx_prima', 'X') !!}</td>
            <td>{!! Form::checkbox('rx_dopo', 'X') !!}</td>
            <td>{!! Form::text('prenotato_da', null, ['class' => 'form-control']) !!}</td>
            <td>
                {!! Form::submit('Salva', ['class' => 'btn btn-small btn-success']) !!}
                {!! Form::close() !!}
            </td>
        </tr>

        </tbody>
    </table>

    <div>
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back </a>
    </div>


@stop
