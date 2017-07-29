<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard | Play Parallel</title>

        <!-- Vendors -->

        <!-- Animate CSS -->
        <link href="/admin/css/vendors/animate.min.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

        <!-- Malihu Scrollbar -->
        <link href="/admin/css/vendors/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- Full Calendar -->
        <link href="/admin/css/vendors/fullcalendar.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/css/vendors/bootstrap-datetimepicker.min.css">

        <!-- Site CSS -->
        <link href="/admin/css/mae.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/css/app.css">

        <!-- Page loader -->
        <script src="/admin/js/page-loader.min.js"></script>
    </head>

    <body>
        <!-- Page Loader -->
        <div id="page-loader">
            <div class="preloader preloader--xl preloader--light">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" />
                </svg>
            </div>
        </div>

        <!-- Header -->
        <header id="header">
            <div class="logo">
                <a href="index.html" class="hidden-xs">
                    Staff Dashboard
                    <small style="font-size: 16px; margin-top: 3px; font-weight: 500">Play Parallel&trade;</small>
                </a>
                <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
            </div>

            @include('dashboard.layouts._top-menu')

            <form class="top-search">
                <input type="text" class="top-search__input" placeholder="Search for people, files & reports">
                <i class="zmdi zmdi-search top-search__reset"></i>
            </form>
        </header>

        <section id="main">
            @include('dashboard.layouts._control-sidebar')

            @include('dashboard.layouts._navigation')

            <section id="content">
                <div id="dashboard">
                    @yield('content')
                </div>
            </section>

            <footer id="footer">
                Copyright &copy; 2017 Play Parallel

                <ul class="footer__menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">Reports</a></li>
                    <li><a href="">Support</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </footer>

        </section>

        <!-- Javascript Libraries -->

        <!-- jQuery -->
        <script src="/admin/js/vendors/jquery.min.js"></script>
        <script src="/admin/js/app.js"></script>

        <!-- Bootstrap -->
        <script src="/admin/js/vendors/bootstrap.min.js"></script>

        <!-- Malihu ScrollBar -->
        <script src="/admin/js/vendors/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

        <!-- Moment -->
        <script src="/admin/js/vendors/moment.min.js"></script>

        <!-- FullCalendar -->
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

        <!-- Simple Weather -->
        <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>

        <!-- Salvattore -->
        <script src="/admin/js/vendors/salvattore.min.js"></script>

        <!-- Flot Charts -->
        <script src="/admin/js/vendors/flot/jquery.flot.js"></script>
        <script src="/admin/js/vendors/flot/jquery.flot.resize.js"></script>
        <script src="vendors/bower_components/flot.curvedlines/curvedLines.js"></script>

        <!-- Sparkline Charts -->
        <script src="/admin/js/vendors/sparkline/jquery.sparkline.min.js"></script>

        <!-- EasyPie Charts -->
        <script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <!-- Demo Only -->
        {{-- <script src="demo/js/flot-charts/curved-line.js"></script>
        <script src="demo/js/flot-charts/line.js"></script>
        <script src="demo/js/easy-pie-charts.js"></script>
        <script src="demo/js/misc.js"></script>
        <script src="demo/js/sparkline-charts.js"></script>
        <script src="demo/js/calendar.js"></script> --}}
        <script src="/admin/js/vendors/bootstrap-datetimepicker.min.js"></script>
        <!-- Site Functions & Actions -->

        <script src="/admin/js/mae.min.js"></script>

    </body>
</html>
