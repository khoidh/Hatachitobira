<html>
<head>
    <title>Admin</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('javascrip')
</head>
<body>

<div class="nav-side-menu">
    <div class="brand">Hatachi</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Menu
                </a>
            </li>

            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Events Manager <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class=""><a href="{{route('events.index')}}">List</a></li>
                <li><a href="{{route('events.create')}}">New</a></li>

            </ul>


            <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Videos Manager <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="service">
                <li class=""><a href="{{route('videos.index')}}">List</a></li>
                <li><a href="{{route('videos.create')}}">New</a></li>
            </ul>


            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i> Colums Manager <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li>New New 1</li>
                <li>New New 2</li>
                <li>New New 3</li>
            </ul>

            <li>
                <a href="{{route('enquiry.index')}}">
                    <i class="fa fa-user fa-lg"></i> Enquiry
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-user fa-lg"></i> Profile
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-users fa-lg"></i> Users
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="content">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('customjavascript')
</body>
</html>
