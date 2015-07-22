@extends('layouts.master')

@section('content')

    <h1> Tutte le Prenotazioni</h1>
    <p class="lead">
        Ieri <a href="{{ route('tasks.create') }}">{{ Carbon\Carbon::yesterday('Europe/Rome')}}</a>
        <span class="glyphicon glyphicon-chevron-left"></span>

        Oggi <a href="{{ route('tasks.create') }}">{{ Carbon\Carbon::now('Europe/Rome')}}</a>
        <span class="glyphicon glyphicon-chevron-right"></span>
        Domani <a href="{{ route('tasks.create') }}">{{ Carbon\Carbon::tomorrow('Europe/Rome')}}</a>
    </p>

    <hr>
    <div>
        {!! Form::open(array('action'=>'TasksController@show', 'method' => 'post')) !!}
        {!! Form::submit('Mostra', ['class' => 'btn btn-small btn-success']) !!}
        {!! Form::close() !!}

        {!! Form::open(array('action'=>'TasksController@edit', 'method' => 'post')) !!}
        {!! Form::submit('Modifica', ['class' => 'btn btn-small btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <hr>

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

        @for ($i = 0; $i <=35; $i++)
            {!! Form::open(array('action'=>'TasksController@store', 'method' => 'post')) !!}
            <tr>
                <td>
                    {{ $i }}</td>
                <td>
                    {!! Form::input('date', 'data_ora', Carbon\Carbon::now('Europe/Rome'), ['class' => 'form-control']) !!}
                </td>

                <td>
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}  </td>
                </td>

                <td>
                    {!! Form::text('cognome', null, ['class' => 'form-control']) !!}</td>

                </td>
                <td>
                    {!! Form::checkbox('visita', 'si') !!}
                </td>
                <td>
                    {!! Form::checkbox('medicazione', 'si') !!}
                </td>
                <td>
                    {!! Form::checkbox('sala_gessi', 'si') !!}
                </td>
                <td>
                    {!! Form::checkbox('rx_prima', 'si') !!}
                </td>
                <td>
                    {!! Form::checkbox('rx_dopo', 'si') !!}
                </td>
                <td>

                    {!! Form::text('prenotato_da', null, ['class' => 'form-control']) !!}</td>
                </td>
                <td>
                    {!! Form::submit('Salva', ['class' => 'btn btn-small btn-success']) !!}
                    {!! Form::close() !!}


                </td>


            </tr>

        @endfor

        </tbody>

    </table>




@stop
