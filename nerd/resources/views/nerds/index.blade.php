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

    <h1>All the Nerds</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Nerd Level</td>
            <td>SHOW</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
        </thead>
        <tbody>
        @foreach($nerds as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->nerd_level }}</td>

                <!-- we will also add show, edit, and delete buttons -->

                <td>
                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ route('nerds.show', $value->id) }}">Show this Nerd</a>
                </td>
                <td>
                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ route('nerds.edit', $value->id) }}">Edit this Nerd</a>

                </td>

                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    {!! Form::open([

                    'method' => 'DELETE',
                    'route' => ['nerds.destroy', $value->id]

                    ]) !!}

                    {!! Form::submit('Delete this Nerd', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>