<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{asset("/css/login/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset("/css/login/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset("/css/login/AdminLTE.css")}}" rel="stylesheet" type="text/css" />

</head>
<body class="bg-black">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-box" id="login-box">
    <img src="{{asset("/images/Other/SignIn.jpg")}}"alt="picture cannot find " height="70" width="360">
    <form role="form" method="POST" action="{{ url('login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="ID" class="form-control" placeholder="User ID"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>

</div>
</body>
</html>