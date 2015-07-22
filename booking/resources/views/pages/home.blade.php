@extends('layouts.master')

@section('content')

    <h1>Prenotazioni</h1>
    <p class="lead">



    </p>

    <hr>

    <a href="{{ route('tasks.index') }}" class="btn btn-info">Tutte le Prenotazioni</a>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nuova Prenotazione</a>

@stop