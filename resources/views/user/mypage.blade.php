@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <h3>あなたを形作るマイテーマワードを記入しよう</h3>
    <div class="container mypage">
    	<div class="event-information">
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    		<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    			<div class="event-information-content">
    				<div class="event-image">
    					
	    				<img src="{{ asset('image/column/column02.jpg')}}">
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="event-information">
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
    				<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
	                        </div>
	                        <div class="description">
	                            <p>部活の先輩後輩のキス【ファーストキス】</p>
	                            <span>58531 Views</span>
	                            <span>7 month ago</span>
	                        </div>
	                    </div>
    				</div>
    				<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
	                        </div>
	                        <div class="description">
	                            <p>部活の先輩後輩のキス【ファーストキス】</p>
	                            <span>58531 Views</span>
	                            <span>7 month ago</span>
	                        </div>
	                    </div>
    				</div>
    				<div class="event-information-wrapper col-lg-4 col-sm-6 col-xs-12">
    					<div class="wrapper">
	                        <div class="thump">
	                            <img src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">
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
	    			<a class="text-link" href="#">参加したイベント(0)</a>
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
@endsection