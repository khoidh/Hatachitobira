@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/company.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container company">
    <div class="row">
        <h3 class="company-title">企業採用担当の方へ</h3>
        <div>
            <img class="company-img" src="{{ asset('image/company_1.png')}}">
        </div>
        <div class="company-text">
            <div class="tittle">
                <strong>自社の事業や仕事の魅力を</strong> <br>
                <strong>学生に訴求する動画を創りませんか？</strong>
            </div>
            <div>
                <p style="padding: 20px 0">「ハタチのトビラ」は、就活や働くことを見据え将来と向き合うハタチの学生に向け、自分のテーマからキャリア選択ができるようサポートするサービスです。</p>
                <p>学生が就活において最も知りたい情報である“具体的な仕事内容”ですが学生からは「具体的な仕事内容を知る機会が限られている」</p>
                <p>「採用ページは、いいことばかり書かれていて嘘っぽい」といった声が聞かれます。</p>
                <p>納得感のあるキャリア選択をためには、「自己理解」は勿論、「社会理解」も重要です。</p>
                <p>仕事の現場に眠っているリアルな魅力を訴求することで、</p>
                <p>学生が社会のトビラを開くきっかけを提供したい、それがワタシたちの想いです。</p>
            </div>
        </div>
        <div class="create_movie">
            <p class="navi-text">過去制作動画</p>
            <div id="movie">
                <div class="viewer">
                    <ul>
                        <li class="movie-1 show"><iframe width="100%" height="500" src="https://www.youtube.com/embed/OLLai7lzepw?rel=0&#9;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></li>
                        <li class="movie-2"><iframe width="100%" height="500" src="https://www.youtube.com/embed/KO9MH9-hz38?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></li>
                        <li class="movie-3"><iframe width="100%" height="500" src="https://www.youtube.com/embed/uvaMVEDj6Cc?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></li>
                    </ul>
                </div>
                <ul class="thumbnail">
                    <li><a rel="movie-1" style="background-image: url(http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/movie-thumbnail-1.jpg);"></a></li>
                    <li><a rel="movie-2" style="background-image: url(http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/movie-thumbnail-2.jpg);"></a></li>
                    <li><a rel="movie-3" style="background-image: url(http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/movie-thumbnail-3.jpg);"></a></li>
                </ul>
            </div>
            <a href="https://www.youtube.com/channel/UCUcAny1-bt4V-TB6UaBEkiw" target="_blank" class="more-link">ハタチのトビラ動画の一覧はこちらから</a>
        </div>
        <div class="company-sponser" id="performance">
            <p class="navi-text">過去制作動画</p>
            <ul>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-florelogp.jpg" alt="Florelogp"></li>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-greenz.jpg" alt="Greenz"></li>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-Huber-rogo.jpg" alt="Huber"></li>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-jiyuuniv_logo.jpg" alt="Jiyuuniv"></li>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-shake_logo.jpg" alt="Shake"></li>
                <li><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-unnanlogo.jpg" alt="Unnanlogo"></li>
            </ul>
        </div>
        <div class="information">
            <p>動画作成STEP</p>

            <ul id="workflow_list">
                <li>
                    <a rel="open" class="open">
                        <span class="number">01</span>
                        <img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/workflow-1.svg" alt="FLOW01">
                        <h3>事前準備（打ち合わせ）</h3>
                        <p class="more">MORE</p>
                    </a>
                    <div class="list-content" style="display: none;">
                        <h4>貴社</h4>
                        <p>ジョブシャドウの対象社員と撮影日の設定</p><br>
                        <h4>弊社</h4>
                        <p>希望の採用ターゲット像を基に学生を選定し事前面談</p>
                        <a rel="close" class="close-company">CLOSE</a>
                    </div>
                </li>
                <li>
                    <a rel="open" class="open">
                        <span class="number">02</span>
                        <img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/workflow-2.svg" alt="FLOW02">
                        <h3>ジョブシャドウ&amp;撮影</h3>
                        <p class="more">MORE</p>
                    </a>
                    <div class="list-content" style="display: none;">
                        <h4>貴社</h4>
                        <p>ジョブシャドウ対象社員と職場の方の撮影協力</p><br>
                        <h4>弊社</h4>
                        <p>撮影スタッフ2～3名の1日撮影同行</p>
                        <a rel="close" class="close-company">CLOSE</a>
                    </div>
                </li>
                <li>
                    <a rel="open" class="open">
                        <span class="number">03</span>
                        <img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/workflow-3.svg" alt="FLOW03">
                        <h3>映像化（編集・配信・拡散）</h3>
                        <p class="more">MORE</p>
                    </a>
                    <div class="list-content">
                        <h4>貴社</h4>
                        <p>作成した映像内容へのフィードバック</p><br>
                        <h4>弊社</h4>
                        <p>ジョブシャドウの様子を学生の声を交え映像化&amp;拡散</p>
                        <a rel="close" class="close-company">CLOSE</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','a.open',function(e){
            $( this ).next('.list-content').slideDown( 300 );
            return false;
        })
        $(document).on('click','a.close-company',function(e){
            $( this ).parent('.list-content').slideUp( 300 );
            return false;
        })
    });

    
    // $('a.open').click( function() {
    //     console.log('aaaaaa')
    //     $( this ).next('.list-content').slideDown( 300 );
    //     return false;
    // } );
    
    // $('a.close').click( function() {
    //     $( this ).next('.list-content').slideUp( 300 );
    //     $( this ).parent( serviceListContent ).slideUp( 300 );
    //     return false;
    // } );
</script>
@endsection
