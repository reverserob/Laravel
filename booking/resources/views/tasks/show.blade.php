@extends('layouts.master')

@section('content')

        <h1 class="title1"> Prenotazione effettuata per: </h1>
    <h2 class="title1">{{  $task->cognome }} {{  $task->nome }} </h2>
    <hr>
    <p>** Per Modificare La Data: Eliminare la prenotazione e crearne una nuova.</p>
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
            <td>Azione</td>
            <td>Azione</td>
        </tr>
        </thead>


        <tbody>

        <tr>
            <td>{{ $task->data }}</td>
            <td>{{ $task->cognome }}</td>
            <td>{{ $task->nome }}</td>
            <td>{{ $task->telefono }}</td>
            <td>{{ $task->visita }}</td>
            <td>{{ $task->medicazione }}</td>
            <td>{{ $task->sala_gessi }}</td>
            <td>{{ $task->rx_prima}}</td>
            <td>{{ $task->rx_dopo }}</td>
            <td>{{ $task->prenotato_da }}</td>
            <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifica</a></td>
            <td>{!! Form::open([
                'onsubmit' => 'return ConfirmDelete()',
                'method' => 'DELETE',
                'route' => ['tasks.destroy', $task->id]
                ]) !!}
                {!! Form::submit('Elimina', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        </tr>
        </tbody>
    </table>

    <hr>



    <div class="row">

        <div class="col-md-6">
            <a href="{{ route('tasks.index') }}" class="btn btn-info">Torna alle prenotazioni</a>

        </div>


    </div>
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Sicuro di voler eliminare la prenotazione?");

            if (x==true)
                return true;
            else
                return false;
        }
    </script>

@stop