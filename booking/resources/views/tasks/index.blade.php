@extends('layouts.master')

@section('content')

    <h1 class="title1"> Prenotazioni del {{ $day }}</h1>



    <hr>

        <div class="container">
            <div class="row">
                <div class='col-sm-3'>
                    <div class="inline-form">
                        {!! Form::open(array('action'=>'TasksController@index', 'method' => 'get', 'class'=>'inline-form')) !!}

                        <div class='input-group date' id='datepicker'>

                            <input type='text' id="datepicker-el" class="form-control" placeholder="{{ $day }}" name="data" required/>
                            <span class="input-group-addon">
                                {!! Form::button('<i class="glyphicon glyphicon-arrow-right"></i>', array('type' => 'submit', 'class' => 'specialButton')) !!}
                                {!! Form::close() !!}
                            </span>
                        </div>




                    </div>

                </div>
            </div>
        </div>


    <div class="inline-form" id="search">
    {!! Form::open(array('action'=>'TasksController@index', 'method' => 'get', 'class'=>'inline-form')) !!}
    {!! Form::text('search', null, ['class' => 'inline-form' ,'placeholder'=>'Inserisci Cognome ..', 'required']) !!}
    {!! Form::submit('Cerca', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
    </div>

    <hr>


    <table class="table table-striped table-bordered" >
        <thead>
        <tr>
            <td>Riga</td>
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
        </tr>
        </thead>

        <tbody>

        @foreach($tasks as $task)

                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{ $task->data}}</td>
                    <td>{{ $task->cognome }}</td>
                    <td>{{ $task->nome }}</td>
                    <td>{{ $task->telefono }}</td>
                    <td>{{ $task->visita }}</td>
                    <td>{{ $task->medicazione }}</td>
                    <td>{{ $task->sala_gessi }}</td>
                    <td>{{ $task->rx_prima}}</td>
                    <td>{{ $task->rx_dopo }}</td>
                    <td>{{ $task->prenotato_da }}</td>
                    <td>
                    @if(Auth::user()->edit === 1)
                        <a href="{{ route('tasks.edit', $task->id,$task->nome, $task->cognome) }}" class="btn btn-primary">Modifica</a>
                    @elseif(Auth::user()->name ==  $task->prenotato_da)
                        <a href="{{ route('tasks.edit', $task->id,$task->nome, $task->cognome) }}" class="btn btn-primary">Modifica</a>
                    @else
                        {!! Form::submit('X', ['class' => 'btn btn-danger', 'name'=>'overedit']) !!}
                    @endif
                    </td>
                </tr>

        @endforeach

        @while($counter<=35)
            {!! Form::open(array('action'=>'TasksController@store', 'method' => 'post')) !!}

                <tr>
                    <td>{{$counter++}}</td>
                    <td>{!! Form::text('data',$day, array('class' => 'form-control', 'value'=> $day , 'readonly')) !!}</td>
                    <td>{!! Form::text('cognome', null, array('class' => 'form-control', 'required','placeholder'=>'cognome')) !!}</td>
                    <td>{!! Form::text('nome', null, array('class' => 'form-control','required', 'placeholder'=>'nome')) !!}  </td>
                    <td>{!! Form::text('telefono', null, array('class' => 'form-control', 'placeholder'=>'telefono','placeholder'=>'telefono')) !!}</td>
                    <td>{!! Form::checkbox ('visita', 'X') !!}</td>
                    <td>{!! Form::checkbox('medicazione', 'X') !!}</td>
                    <td>{!! Form::checkbox('sala_gessi', 'X') !!}</td>
                    <td>{!! Form::checkbox('rx_prima', 'X') !!}</td>
                    <td>{!! Form::checkbox('rx_dopo', 'X') !!}</td>
                    <td>{!! Form::text('prenotato_da',Auth::user()->name,array('class' => 'form-control', 'readonly')) !!}</td>
                    <td>
                        {!! Form::submit('Prenota', ['class' => 'btn btn-small btn-success', 'name'=>'prenotazioni']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endwhile


        @foreach($overbooking as $over)
        <tr bgcolor="#FFCC66">
            <td>{{$counter++}}</td>
            <td>{{ $over->data}}</td>
            <td>{{ $over->cognome }}</td>
            <td>{{ $over->nome }}</td>
            <td>{{ $over->telefono }}</td>
            <td>{{ $over->visita }}</td>
            <td>{{ $over->medicazione }}</td>
            <td>{{ $over->sala_gessi }}</td>
            <td>{{ $over->rx_prima}}</td>
            <td>{{ $over->rx_dopo }}</td>
            <td>{{$over->prenotato_da }}</td>
            <td>
                @if(Auth::user()->admin !== 1)

                    {!! Form::submit('X', ['class' => 'btn btn-danger', 'name'=>'overedit']) !!}

                    @else
                    {!! Form::open([ 'method' => 'get','route'=>['tasks.edit', $over->id,$over->nome,$over->cognome]])!!}
                    {!! Form::submit('Modifica', ['class' => 'btn btn-primary', 'name'=>'overedit']) !!}
                    {!! Form::close()!!}
                @endif
            </td>
        </tr>
        @endforeach



        @while($counter===36)
        {!! Form::open(array('onsubmit' => 'return Confirm()','action'=>'TasksController@store', 'method' => 'post')) !!}
        <tr  bgcolor="#FFCC66" >
            <td>{{$counter++}}</td>
            <td>{!! Form::text('data',$day, array('class' => 'form-control', 'value'=> $day ,'readonly' )) !!}</td>
            <td>{!! Form::text('cognome', null, $value) !!}</td>
            <td>{!! Form::text('nome', null, $value) !!}  </td>
            <td>{!! Form::text('telefono', null, ['class' => 'form-control'] ) !!}</td>
            <td>{!! Form::checkbox('visita', 'X') !!}</td>
            <td>{!! Form::checkbox('medicazione', 'X') !!}</td>
            <td>{!! Form::checkbox('sala_gessi', 'X') !!}</td>
            <td>{!! Form::checkbox('rx_prima', 'X') !!}</td>
            <td>{!! Form::checkbox('rx_dopo', 'X') !!}</td>
            <td>{!! Form::text('prenotato_da',Auth::user()->name,array('class' => 'form-control', 'readonly')) !!}</td>
            <td>
                @if(!Auth::user()->admin )
                    {!! Form::close() !!}
                    {!! Form::submit('X', ['class' => 'btn btn-danger', 'name'=>'overedit']) !!}

                @else
                {!! Form::submit('Prenota', ['class' => 'btn btn-small btn-success' , 'name'=>'overbooking']) !!}
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
        @endwhile
        </tbody>

    </table>
    <script>
        function Confirm()
        {
            var x = confirm("Prenotazione di Overbooking Effettuata!");

            if (x==true)
                return true;
            else
                return false;
        }
    </script>

@stop
