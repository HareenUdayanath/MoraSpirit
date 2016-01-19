<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Mora Spirit</title>

    <link href="{{asset("/css/login/css/style.css")}}" rel="stylesheet" type="text/css" />

    <script src={{asset("js/login/js/prefixfree.min.js")}}></script>


</head>

<body>

<input type="submit" value="Login">

<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div>Mora<span>Spirit</span></div>
</div>
<br>


<form role="form" method="POST" action="{{ url('login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="login">

        <input type="text" placeholder="username" name="ID"><br>
        <input type="password" placeholder="password" name="password"><br>
        <input type="submit" value="Login">


        <input type="button" onclick="home();" value="Home">
        <script type="text/javascript">
            function home() {
                window.location = "{{route('public')}}";
            }
        </script>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Check Input!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>





</body>
</html>
