<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <div class="quote">{{ Inspiring::quote() }}</div>
                  <br> <br>



                <a href="{{ url('/frontend') }}" class="waves-effect waves-light btn blue-text text-darken-2   yellow accent-2">
                <i class="mdi-maps-local-bar left"></i>
                Rob's Blog! </a>

                <a href="{{ url('/backend') }}" class="waves-effect waves-light btn amber darken-4 ">
                    <i class="material-icons left">thumb_up</i>
                    Rob's Blog! BACKEND</a>
                <br><br>

                <a href="{{ url('/projects') }}" class="waves-effect waves-light btn   red accent-2">
                    <i class="mdi-content-send right"></i>
                    To Do List </a>

            </div>
            <br><br>
            <div>
                <a href="{{ url('/auth/login') }}" class="waves-effect waves-light btn-large lime accent-4 blue-text text-darken-2">
                    <i class="mdi-action-perm-identity left"></i>Login</a>
            </div>

        </div>


 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

    </body>
</html>
