
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
                    <li><a href="{{url('about')}}">ABOUT</a></li>
                    {{--<li><a href="#">マイテーマ</a></li>--}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">マイテーマ
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">カテゴリから探す</a></li>
                            <li><a href="{{route('video.index')}}">動画から探す</a></li>
                            <li><a href="{{route('event.index')}}">イベントに参加</a></li>
                            <li><a href="{{route('column.index')}}">記事から知る</a></li>
                        </ul>
                    </li>
                    <li><a data-toggle="modal" data-target="#modal_register" style="cursor: pointer;">新規登録</a></li>
                    <li><a data-toggle="modal" data-target="#modal_login" style="cursor: pointer;">グイン </a></li>
                    <li><a href="#">企業採用担当の方</a></li>
                    <li><a href="{{ url('/enquiry')}}">問い合わせ</a></li>

                @else
                    <li><a href="{{url('about')}}">ABOUT</a></li>
                    {{--<li><a href="#">マイテーマ</a></li>--}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">マイテーマ
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('video.index')}}">動画一覧</a></li>
                            <li><a href="{{route('event.index')}}">イベント一覧</a></li>
                            <li><a href="{{route('column.index')}}">記事一覧</a></li>
                            <li><a href="#">が格納されている</a></li>
                        </ul>
                    </li>
                    <li><a href="#">企業採用担当の方</a></li>
                    <li><a href="{{ url('/enquiry')}}">問い合わせ</a></li>
                    <li><a href="{{ route('mypage.index') }}">MY PAGE</a></li>
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
<div id="modal_login" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="text-align:center">Login</h3>
            </div>
            <div class="modal-body" style="text-align:center">
                <div class="panel-body">
                    <span class="error-login" style="color:red;font-size:16px;"></span>
                    <form class="form-horizontal" id="form-login">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" id="btnlogin">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>


                    </form>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-3">
                                <a href="{{ url('/auth/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>

<div id="modal_register" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">
                    <div class="form-group code-top">
                        <div class="col-md-4">
                        <p>お気に入りorイベント申し込みは会員限定機能です。動画やイベント、あなたの興味のあるものを貯めて、マイテーマを形作っていこう！</p>
                        </div>
                        <img src="{{ asset('image/Picture1.png') }}">
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1" style="text-align: left;">
                            <input class="input-checkbox" type="checkbox">
                            <label class="lblcheckbox"><a class="link-redirect" href="/">利用規約</a> と <a class="link-redirect" href="/">プライバシーポリシー</a> に同意する </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-primary btn-register"> Facebookで登録</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <a href="{{ route('register') }}" class="btn btn-success btn-register"> メールアドレスで登録</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<meta name="_token" content="<?=csrf_token()?>">
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    });

    $(document).on('click','#btnlogin',function(e){
        e.preventDefault();
        var email = $(this).parents('#form-login').find("#email").val();
        var password = $(this).parents('#form-login').find("#password").val();
        var url = "{{URL::to('user-login') }}";
        if ($.trim(email) == ''){
            alert("Please enter your username");
            return false;
        }
        if ($.trim(password) == ''){
            alert("Please enter your password");
            return false;
        }
        $.ajax({
            url : url,
            type: 'post',
            dataType: 'json',
            data:{
                email :email,
                password :password
            },
            success : function (result){
                console.log(result)
                if(result.status){
                    window.location.reload();
                }else{
                    $('.error-login').text(result.message);
                }
            }
        });
    });
</script>
