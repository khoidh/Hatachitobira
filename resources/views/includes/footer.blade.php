<footer>

    <div class="row">
        <div class="col-sm-12 col-md-7 col-xs-12 logo-footer">
            <ul>
                <li class="li-first"><a href="/">
                    <p>マイテーマ、探そ。</p>
                    <img src="{{ asset('image/top/logo-fotter.png') }}" alt="">
                </a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-5 col-xs-12">
            <div class="row">
                <div class="col-md-4 col-xs-6 col-sm-6 footter-mobile">
                    <ul>
                        <li><a href="#">マイテーマを</a></li>
                        <li><a href="#">-動画から探す</a></li>
                        <li><a href="#">-イベントで見つける</a></li>
                        <li><a href="#">-記事で知る</a></li>
                    </ul>
                </div>
                <div class="col-md-8 col-xs-6 col-sm-6 footter-mobile">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{url('about')}}">ABOUT</a></li>
                                <li><a href="{{url('/enquiry')}}">-お問い合わせ</a></li>
                                <li><a href="{{route('company-entrance')}}">運営会社</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="#">プライバシーポリシー</a></li>
                                <li><a href="#">利用規約</a></li>
                                @if(Auth::User())
                                <li><a href="#">My Page</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row link-assosial {{Auth::User() ? 'logined' :''}}">
        <a class="icon-link first" href="#"><img src="{{ asset('image/top/footer-icon-1.png') }}" alt=""></a>
        <a class="icon-link" href="#"><img src="{{ asset('image/top/footer-icon.png') }}" alt=""></a>
        <a class="icon-link" href="#"><i class="fa fa-2x fa-twitter" aria-hidden="true"></i></a>
        <a class="icon-link" href="#"><i class="fa fa-2x fa-facebook" aria-hidden="true"></i></a>
        <a class="icon-link" href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
    </div>
    @if(Auth::Guest())
    <div class="border-footer"></div>
    <div class="row footer-bootom">
        <div class="text-bootom">
            <a class="a-link" href="#">会員登録</a>
            <a class="a-link" href="#">ログイン</a>
            <a href="#">企業の方</a>
        </div>
    </div>
    @endif
</footer>