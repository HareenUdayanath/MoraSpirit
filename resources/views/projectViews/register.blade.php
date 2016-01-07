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
            <h2>Regiter</h2>
        </div>
        <form action = {{route('register')}} >
            <label for="id">ID</label>
            <br/>
            <input type="text" name="id">
            <br/>
            <label for="name">Name</label>
            <br/>
            <input type="text" name="name">
            <br/>
            <label for="contactNo">Contact Number</label>
            <br/>
            <input type="tel" name="contactNo">
            <br/>
            <label for="password">Password</label>
            <br/>
            <input type="password" name="password">
            <br/>
            <button type="submit">Register</button>
            <br/>
        </form>
    </div>
</div>
</body>

</html>