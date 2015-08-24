@extends('layouts.master')

@section('content')

    <h1> Modifica la prenotazione</h1>
    <p class="lead">{{  $over->cognome }} {{  $over->nome }} </p>
    <hr>
    <p>** Per Modificare La Data: Eliminare la prenotazione e Creare una nuova prenotazione.</p>
    <hr>


    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

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

        {!! Form::model($over, [
        'method' => 'PATCH',
        'route' => ['tasks.update', $over->id, $over->nome, $over->cognome]
        ]) !!}

        <tr>
            <td>{!! Form::text('data', null, ['class' => 'form-control', 'readonly']) !!}</td>
            <td>{!! Form::text('cognome', null, ['class' => 'form-control']) !!}</td>
            <td>{!! Form::text('nome', null, ['class' => 'form-control']) !!}</td>
            <td>{!! Form::text('telefono', null, ['class' => 'form-control']) !!}</td>
            <td>
                {!!Form::hidden('visita', '')!!}
                {!! Form::checkbox('visita', 'X') !!}
            </td>
            <td>{!!Form::hidden('medicazione', '')!!}
                {!! Form::checkbox('medicazione', 'X') !!}
            </td>
            <td>{!!Form::hidden('sala_gessi', '')!!}
                {!! Form::checkbox('sala_gessi', 'X') !!}
            </td>
            <td>
                {!!Form::hidden('rx_prima', '')!!}
                {!! Form::checkbox('rx_prima', 'X') !!}
            </td>
            <td>{!!Form::hidden('rx_dopo', '')!!}
                {!! Form::checkbox('rx_dopo', 'X') !!}
            </td>
            <td>{!! Form::text('prenotato_da', null, ['class' => 'form-control']) !!}</td>
            <td>
                {!! Form::submit('Aggiorna', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </td>
            <td>{!! Form::open(['onsubmit' => 'return ConfirmDelete()','method' => 'DELETE','route' => ['tasks.destroy', $over->id]]) !!}
                {!! Form::submit('Elimina', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        <tbody>
    </table>
    <div>
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back </a>
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
