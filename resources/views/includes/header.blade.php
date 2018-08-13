


<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Hatachi Tobira
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="#">ABOUT</a></li>
                    {{--<li><a href="#">マイテーマ</a></li>--}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">マイテーマ
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">カテゴリから探す</a></li>
                            <li><a href="#">動画から探す</a></li>
                            <li><a href="#">イベントに参加</a></li>
                            <li><a href="#">記事から知る</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                    <li><a href="{{ route('login') }}">グイン </a></li>
                    <li><a href="#">企業採用担当の方</a></li>
                    <li><a href="{{ url('/enquiry')}}">問い合わせ</a></li>

                @else
                    <li><a href="#">ABOUT</a></li>
                    {{--<li><a href="#">マイテーマ</a></li>--}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">マイテーマ
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('u-video.index')}}">動画一覧</a></li>
                            <li><a href="{{route('event.index')}}">イベント一覧</a></li>
                            <li><a href="">記事一覧</a></li>
                            <li><a href="#">が格納されている</a></li>
                        </ul>
                    </li>
                    <li><a href="#">企業採用担当の方</a></li>
                    <li><a href="{{ url('/enquiry')}}">問い合わせ</a></li>
                    <li><a href="#">MY PAGE</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
