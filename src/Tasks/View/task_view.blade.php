<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            B2Broker Support
        </div>
        <div class="tasks">
            @if(!empty($task))
                <div>
                    <p>Title : {{$task->title}}</p>
                </div>
                <div>
                    <p>Body : {{$task->body}}</p>
                </div>
                <div>
                    <p>Created : {{$task->created}}</p>
                </div>
                <div>
                    <p>Modified : {{$task->modified}}</p>
                </div>
            @endif
        </div>
        <div class="links">
            <a href="{{ url('/') }}">Main</a>
            <a href="{{ url('/tasks') }}">Support's Tasks</a>
        </div>
    </div>
</div>
</body>
</html>
