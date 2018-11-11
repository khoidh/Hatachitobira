<footer>
    <div class="row">
        <div class="col-sm-12 col-md-2 col-xs-12 logo-footer">
            <ul>
                <li class="li-first"><a href="/">
                    <span>マイテーマ、探そ。</span>
                    <img style="max-width: 215px;" src="{{ asset('images/user/top/logo-fotter.png') }}" alt="">
                </a></li>
            </ul>
        </div>
        <div class="col-sm-12 offset-md-5 col-md-5 col-xs-12">
            <div class="row">
                <div class="col-md-4 col-xs-6 col-sm-6 footter-mobile">
                    <ul>
                        <li><a class="a-first">マイテーマを</a></li>
                        <li><a href="{{url('video')}}">- &nbsp;動画から探す</a></li>
                        <li><a href="{{url('event')}}">- &nbsp; イベントで見つける</a></li>
                        <li><a href="{{url('column')}}">- &nbsp; 記事で知る</a></li>
                    </ul>
                </div>
                <div class="col-md-8 col-xs-6 col-sm-6 footter-mobile">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{url('about')}}">ABOUT</a></li>
                                <li><a href="{{url('/enquiry')}}">お問い合わせ</a></li>
                                <li><a href="{{route('recruitment-staff')}}">運営会社</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{url('private-polisy')}}">プライバシーポリシー</a></li>
                                <li><a href="{{url('private-polisy')}}">利用規約</a></li>
                                @if(Auth::User())
                                <li><a href="{{url('my-page')}}">My Page</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row link-assosial {{Auth::User() ? 'logined' :''}}">
        <a class="icon-link first" href="#"><img src="{{ asset('images/user/top/footer-icon-1.png') }}" alt=""></a>
        <a class="icon-link" href="https://www.youtube.com/channel/UCUcAny1-bt4V-TB6UaBEkiw"><img src="{{ asset('images/user/top/footer-icon.png') }}" alt=""></a>
        <a class="icon-link" href="https://twitter.com/hatachi_tobira"><i class="fa fa-2x fa-twitter" aria-hidden="true"></i></a>
        <a class="icon-link" href="https://www.facebook.com/hatachinotobira/"><i class="fa fa-2x fa-facebook" aria-hidden="true"></i></a>
        <a class="icon-link" href="https://www.instagram.com/hatachi_tobira/"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
    </div>
    @if(Auth::Guest())
    <div class="border-footer"></div>
    <div class="row footer-bootom">
        <div class="text-bootom">
            <a class="a-link show-modal-register" data-toggle="modal" data-target="#modal_register">会員登録</a>
            <a class="a-link" data-toggle="modal" data-target="#modal_login">ログイン</a>
            <a  href="{{url('recruitment-staff')}}">企業の方</a>
        </div>
    </div>
    @endif
</footer>