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

            {!! Form::checkbox('options[]', 'visita'); !!}

        </td>
        <td>
            {!! Form::checkbox('medicazione', 'medicazione'); !!}
        </td>
        <td>
            {!! Form::checkbox('sala_gessi', 'sala_gessi'); !!}
        </td>
        <td>
            {!! Form::checkbox('rx_prima', 'rx_prima'); !!}
        </td>
        <td>
            {!! Form::checkbox('rx_dopo', 'rx_dopo'); !!}
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

-----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------



@extends('layouts.master')

@section('content')

<h1>Nuova Prenotazione</h1>

<hr>

@include('partials.alerts.errors')


@if(Session::has('flash_message'))
<div class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

{!! Form::open([
'route' => 'tasks.store'
]) !!}


<div class="col-sm-3 col-lg-5">

    <div class="form-group">
        {!! Form::label('id', 'ID Prenotazione ', ['class' => 'control-label']) !!}
        {!! Form::text('id', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('n_prenotazione', 'Prenotazione N. ', ['class' => 'control-label']) !!}
        {!! Form::text('n_prenotazione', null, ['class' => 'form-control']) !!}

        {!! Form::label('data_ora', 'Data ') !!}
        {!! Form::input('date', 'data_ora', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>


    <div class="form-inline">
        {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
        {!! Form::text('nome', null, ['class' => 'form-control'], ['placeholder' => 'Nome']) !!}

        {!! Form::label('cognome', 'Cognome:', ['class' => 'control-label']) !!}
        {!! Form::text('cognome', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Visita:', ['class' => 'control-label']) !!}


        <p>
            {!! Form::checkbox('options[]', 'Medicazione'); !!}
            {!! Form::label('medicazione', '', ['class' => 'control-label']) !!}

        </p>


        <p>
            {!! Form::checkbox('options[1]', 'sala_gessi'); !!}
            {!! Form::label('sala_gessi', '', ['class' => 'control-label']) !!}

        </p>
        <p>
            {!! Form::checkbox('options[2]', 'rx_prima'); !!}
            {!! Form::label('rx_prima', '', ['class' => 'control-label']) !!}

        </p>
        <p>
            {!! Form::checkbox('options[3]', 'rx_dopo'); !!}
            {!! Form::label('rx_dopo', '', ['class' => 'control-label']) !!}

        </p>




        <div class="form-group">

            {!! Form::label('prenotato_da', 'Prenotato da:', ['class' => 'control-label']) !!}
            {!! Form::text('prenotato_da', null, ['class' => 'form-control']) !!}

        </div>
    </div>


    {!! Form::submit('Prenota', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
@stop