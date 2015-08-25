@extends('layouts.master')

@section('content')
    @if(isset($_GET['overedit']))

        <h1 class="title1"> Modifica la prenotazione di: </h1>
        <h3  class="title1">{{  $over->cognome }} {{  $over->nome }} </h3>
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

            {!! Form::model($over, [
            'method' => 'PATCH',
            'route' => ['tasks.update', $over->id, $over->nome, $over->cognome]
            ]) !!}

            <tr bgcolor="#FFCC66">
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
                <td>{!! Form::text('prenotato_da',Auth::user()->name,array('class' => 'form-control', 'readonly')) !!}</td>
                <td>
                    {!! Form::submit('Aggiorna', ['class' => 'btn btn-primary', 'name'=>'overupdate']) !!}
                    {!! Form::close() !!}
                </td>
                <td>{!! Form::open(['onsubmit' => 'return ConfirmDelete()','method' => 'DELETE','route' => ['overbookings.destroy', $over->id]]) !!}
                    {!! Form::submit('Elimina',  ['class' => 'btn btn-danger', 'value'=>'overdelete']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>


    @else

    <h1 class="title1"> Modifica la prenotazione</h1>
    <h2 class="title1">{{  $task->cognome }} {{  $task->nome }} </h2>
    <hr>
    <p>** Per Modificare La Data: Eliminare la prenotazione e crearne una nuova.</p>
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


    {!! Form::model($task, [
    'method' => 'PATCH',
    'route' => ['tasks.update', $task->id,$task->nome, $task->cognome]
    ]) !!}

    <tr>
        <td>{!! Form::text('data', null, ['class' => 'form-control', 'readonly']) !!}</td>
        <td>{!! Form::text('cognome', null, array('class' => 'form-control','required')) !!}</td>
        <td>{!! Form::text('nome', null, array('class' => 'form-control','required')) !!}</td>
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
        <td>{!! Form::text('prenotato_da',Auth::user()->name,array('class' => 'form-control', 'readonly')) !!}</td>
        <td>
            {!! Form::submit('Aggiorna', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </td>
        <td>


            {!! Form::open(['onsubmit' => 'return ConfirmDelete()','method' => 'DELETE','route' => ['tasks.destroy', $task->id]]) !!}
            {!! Form::submit('Elimina', array('class' => 'btn btn-danger','value'=>'delete')) !!}
            {!! Form::close() !!}
        </td>
    </tr>
        @endif
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
