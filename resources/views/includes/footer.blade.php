<footer>
    <div class="container container-footer">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-xs-12">
                <ul>
                    <li class="li-first"><a class="link-hatachi" href="#">ハタチのトビラロゴ</a></li>
                    <li><a href="#">マイテーマを</a></li>
                    <li><a href="{{route('video.index')}}">-動画から探す</a></li>
                    <li><a href="{{route('event.index')}}">-イベントで見つける</a></li>
                    <li><a href="{{route('column.index')}}">-記事で知る</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-5 col-xs-12">
                <ul>
                    <li><a href="{{url('about')}}">ABOUT</a></li>
                    <li><a href="{{url('/enquiry')}}">-お問い合わせ</a></li>
                    <li><a href="{{route('company-entrance')}}">運営会社</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                    <li><a href="#">利用規約</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-5 col-xs-12 footer-bottom">
                @if (Auth::guest())
                <ul>
                    <li class="col-sm-3"><a class="show-modal-register" style="cursor: pointer;">会員登録</a></li>
                    <li class="col-sm-1 td-border"><p class=""></p></li>
                    <li class="col-sm-3"><a data-toggle="modal" data-target="#modal_login" style="cursor: pointer;">ログイン</a></li>
                    <li class="col-sm-1 td-border"><p class=""></p></li>
                    <li class="col-sm-3"><a href="#">企業の方</a></li>
                </ul>
                @else
                <ul>
                    <li><a href="{{ route('mypage.index') }}">My Page</a></li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</footer>