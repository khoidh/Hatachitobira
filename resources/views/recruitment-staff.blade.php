@extends('layouts.app')
@section('css')
	<link href="{{ asset('css/recruitment-staff.css') }}" rel="stylesheet">
@endsection
@section('page_title', '企業採用担当の方へ')
@section('description', '「ハタチのトビラ」サービスの企業採用担当の方向けのページです。')
@section('title-e', 'RECRUITMENT STAFF')
@section('title-j', '企業採用担当の方へ')
@section('body-class', 'recruiment-page')
@section('content')
<div class="requiment-staff requiment-staff-mobile">
	<div class="requiment-staff-bg">
		<img style="width: 100%" src="{{ asset('images/user/requiment/requiment-1.png')}}" alt="">
	</div>
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
			<div class="cb-path" style="top: -73px !important;"></div>
		</div>
		<div class="video-requiment">
			<div class="container">
				<p class="movie-top-text">過去制作動画</p>
				<div class="video-detail row">
	                <div class="col-xs-12">
	                    <div class="corner-wrapper">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
					</div>
					<div class="col-xs-6" style="padding-right:5px;">
	                    <div class="corner-wrapper">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
					</div>
					<div class="col-xs-6" style="padding-left:5px;">
	                    <div class="corner-wrapper">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                </div>
	            </div>
				<a href="#">
		            <span class="more-detail ">動画をすべて見る</span>
		            <img src="{{ asset('images/user/top/arrow-1.png') }}" >
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
		            		<div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
	            	</div>
	            	<div class="carousel-item">
		            	<div class="row">
                            <div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
					</div>
					<div class="carousel-item">
		            	<div class="row">
                            <div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-6.png')}}" style="max-width:100%;">
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
					<li data-target="#carouselExample" data-slide-to="2"></li>
                </ol>
		    </div>
		</div>
	</div>
	<div class="requiment-step">
		<div class="container">
			<div class="cb-path"></div>
			<p class="movie-top-text">動画作成STEP</p>
			<div class="row" style="margin-top: 60px;">
				<div class="col-12 col-sm-12 requiment-step-col">
					<img class="image-step" src="{{asset('images/user/requiment/step_01.jpg')}}" alt="">
				</div>
				<div class="col-12 col-sm-12 requiment-step-col">
					<img class="image-step" src="{{asset('images/user/requiment/step_02.jpg')}}" alt="">
				</div>
				<div class="col-12 col-sm-12 requiment-step-col">
					<img class="image-step" src="{{asset('images/user/requiment/step_03.jpg')}}" alt="">
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
			<div class="buttons">
				<a class="round-button black lg" href="<?php echo e(route('contact')); ?>">お問い合わせはこちら</a>
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
								<img src="{{asset('images/user/requiment/convertion-1.png')}}" alt="">
								<div class="list-content">
									<div class="inner">
										<p class="inner-img"><img src="{{asset('images/user/requiment/before.png')}}" alt=""></p>
										<h3>サービスを利用してみた手応えはいかがでしたか？</h3>
										<p style="margin-bottom:0;">言葉だけでは伝えきれない社員1人ひとりの個性的な魅力や提供するサービスを立体的に可視化できたと感じています。</p>
										<p style="margin-top:0;">あとは、ジョブシャドウイング参加学生が、弊社へ長期インターンとして参画してくれたことも嬉しかったですね。</p>
										<p class="inner-img"><img src="{{asset('images/user/requiment/affter.png')}}" alt="" ></p>
									</div>
								</div>
							</a>
			            </li>
			            <li style="margin-top:0;">
			                <a href="https://originalpoint.co.jp/recruit/013/" target="_blank">
								<img src="{{asset('images/user/requiment/convertion-2.png')}}" alt="">
								<div class="list-content">
									<div class="inner">
										<p class="inner-img"><img src="{{asset('images/user/requiment/before.png')}}" alt=""></p>
										<h3>ハタチのトビラに参加してみていかがでしたか？</h3>
										<p style="margin-bottom:0;">私の以前働いていたインターン先では、社員 の方と仕事でのコミユニケーションはあって も、将来や仕事観等について深くお話する機 会はないので‘1日に多くの社員の方とコミユ ニケーションを取れる機会はすごく貴重でし た。働く現場の実態を知ることができました ね。</p>
										<p class="inner-img"><img src="{{asset('images/user/requiment/affter.png')}}" alt="" ></p>
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
<div class="requiment-staff requiment-staff-desktop">
	<div class="requiment-staff-bg">
		<img style="width: 100%" src="{{ asset('images/user/requiment/requiment-1.png')}}" alt="">
	</div>
	<div class="top clearfix">
		<div class="container content-1 requiment">
		    <div class="content-title">
		        <p class="content-1-title text-stroke">自社の事業や仕事の魅力を</p>
		        <p class="content-1-title text-stroke">学生に訴求する動画を</p>
		        <p class="content-1-title text-stroke">創りませんか ？</p>
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
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                </div>
	                <div class="col-md-3 video-movie ">
	                    <div class="corner-wrapper pdd">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                    <div class="corner-wrapper pdd">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                    <div class="corner-wrapper">
	                        <img src="{{ asset('images/user/requiment/requiment-2.png')}}" alt="">
	                    </div>
	                </div>
	            </div>
				<a href="#">
		            <span class="more-detail ">動画をすべて見る</span>
		            <img src="{{ asset('images/user/top/arrow-1.png') }}" >
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
                                    <img src="{{asset('images/user/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 ol-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-6.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
	            	</div>
	            	<div class="carousel-item">
		            	<div class="row">
		            		<div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-6.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
					</div>

					<div class="carousel-item">
		            	<div class="row">
		            		<div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-6.png')}}" style="max-width:100%;">
                                </a>
                            </div>
		            	</div>
					</div>
					<div class="carousel-item">
		            	<div class="row">
		            		<div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-1.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-2.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-3.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-4.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-5.png')}}" style="max-width:100%;">
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xm-2">
                                <a href="#">
                                    <img src="{{asset('images/user/requiment/slide-6.png')}}" style="max-width:100%;">
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
					<li data-target="#carouselExample" data-slide-to="2"></li>
					<li data-target="#carouselExample" data-slide-to="3"></li>
                </ol>
		    </div>
		</div>
	</div>
	<div class="requiment-step">
		<div class="container">
			<div class="cb-path"></div>
			<p class="movie-top-text">動画作成STEP</p>
			<div class="row col-md-12" style="margin: auto -55px;padding:0;">
				<img class="image-step" src="{{asset('images/user/requiment/step_123.png')}}" alt="">
			</div>
		</div>
	</div>
	<div class="requiment-content">
		<div class="container">
			<div class="content-text mb-40">
				<p>コスト、スケジュールやその他ご質問がございましたら、</p>
				<p>まずはお気軽にお問い合わせください</p>
			</div>
			<div class="buttons">
				<a class="round-button black lg" href="<?php echo e(route('contact')); ?>">お問い合わせはこちら</a>
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
								<img src="{{asset('images/user/requiment/convertion-1.png')}}" alt="">
								<div class="list-content">
									<div class="inner">
										<p class="inner-img"><img src="{{asset('images/user/requiment/before.png')}}" alt=""></p>
										<h3 class="underline-text">サービスを利用してみた手応えはいかがでしたか？</h3>
										<p>言葉だけでは伝えきれない社員1人ひとりの個性的な魅力や提供するサービスを立体的に可視化できたと感じています。</br>
											あとは、ジョブシャドウイング参加学生が、弊社へ長期インターンとして参画してくれたことも嬉しかったですね。</p>
										<p class="inner-img"><img src="{{asset('images/user/requiment/affter.png')}}" alt="" ></p>
									</div>
								</div>
							</a>
			            </li>
			            <li>
			                <a href="https://originalpoint.co.jp/recruit/013/" target="_blank">
								<div class="list-content">
								    <div class="inner">
										<p class="inner-img"><img src="{{asset('images/user/requiment/before.png')}}" alt=""></p>
								        <h3 class="underline-text">ハタチのトビラに参加してみていかがでしたか？</h3>
								        <p>私の以前働いていたインターン先では、社員 の方と仕事でのコミユニケーションはあって も、将来や仕事観等について深くお話する機 会はないので‘1日に多くの社員の方とコミユ ニケーションを取れる機会はすごく貴重でし た。働く現場の実態を知ることができました ね。</p>
										<p class="inner-img"><img src="{{asset('images/user/requiment/affter.png')}}" alt="" ></p>
								    </div>
								</div>
								<img src="{{asset('images/user/requiment/convertion-2.png')}}" alt="">
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