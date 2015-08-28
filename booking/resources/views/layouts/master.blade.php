<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prenotazioni</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/datepicker.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">


</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('tasks.index') }}">Vai alle Prenotazioni di Oggi</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Accedi</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">Reset Password </a></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
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

<script type="text/javascript" src="/js/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/js/datepicker-it.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->


<script type="text/javascript">
    $(document).ready(function() {

        $( "#datepicker-el" ).datepicker({
            language: 'it',
            orientation: 'bottom',
            onSelect: function (dateText, inst) {
                $('#frmDate').submit();
            }
        });

        $('#btnPicker').click(function () {
            //alert('clicked');
            $('#datepicker-el').datepicker('show');
        });

    });
</script>


<hr>
<footer class="container" id="footer">
    Powered by Olomedia s.r.l © 2015
    <a title="olomedia" href="http://www.olomedia.it" target="_blank" rel="nofollow"><img src="/img/logo-olomedia.png" alt="olomediat" /></a>
</footer>
<hr>

</body>
</html>