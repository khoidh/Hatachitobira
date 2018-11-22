<div class="event-information-wrapper col-md-12 clearfix">
    <div class="title-detail">
        <span class="texxt">{{$data['_text']}}</span>
    </div>
</div>
<div class="event-information-wrapper col-md-12 clearfix">
    <textarea style="width: 100%;border: none;" type="text" rows="3" id="action-of-month" class="input-action" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data['month']}}" data-value="{{$data['field']}}"
                        data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data['year']}}" placeholder="{{$data['placehoder']}}"
                        data-type = "{{$data['typies']}}">{{$data['field']}}</textarea>

</div>