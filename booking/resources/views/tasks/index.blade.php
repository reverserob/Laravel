@extends('layouts.master')

@section('content')

    <h1> Tutte le Prenotazioni</h1>
    <p class="lead">

        <?php $d=strtotime("yesterday");
        echo date("d-m-Y", $d)?>
            <a href="{{ route('tasks.index') }}"> <span class="glyphicon glyphicon-chevron-left"></span></a>

       Oggi {{ Carbon\Carbon::now('Europe/Rome')}}

            <a href="{{ route('tasks.index') }}"> <span class="glyphicon glyphicon-chevron-right"></span></a>
       <?php $d=strtotime("tomorrow");
        echo date("d-m-Y", $d)?>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <?php $d=strtotime("+3 Months");
            echo "+3 Mesi da oggi - ".date("d-m-Y", $d) . "<br>";
            ?>




    </p>

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

        @foreach($tasks as $task)
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
                    <a href="{{ route('tasks.edit', $task->id,$task->nome, $task->cognome) }}" class="btn btn-primary">Modifica</a>

                </td>

            </tr>
@endforeach


        </tbody>

    </table>




@stop
