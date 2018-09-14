@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <h3>あなたを形作るマイテーマワードを記入しよう</h3>
    <div class="container mypage">
        <div class="event-information">
            <a class="a-user" href="#">このパーツの使い方はこちら</a>
        </div>
        <div class="event-information select-month"> 
            <h4><i class="fa fa-caret-left fa-3x" aria-hidden="true"></i><span class="text-month">2018年9月</span></h4>
        </div>
        <div class="event-information">
            <div class="col-md-2">今月のマイテーマ：</div>
            <div class="col-md-10">
                <input type="text" name="" style="width: 100%">
            </div>
            <div class="col-md-8">実現するために行う予定の行動目標：</div>
            <div class="col-md-12 col-sm-12">
                <input type="text" name="" style="width: 100%; margin-top: 10px">
            </div>
        </div>
    	<div class="event-information">
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>1</span>
                    </div>
                    <div class="mypage-text">
                        <span>テキストテキストテ
                                キストテキストテキ
                                ストテキストテキスト
                                テキスト</span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>2</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>3</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>4</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
    		<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
	    				<img src="{{ asset('image/column/column02.jpg')}}">
                    </div>
    			</div>
    		</div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>5</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>6</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>7</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
                <div class="event-information-content">
                    <div class="number">
                        <span>8</span>
                    </div>
                    <div class="mypage-text">
                        <span></span>
                        <div class="favorite edit">
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">メモ：</div>
            <div class="col-md-12">
                <input type="text" name="" style="width: 100%">
            </div>
        </div>
       
    	<div class="event-information e-vent-border">
    		<div class="select-item col-md-3">
    			<select class="">
    				<option value="0">あなたのカテゴリ</option>
    				<option value="1">あなたのカテゴリ</option>
    				<option value="2">あなたのカテゴリ</option>
    				<option value="3">あなたのカテゴリ</option>
    			</select>

    		</div>
    		<div class="select-item-label col-md-3" ><p>の新着</p></div>
    	</div>
    	<div class="event-information">
    		<div class="item">
                <div class="wrapper">
                    <div class="icon">
                        <img src="{{asset('image/mypage/image_mypage.png')}}" >
                        <div class="favorite">
                        	<i class="fa fa-heart-o" style="font-size:24px;"></i>
                        </div>
                    </div>
                    <div class="content clearfix" >
                        <div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>
                        <div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>
                        <div class="category clearfix"><p class="text-category">#カテゴリ</p></div>
                        <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                    </div>
                </div>
            </div>
            
    	</div>
    	<div class="event-information">
    		<div class="event-show-detail">
            	<button class="btn btn-default">一覧を見る</button>
            </div>
    	</div>
    	<div class="event-information">
    		<div class="panel-body">
    			<div class="clearfix">
	    			<a class="text-link" href="#">お気に入り動画(3)</a>
    			</div>
    			<div class="content-video">
    				<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
	                        </div>
	                        <div class="description">
	                            <p>部活の先輩後輩のキス【ファーストキス】</p>
	                            <span>58531 Views</span>
	                            <span>7 month ago</span>
	                        </div>
	                    </div>
    				</div>
    				<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
	                        </div>
	                        <div class="description">
	                            <p>部活の先輩後輩のキス【ファーストキス】</p>
	                            <span>58531 Views</span>
	                            <span>7 month ago</span>
	                        </div>
	                    </div>
    				</div>
    				<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img  class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
	                        </div>
	                        <div class="description">
	                            <p>部活の先輩後輩のキス【ファーストキス】</p>
	                            <span>58531 Views</span>
	                            <span>7 month ago</span>
	                        </div>
	                    </div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="event-information">
    		<div class="panel-body">
    			<div class="clearfix">
	    			<a class="text-link" href="#">イベントを探す(0)</a>
    			</div>
    			<div class="content-column">
    				<p>社会人から話を聞いて、マイテーマ探しをしてみよう</p>
    				<div class="event-show-detail">
    					<button class="btn btn-default">一覧を見る</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="event-information">
    		<div class="panel-body">
                <h4 class="text-link">参加したイベント(1)</h4>
    			<div class="content-text">
    				<div class="item">
		                <div class="wrapper">
		                    <div class="icon">
		                        <img src="{{asset('image/mypage/image_mypage.png')}}" >
		                    </div>
		                    <div class="content clearfix" >
		                        <div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>
		                        <div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>
		                        <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
		                    </div>
		                </div>
		            </div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<div id="show-detail-mypage" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">
                    <div class="event-information-wrapper col-md-4 col-md-offset-4 clearfix">
                        <div class="event-information-content">
                            <div class="number">
                                <span class="mypage-number">1</span>
                            </div>
                            <div class="mypage-text">
                                <span>テキストテキストテ
                                        キストテキストテキ
                                        ストテキストテキスト
                                        テキスト</span>
                                
                            </div>
                        </div>
                        <div class="title-detail">
                            <span class="mypage-number">1</span> の要素を深掘り
                        </div>
                    </div>
                    <div class="col-md-12 detail-infor">
                        <div class="event-information-content col-md-5 col-md-offset-1">
                            テキストテキストテ キストテキスト
                        </div>
                         <div class="event-information-content col-md-5 col-md-offset-1">
                            テキストテキストテ キストテキスト
                        </div>
                         <div class="event-information-content col-md-5 col-md-offset-1">
                            テキストテキストテ キストテキスト
                        </div>
                         <div class="event-information-content col-md-5 col-md-offset-1">
                            テキストテキストテ キストテキスト
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection