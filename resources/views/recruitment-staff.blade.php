@extends('layouts.app')

@section('title-e', 'RECRUITMENT STAFF')
@section('title-j', '企業採用担当の方へ')
@section('content')
<div>
	<img style="width: 100%" src="{{ asset('image/requiment/requiment-1.png')}}" alt="">
</div>
<div class="requiment-staff ">
	
	<div class="top clearfix">
		<div class="container content-1 requiment">
		    <div class="content-title">
		        <p class="content-1-title">自社の事業や仕事の魅力を</p>
		        <p class="content-1-title">学生に訴求する動画を</p>
		        <p class="content-1-title">創りませんか ？</p>
		    </div>
		    <div class="content-1-content">
		        <div class="cb-path"></div>
		        <div class="text-my-theme ">
		            <p class="text-detail">「ハタチのトビラ」は、就活や働くことを見据え将来と向き合うハタチの学生に向け、自分のテーマからキャリア選択ができるようサポートするサービスです。</p>
		        
		            <p class="text-detail">学生が就活において最も知りたい情報である“具体的な仕事内容”ですが、学生からは「具体的な仕事内容を知る機会が限られている」「採用ページは、いいことばかり書かれていて嘘っぽい」といった声が聞かれます。</br>納得感のあるキャリア選択をためには、「自己理解」は勿論、「社会理解」も重要です。仕事の現場に眠っているリアルな魅力を訴求することで、学生が社会のトビラを開くきっかけを提供したい、それがワタシたちの想いです。</p>
		        </div>
		    </div>
		</div>
	</div>
	<div class="video clearfix">
		<div class="container">
			<div class="cb-path"></div>
		</div>
		<div class="video-requiment">
			<div class="container">
				<p class="movie-top-text">過去制作動画</p>
				<div class="col-md-12 video-detail row">
	                <div class="col-md-9">
	                    <div class="corner-wrapper">
	                        <!-- <iframe width="100%" height="100%" left="0" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe> -->
	                        <img src="{{ asset('image/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                </div>
	                <div class="col-md-3 video-movie ">
	                    <div class="corner-wrapper pdd">
	                        <img src="{{ asset('image/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                    <div class="corner-wrapper pdd">
	                        <img src="{{ asset('image/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                    <div class="corner-wrapper">
	                        <img src="{{ asset('image/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                </div>
	            </div>
				<a href="{{route('video.index')}}">
		            <span class="more-detail ">動画をすべて見る</span>
		            <img src="{{ asset('image/top/arrow-1.png') }}" >
		        </a>
			</div>
		</div>
	</div>
	<div class="requiment-slide">
		<div class="container">
			<div class="cb-path"></div>
			<p class="movie-top-text">過去実績</p>
			<div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="2000">
		        <div class="carousel-inner row mx-auto" role="listbox">
		            <div class="carousel-item active">
		            	<div class="row">
		            		<div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-6.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
	            	</div>
	            	<div class="carousel-item">
		            	<div class="row">
		            		<div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('image/requiment/slide-6.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
	            	</div>
		        </div>
		        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
		            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		            <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
		            <span class="carousel-control-next-icon" aria-hidden="true"></span>
		            <span class="sr-only">Next</span>
		        </a>
		        <ol class="carousel-indicators">
                    <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExample" data-slide-to="1"></li>
                </ol>
		    </div>
		</div>
	</div>
	<div class="requiment-step">
		<div class="container">
			<div class="cb-path"></div>
			<p class="movie-top-text">動画作成STEP</p>
			<div class="row col-md-12 ">

				<div class="col-md-3 col-sm-12 col-xm-12">
					<div class="clearfix">
						<img class="image-step" src="{{asset('image/requiment/step-1.png')}}" alt="">
						<p class="text-title">事前準備</br>（打ち合わせ）</p>
					</div>
					<div>
						<p class="number">01</p>
						<p>ジョブシャドウの対象社員と撮影日の設定</p>
						<p class="row-2">希望の採用ターゲット像を基に学生を選定し事前面談</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-xm-12 arrow">
					<div>
						<img class="image-step" src="{{asset('image/requiment/step-2.png')}}" alt="">
						<p class="text-title">ジョブシャドウ&撮影</p>
						
					</div>
					<div>
						<p class="number">02</p>
						<p>ジョブシャドウ対象社員と職場の方の撮影協力</p>
						<p class="row-2">撮影スタッフ2～3名の1日撮影同行</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-xm-12 arrow">
					<div>
						
						<img class="image-step" src="{{asset('image/requiment/step-3.png')}}" alt="">
						<p class="text-title">映像化 </br>（編集・配信・拡散）</p>
					</div>
					<div>
						<p class="number">03</p>
						<p>作成した映像内容へのフィードバック</p>
						<p class="row-2">ジョブシャドウの様子を学生の声を交え映像化&拡散</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="requiment-content">
		<div class="container">
			<div class="content-text">
				<p>コスト、スケジュールやその他ご質問がございましたら、</p>
				<p>まずはお気軽にお問い合わせください</p>
			</div>
			<div class="content-button">
				<a href="{{route('contact')}}">お問い合わせはこちら</a>
			</div>
		</div>
	</div>
	
	<div class="requiment-convertion">
		<div class="container">
			<div class="cb-path"></div>
			<p class="movie-top-text">利用者の声</p>
			
			<div class="section-body">
			    <div id="uservoice_list">
			        <ul>
			            <li>
			                <a href="#" target="_blank">
								<img src="{{asset('image/requiment/convertion-1.png')}}" alt="">
								<div class="list-content">
									<div class="inner">
										<h3>サービスを利用してみた手応えはいかがでしたか？</h3>
										<p>言葉だけでは伝えきれない社員1人ひとりの個性的な魅力や提供するサービスを立体的に可視化できたと感じています。</br>
あとは、ジョブシャドウイング参加学生が、弊社へ長期インターンとして参画してくれたことも嬉しかったですね。</p>
									</div>
								</div>
							</a>
			            </li>
			            <li>
			                <a href="https://originalpoint.co.jp/recruit/013/" target="_blank">
								<img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/uservoice-image-2.jpg" alt="VOICE2">
								<div class="list-content">
								    <div class="inner">
								        <h3>サービスを利用してみた手応えはいかがでしたか？</h3>
								        <p>言葉だけでは伝えきれない社員1人ひとりの個性的な魅力や提供するサービスを立体的に可視化できたと感じています。</br>
あとは、ジョブシャドウイング参加学生が、弊社へ長期インターンとして参画してくれたことも嬉しかったですね。</p>
								    </div>
								</div>
							</a>
			            </li>
			        </ul>
			    </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
</script>
@endsection