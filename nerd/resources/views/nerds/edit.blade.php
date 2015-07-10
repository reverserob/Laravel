<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('nerds.index') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('nerds.index') }}">View All Nerds</a></li>
            <li><a href="{{ route('nerds.create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <h1>Edit {{ $nerd->name }}</h1>

    {!! Form::model($nerd, [
    'method' => 'PATCH',
    'route' => ['nerds.update', $nerd->id]
    ]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nerd_level', 'Nerd Level:', ['class' => 'control-label']) !!}
        {!! Form::select('nerd_level', [
        '0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller']) !!}
    </div>


    {!! Form::submit('Update the Nerd', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
</body>
</html>