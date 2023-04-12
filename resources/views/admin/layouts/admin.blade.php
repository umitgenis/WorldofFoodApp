@php use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin_assets/img/apple-icon.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('admin_assets/img/favicon.png')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>World of Food Management Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('admin_assets/css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>

</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="{{asset('admin_assets/img/sidebar-1.jpg')}}">

        <div class="logo">
            <a href="#" class="simple-text" style="color: #218c74">
                Management Panel
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{--                <li>--}}
                {{--                    <a href={{route('admin.index')}}>--}}
                {{--                        <i class="material-icons">person</i>--}}
                {{--                        <p>Panel 1</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li>--}}
                {{--                    <a href="{{route('admin.index')}}">--}}
                {{--                        <i class="material-icons">content_paste</i>--}}
                {{--                        <p>Panel 2</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li>
                    <a href="{{route('admin.restaurant.index')}}">
                        <i class="material-icons">bubble_chart</i>
                        <p>Restaurants</p>
                    </a>
                </li>
                {{--                <li>--}}
                {{--                    <a href="{{route('admin.index')}}">--}}
{{--                <i class="material-icons">library_books</i>--}}
                {{--                        <p>Panel 4</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li>--}}
                {{--                    <a href="{{route('admin.index')}}">--}}
                {{--                        <i class="material-icons">location_on</i>--}}
                {{--                        <p>Panel 5</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li>
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons text-gray">notifications</i>
                        <p>Order</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Material Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                                <li>
                                    <a href="#">You have 5 new tasks</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Andrew</a>
                                </li>
                                <li>
                                    <a href="#">Another Notification</a>
                                </li>
                                <li>
                                    <a href="#">Another One</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('store.profile.detail',['id'=>Auth::id()])}}">

                                @auth()
                                    <p class="visible-lg-inline visible-md-inline text-primary">{{Auth::user()->name}}</p>
                                @endauth
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group  is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>


        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(2023)
                    </script>
                    <a href="">Genius</a>, You need the dark in order to show the light.
                </p>
            </div>
        </footer>

    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('admin_assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/js/material.min.js')}}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{asset('admin_assets/js/chartist.min.js')}}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{asset('admin_assets/js/arrive.min.js')}}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{asset('admin_assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin_assets/js/bootstrap-notify.js')}}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('admin_assets/js/material-dashboard.js?v=1.2.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin_assets/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</body>

