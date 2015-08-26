<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni PDF </title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body>

    <h1 class="title1"> Prenotazioni del {{ $day }}</h1>

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
            </tr>
        @endforeach
        @foreach($overbooking as $over)
            <tr bgcolor="#FFCC66">
                <td>{{35}}</td>
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
            </tr>
        @endforeach
        </tbody>
    </table>



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>