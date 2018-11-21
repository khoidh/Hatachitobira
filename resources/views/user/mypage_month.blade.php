<link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
<div class="col-sm-12 how-to-use">
    <a class="a-user" href="#">
        <i class="fa fa-question-circle-o"></i>
        <span class="a-user-text" >&nbsp;このパーツの使い方はこちら</span>
    </a>
</div>
<div class="col-sm-12 select-month">
    <h1>
        <i class="fa fa-chevron-circle-left icon-back" data-month="{{$data_search['month'] == 1 ? '12' : $data_search['month'] - 1}}" data-year = "{{$data_search['month'] == 1 ? $data_search['year'] - 1 : $data_search['year']}}" aria-hidden="true"> </i>
        <b>&nbsp;{{$data_search['year']}}年{{$data_search['month']}}月&nbsp;</b>
        <i class="fa fa-chevron-circle-right {{$data_search['month'] >= $data_date['month'] && $data_search['year'] >= $data_date['month'] ? 'icon-next' : 'icon-back'}}" aria-hidden="true" data-month="{{$data_search['month'] == 12 ? '1' : $data_search['month'] + 1}}" data-year = "{{$data_search['month'] == 12 ? $data_search['year'] + 1 : $data_search['year']}}"> </i>
    </h1>
</div>
<div class="col-sm-12 info-1">
    <div class="row memo">
        <div class="col-sm-2 memo-text">
            <h5 class="underline-text font-weight-bold">&nbsp;MEMO&nbsp;</h5>
        </div>
        <div class="col-sm-10 memo-input">
           <textarea type="text" name="" class="input-memo" 
            data-month="{{$data_search['month']}}"  readonly 
            data-year="{{$data_search['year']}}"  
            placeholder="先月の行動を振り返り記録しよう"
            data-value = "{{$mytheme_first? $mytheme_first->memo : ''}}"
            > {{$mytheme_first? $mytheme_first->memo : ''}}</textarea>
            <i class="fa fa-pencil pencil-memo pencil-action-click"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-type="memo"
                        >
                                        <span>Edit</span></i>
        </div>
    </div>
    <hr class="shape-8"/>
    <div class="row log">
        <div class="col-sm-2 log-text">
            <h5 class="underline-text font-weight-bold">&nbsp;先月のログ&nbsp;</h5>
        </div>
        <div class="col-sm-10 log-input">
            <input type="text" name="" class="input-lat-log" data-role="tagsinput" data-month="{{$data_search['month']}}" data-value="{{$mytheme_first ? $mytheme_first->last_log : ''}}"
                                data-year="{{$data_search['year']}}" placeholder="先月の自分を#で記録しよう　#バイト三昧　#初ボランティア" value="{{$mytheme_first ? $mytheme_first->last_log : ''}}">

        </div>
    </div>
</div>
<div class="col-sm-12 col-xs-12 panel-info">
    <div class="row">
        @php ($index=1)
        @for ($i = 0; $i < 9; $i++)
            <?php $key = $i>4 ? $i : $i+1 ?>
            @if($i!=4)
            <div class="col-sm-4 col-xs-4 col-4 panel-info-wrapper">
                <div class="panel-info-content {{$i%2 == 1 ? 'chan' : ''}}"
                    data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_search['month']}}" 
                    data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_search['year']}}" 
                    data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                    data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                >
                    <div class="number">
                        <span>0{{$index++}}</span>
                    </div>
                    <div class="mypage-text">
                        <span>
                            <textarea name="value-lable" class="edit-input-lable" 
                                data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_search['month']}}" 
                                data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_search['year']}}" 
                                data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                placeholder="マイテーマにつながる要素を入力しましょう" disabled>{{isset($mythemes[$i]->content_lable) ? $mythemes[$i]->content_lable : ''}}</textarea>
                        </span>
                    </div>
                    <div class="favorite edit label">
                        <i class="fa fa-pencil"
                            data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_search['month']}}" 
                            data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_search['year']}}" 
                            data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                            data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                        >
                            <span>Edit</span></i>
                    </div>
                </div>
            </div>
            @else
                {{--05--}}
                <div class="col-sm-4 col-xs-4 col-4 panel-info-wrapper">
                    <div class="event-image">
                        <img src="{{isset($mythemes['9']->content_lable) ? asset('images/user/mypage/'.$mythemes['9']->content_lable) : asset('images/user/mypage/no_image.png')}}" alt="">
                        <div class="description"> {{isset($mythemes['9']->content_1) ? $mythemes['9']->content_1 : ''}}</div>
                        <div class="favorite edit image">
                            <i class="fa fa-pencil"
                                data-month="{{isset($mythemes['9']->month) ? $mythemes['9']->month : $data_search['month']}}" 
                                data-year="{{isset($mythemes['9']->year) ? $mythemes['9']->year : $data_search['year']}}" 
                                data-category = "{{isset($mythemes['9']->category_id) ? $mythemes['9']->category_id : '9'}}" 
                                data-id = "{{isset($mythemes['9']->id) ? $mythemes['9']->id : ''}}"
                            ><span>Edit</span></i>
                        </div>
                    </div>
                </div>
                {{--@php ($i--);--}}
            @endif
        @endfor
    </div>
</div>
<div class="col-sm-12 info-2">
    <div class="row my-theme">
        <div class="col-sm-3 my-theme-text">
            <h5 class="underline-text font-weight-bold">&nbsp;今月のマイテーマ&nbsp;</h5>
        </div>
        <div class="col-sm-9 my-theme-input">
            <textarea type="text" name="my-therme-month" class="input-my-theme" readonly
            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
            placeholder="例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？」"
            data-value ="{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}"
                        >{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}</textarea>
            <i class="fa fa-pencil pencil-theme pencil-action-click"
                data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                data-type="theme"
            >
                                        <span>Edit</span></i>
        </div>
    </div>
    <hr class="shape-8"/>
    <div class="row action">
                    <div class="col-sm-3 action-text">
                        <h5 class="underline-text font-weight-bold">&nbsp;今月のアクション &nbsp;</h5>
                    </div>
                    <div class="col-sm-9 action-input">
                         <textarea style="width: 100%;border: none;" type="text" rows="2" readonly name="action-of-month" class="action-of-month"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            placeholder="考えたいこと、行動したいことを3つ決めよう" 
                            data-value="{{$mytheme_first ? $mytheme_first->this_action : ''}}"
                        >{{$mytheme_first ? $mytheme_first->this_action : ''}}</textarea>
                        <i class="fa fa-pencil pencil-action pencil-action-click"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-type="action"
                        >
                                        <span>Edit</span></i>
                    </div>
                   
                </div>
    <hr class="shape-8"/>
</div>
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>