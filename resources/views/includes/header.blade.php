<header class="fixed headder">
    <div class="bx_header">
        
        <nav class="navbar navbar-expand-lg navbar-light">
            <h1 class="logo navbar-brand">
                <a href="/">
                    
                    <img src="{{ asset('image/top/logo.png') }}" alt="">
                </a>
            </h1>
            <p>マイテーマ、探そ。</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('about')}}">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">マイテーマ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modal_register">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('company-entrance')}}">企業採用担当の方</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modal_login">ログイン</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.nav-->
    </div>
    <!--/.bx_header-->
</header>

