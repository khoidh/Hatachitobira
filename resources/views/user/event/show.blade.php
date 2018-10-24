@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('title-e', 'Event')
@section('title-j', 'イベントに参加する')
@section('main')
    @parent
    <style>
        @media (max-width: 575.98px) {
            #app .home .main .title-lx .relative .info .absolute .title-j{
                letter-spacing: 0px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container event">
        <div class="row">
            <div class="tit col-sm-12">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <br>
                <p class="title">{{$event->title}}</p>
                <div class="heart">
                    <i class="heart-icon fa fa-heart-o">
                        <span class="heart-create-at">&nbsp&nbsp{{date('Y-m-d', strtotime($event->started_at))}}</span>
                    </i>
                </div>
                <hr class="shape-8"/>
            </div>

            <div class="txt col-sm-12 col-sm-12 col-xs-12">
                <div class="txt_content">
                    {!! $event->content !!}
                </div>
                <div class="txt-form">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="table-td_1" scope="row"><b>日程</b></td>
                            <td class="table-td_2">{{$event->started_at}} 〜 {{$event->closed_at}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>場所</b></td>
                            <td class="table-td_2">{{$event->address}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>概要</b></td>
                            <td class="table-td_2">{{$event->overview}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>参加費</b></td>
                            <td class="table-td_2">{{$event->entry_fee}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>定員</b></td>
                            <td class="table-td_2">{{$event->capacity}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center txt-btn">
            <div class="col-sm-6">
                @if(Auth::User())
                    @if($user_event_register == 0)
                    <form class="form-horizontal" action="{{route('event.update')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">送信</button>
                    </form>
                    @else
                    <form class="form-horizontal" action="{{ route('event.delete') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">キャンセル</button>
                    </form>
                    @endif
                @else
                    <button type="button" class="btn btn-primary btn-lg btn-block show-modal-register-mypage">送信</button>
                @endif
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click','.show-modal-register-mypage',function(e){
            e.preventDefault();
            $html = '';
            $html +='<div class="form-group code-top">';
                $html +='<div class="col-md-5">';
                $html +='<p class="title-register-mypage">お気に入りorイベント申し込みは社員限定機能です。動画やイベント、あなたの興味のあるものを貯めて、マイテーマを形作っていこう！</p>';
                $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                $html +='</div>';
                $html +='<img src="{{ asset("image/picture1.png") }}">';
            $html +='</div>';
            $html +='<div class="form-group">';
                    $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                $html +='<div class="col-md-10 col-md-offset-1" style="text-align: left;">';
                    $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                    $html +='<label class="lblcheckbox"><a class="link-redirect" href="/private-polisy">利用規約</a> と <a class="link-redirect" href="/private-polisy">プライバシーポリシー</a> に同意する </label>';
                $html +='</div>';
            $html +='</div>';
            $html +='<div class="form-group">';
                $html +='<div class="col-md-12">';
                    $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
                $html +='</div>';
            $html +='</div>';
            $html +='<div class="form-group">';
                $html +='<div class="col-md-12">';
                    $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
                $html +='</div>';
            $html +='</div>';
            $('#modal_register').find('.panel-body').html($html);
            $('#modal_register').modal('show');
        })
    })
</script>
@endsection

@section('javascript-add')
    {{--@parent--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('.favorite').click(function() {--}}
                {{--var user_id= $(this).find('.user_id').val();--}}
                {{--var event_id= $(this).find('.event_id').val();--}}
                {{--var favorite= $(this).find('.fa-heart-o');--}}
                {{--if(user_id) {--}}
                    {{--// alert($favorites_id)--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: '{{route('event.favorite')}}', // This is what I have updated--}}
                        {{--data: {user_id: user_id, event_id: event_id},--}}
                        {{--//=========--}}
                        {{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}--}}
                    {{--}).done(function (msg) {--}}
                        {{--alert(msg);--}}
                        {{--favorite.css('color', 'red');--}}
                        {{--favorite.css('disabled',true);--}}
                    {{--});--}}
                {{--}--}}
                {{--else--}}
                {{--{--}}
                    {{--// Chưa login--}}
                {{--}--}}
            {{--});--}}

            {{--function myFunction() {--}}
                {{--document.getElementById("demo").style.color = "red";--}}
            {{--}--}}
        {{--})--}}
    {{--</script>--}}
@endsection