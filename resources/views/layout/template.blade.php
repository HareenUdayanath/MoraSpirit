<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href={{asset("/css/bootstrap.min.css")}} rel="stylesheet">

    <link href={{asset("/fonts/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{asset("/css/animate.min.css")}} rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href={{asset("/css/custom.css")}} rel="stylesheet">
    <link href={{asset("/css/icheck/flat/green.css")}} rel="stylesheet">


    <script src={{asset("/js/jquery.min.js")}}></script>

    <!--[if lt IE 9]>
    <script src={{asset("../assets/js/ie8-responsive-file-warning.js")}}></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src={{asset("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js")}}></script>
    <script src={{asset("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")}}></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"> <span>MoraSpirit!</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src={{asset("/images/img.jpg")}} alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{$user->getName()}}</h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    @yield('siderBar')

                </div>
                <!-- /sidebar menu -->

                <br />

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">{{$user->getName()}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div>
                @yield('content')
            </div>

            <!-- footer content -->
            <footer>
                <div class="">
                    <p class="pull-right">MoraSpirit. |
                        <span class="lead"> ITCope!</span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src={{asset("js/bootstrap.min.js")}}></script>

<!-- chart js -->
<script src={{asset("/js/chartjs/chart.min.js")}}></script>
<!-- bootstrap progress js -->
<script src={{asset("/js/progressbar/bootstrap-progressbar.min.js")}}></script>
<script src={{asset("/js/nicescroll/jquery.nicescroll.min.js")}}></script>
<!-- icheck -->
<script src={{asset("/js/icheck/icheck.min.js")}}></script>

<script src={{asset("/js/custom.js")}}></script>

<!-- moris js -->
<script src={{asset("/js/moris/raphael-min.js")}}></script>
<script src={{asset("/js/moris/morris.js")}}></script>
<script src={{asset("/js/moris/example.js")}}></script>

</body>

</html>