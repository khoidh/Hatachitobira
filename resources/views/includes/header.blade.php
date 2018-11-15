<header class="fixed header">
    <div class="bx_header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="logo navbar-brand" href="/">
                <img src="{{ asset('images/user/top/logo.png') }}" alt="">
            </a>
            <p>ベータ版</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon-tmp"></span>
            </button>
            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item aaaafixed">
                        <a class="nav-link active" href="{{url('about')}}">ABOUT</a>
                    </li>
                    <li class="nav-item dropdown aaaafixed">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          マイテーマを探す
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{ url('search-category')}}">自分の興味から探す</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('video')}}">将来の選択肢を動画でみる</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('event')}}">イベントに参加する</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('column')}}">ハタチのトビラコラム</a>
                    </li>
                    @if(Auth::Guest())
                    <li class="nav-item aaaafixed">
                        <a class="nav-link show-modal-register" data-toggle="modal" data-target="#modal_register">新規登録</a>
                    </li>
                    <li class="nav-item aaaafixed">
                        <a class="nav-link" href="{{url('recruitment-staff')}}">企業採用担当の方</a>
                    </li>
                    <li class="nav-item aaaafixed">
                        <a class="nav-link" data-toggle="modal" data-target="#modal_login">ログイン</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link-append show-modal-register-mypage" style="display: none;margin: 0px;" href="{{url('my-page')}}">マイテーマを見つける</a></li>
                    @endif
                    @if(Auth::User())
                    <li class="nav-item aaaafixed">
                        <a class="nav-link" href="{{url('my-page')}}">マイページ</a>
                    </li>
                    <li class="nav-item aaaafixed">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!--/.nav-->
    </div>
    <!--/.bx_header-->
</header>
<script type="text/javascript" charset="utf-8" async defer>
    if (window.innerWidth < 993) {
        $('.dropdown').on('show.bs.dropdown', function() {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
          });

          // Add slideUp animation to Bootstrap dropdown when collapsing.
          $('.dropdown').on('hide.bs.dropdown', function() {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
          });
    }
</script>

