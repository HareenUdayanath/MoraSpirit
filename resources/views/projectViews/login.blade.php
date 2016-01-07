<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daily UI - Day 1 Sign In</title>

    <!-- Google Fonts -->
    <!--link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'-->

    <link rel="stylesheet" href={{asset("/css/animate.css")}}>
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href={{asset("/css/style.css")}}>

</head>

<body>
<div class="container">
    <div class="top">
        <h1 id="title" class="hidden"><span id="logo">Mora <span>Spirit</span></span></h1>
    </div>
    <div class="login-box animated fadeInUp">
        <div class="box-header">
            <h2>Log In</h2>
        </div>
        <form action = {{route('first')}}>
            <label for="username">Username</label>
            <br/>
            <input type="text" name="username">
            <br/>
            <label for="password">Password</label>
            <br/>
            <input type="password" name="password">
            <br/>
            <button type="submit">Sign In</button>
            <br/>
            <a href="#"><p class="small">Forgot your password?</p></a>
        </form>
    </div>
</div>
</body>

</html>