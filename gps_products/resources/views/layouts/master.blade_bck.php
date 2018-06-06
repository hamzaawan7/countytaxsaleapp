<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" type="images/png" href="{{ asset('assets/images/ctsa.ico') }}"/>
    <link rel="apple-touch-icon" type="images/png" href="{{ asset('assets/images/ctsa.ico') }}"/>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/morris-0.4.3.min.css') }}" rel="stylesheet">
    <!-- DATATABLES-->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.colVis.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<body class="fixed-left">

<div id="wrapper">

    <!--top bar-->
    <div class="topbar">
        <div class="topbar-left">
            <div class="text-center">
            <!-- <a href="" class="logo text-center"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a> -->
                <h4 class="text-center" style="color:#fff; margin-top:15px">County Tax Sales App</h4>
            </div>
        </div>
        <div class="pull-left menu-toggle">
            <i class="fa fa-bars"></i>
        </div>

        <ul class="nav navbar-nav  top-right-nav hidden-xs">
            <li>

                <span id="para2"></span>
                <span id="para3"></span>
                <span id="para1"></span>
            </li>

            <li class="dropdown profile-link hidden-xs">
                <div class="clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span>{{ Auth::user()->name }} <br><em>{{ ucfirst(Auth::user()->type) }}</em></span>
                    </a>
                </div>

            </li>
        </ul>
    </div>
    <!--end top bar-->

    <!--left menu start-->
    <div class="side-menu left" id="side-menu">

        <ul class="metismenu clearfix" id="menu">
            {{--<li class="profile-menu visible-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="data:image/jpeg;base64,{{ base64_encode( Auth::user()->photo ) }}"
                         alt="{{ Auth::user()->name }}" width="40" height="40" class="pull-left img-circle">
                    <span>{{ Auth::user()->name }} <br><em>{{ ucfirst(Auth::user()->type) }}</em></span>
                </a>
                <ul class="dropdown-menu profile-drop">
                    <li><a href="{{ route('admin-profile') }}">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="{{ route('signout') }}">Logout</a></li>
                </ul>
            </li>--}}
            <li class="active"><a href="{{ route('admin-dashboard') }}"><i class="fa fa-home"></i>
                    <span>Dashboard</span></a></li>

            <li>
                <a href="{{ route('admin-users') }}">
                    <i class="fa fa-bar-chart-o"></i><span>Users</span></span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-products') }}"><i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Properties</span></a>
            </li>
            <li><a href="{{ route('import-export') }}"><i class="fa fa-file-excel-o"></i>
                    <span>Property Upload</span></a></li>
            <li><a href="{{ route('admin-contact-messages') }}"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Contact Messages</span></a>
            </li>
            <li><a href="{{ route('admin-legals') }}"><i class="fa fa-balance-scale" aria-hidden="true"></i> <span>Legals</span></a>
            </li>
            <li><a href="{{ route('admin-trial-days') }}"><i class="fa fa-sun-o" aria-hidden="true"></i> <span>Trial Days</span></a>
            </li>
            <li><a href="{{ route('admin-trial-amount') }}"><i class="fa fa-dollar" aria-hidden="true"></i> <span>Trial Amount</span></a>
            </li>
            <li><a href="{{ route('admin-auction-date') }}"><i class="fa fa-volume-up" aria-hidden="true"></i> <span>Auction Date</span></a>
            </li>

            <li class="active"><a href="#"><span>My Account</span></a></li>
            <li><a href="{{ route('admin-profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="{{ route('admin-change-password') }}"><i class="fa fa-lock"></i>
                    <span>Change Password</span></a></li>
            <li><a href="{{ route('signout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>


        </ul>

    </div>
    <!--left menu end-->
    <div class="content-page  equal-height">
        <div class="content">
            <div class="container">

                @yield('content')

            </div><!--content-->
        </div><!--content page-->
    </div><!--end wrapper-->
</div>

<!-- <div class="footer">
    <span>Copyright &copy; 2016. Pink-Desh.</span>
</div> -->
<!-- Plugins  -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8926455-6"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-8926455-6');
</script>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.selection.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('assets/js/raphael-2.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/morris.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/mediaquery.js') }}"></script>
<script src="{{ asset('assets/js/equalize.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- DATATABLES-->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/demo-datatable.js') }}"></script>

<!--page js-->
<script>


    $(".sparkline7").sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 14, 4, 2, 14, 12, 7], {
        type: 'bar',
        barWidth: 4,
        height: '60px',
        barColor: '#f7b03e',
        negBarColor: '#c6c6c6'
    });
    $(".sparkline8").sparkline([4, 2], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });
    $(".sparkline9").sparkline([3, 2], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });
    $(".sparkline10").sparkline([4, 1], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });
    $(".sparkline11").sparkline([1, 3], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });
    $(".sparkline12").sparkline([3, 5], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });
    $(".sparkline13").sparkline([6, 2], {
        type: 'pie',
        sliceColors: ['#f7af3e', '#404652']
    });

    //moris chart
    $(function () {
        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(235, 162, 59,0.5)",
                    strokeColor: "rgba(235, 162, 59,1)",
                    pointColor: "rgba(235, 162, 59,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(235, 162, 59,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(247, 176, 62,0.5)",
                    strokeColor: "rgba(247, 176, 62,0.7)",
                    pointColor: "rgba(247, 176, 62,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(247, 176, 62,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "#b5884c",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);


        var polarData = [
            {
                value: 300,
                color: "#f7b03e",
                highlight: "#3d3f4b",
                label: "App"
            },
            /* {
             value: 140,
             color: "#f5c06c",
             highlight: "#3d3f4b",
             label: "Software"
             },
             {
             value: 200,
             color: "#bd914a",
             highlight: "#3d3f4b",
             label: "Laptop"
             }*/
        ];

        var polarOptions = {
            scaleShowLabelBackdrop: true,
            scaleBackdropColor: "rgba(255,255,255,0.75)",
            scaleBeginAtZero: true,
            scaleBackdropPaddingY: 1,
            scaleBackdropPaddingX: 1,
            scaleShowLine: true,
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true

        };

        var ctx = document.getElementById("polarChart").getContext("2d");
        var myNewChart = new Chart(ctx).PolarArea(polarData, polarOptions);

        var barData = {
            labels: ["Monday", "Tuesday", "Wedneday", "Thrusday", "Friday"],
            datasets: [
                {
                    label: "My Second dataset",
                    fillColor: "#aeaeae",
                    strokeColor: "#aeaeae",
                    highlightFill: "#eda01c",
                    highlightStroke: "#eda01c",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };

        var barOptions = {
            scaleBeginAtZero: true,
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            barShowStroke: true,
            barStrokeWidth: 1,
            barValueSpacing: 1,
            barDatasetSpacing: 1,
            responsive: true
        };


        var ctx = document.getElementById("barChart").getContext("2d");
        var myNewChart = new Chart(ctx).Bar(barData, barOptions);

        var radarData = {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(235, 162, 59,1)",
                    strokeColor: "rgba(235, 162, 59,1)",
                    pointColor: "rgba(235, 162, 59,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(235, 162, 59,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(247, 176, 62,1)",
                    strokeColor: "rgba(247, 176, 62,1)",
                    pointColor: "rgba(247, 176, 62,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(255,255,255,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]
        };

        var radarOptions = {
            scaleShowLine: true,
            angleShowLineOut: true,
            scaleShowLabels: false,
            scaleBeginAtZero: true,
            angleLineColor: "rgba(0,0,0,.1)",
            angleLineWidth: 1,
            pointLabelFontStyle: "normal",
            pointLabelFontSize: 10,
            pointLabelFontColor: "#666",
            pointDot: true,
            pointDotRadius: 3,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };

        var ctx = document.getElementById("radarChart").getContext("2d");
        var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

        var data = [{
            label: "Sales 1",
            data: 21,
            color: "#d3d3d3"
        }, {
            label: "Sales 2",
            data: 3,
            color: "#bababa"
        }, {
            label: "Sales 3",
            data: 15,
            color: "#79d2c0"
        }, {
            label: "Sales 4",
            data: 52,
            color: "#f7b03e"
        }];

        var doughnutData = [
            {
                value: 300,
                color: "#d53d2f",
                highlight: "#ba8036",
                label: "Chorme"
            },
            {
                value: 150,
                color: "#dedede",
                highlight: "#ba8036",
                label: "Mozilla"
            },
            {
                value: 130,
                color: "#03a679",
                highlight: "#ba8036",
                label: "Safari"
            }
        ];

        var doughnutOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 4,
            percentageInnerCutout: 45, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true
        };


        var ctx = document.getElementById("doughnutChart").getContext("2d");
        var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

//line chart
        Morris.Line({
            element: 'morris-line-chart',
            data: [{y: '2006', a: 0, b: 10},
                {y: '2007', a: 25, b: 35},
                {y: '2008', a: 30, b: 40},
                {y: '2009', a: 20, b: 25},
                {y: '2010', a: 37, b: 40}],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#ddcc36', '#f7b03e']
        });


    });
</script>
@yield('scripts')
</body>

</html>
