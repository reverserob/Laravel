<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prenotazioni</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">Tutte Le prenotazioni</a>
        </div>
        <div class="navbar-header"><a href="{{ route('tasks.create') }}"class="btn btn-info">Crea</a></div>
        <div class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home') }}">Login</a></li>
            <li><a href="{{ route('home') }}">Registrati</a></li>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        @yield('content')
    </div>
</main>

</body>
</html>