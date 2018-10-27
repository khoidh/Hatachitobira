<div class="event-information-wrapper col-md-12 clearfix">
    <div class="event-information-content clearfix">
        <div class="number clearfix">
            <span class="mypage-number">0{{$data['category_id']}}</span>
        </div>
        <div class="mypage-text clearfix">
            <textarea name="value-lable" class="edit-input-lable" 
                                                data-month="{{isset($result->month) ? $result->month : $data['month']}}" 
                                                data-year="{{isset($result->year) ? $result->year : $data['year']}}" 
                                                data-category = "{{isset($result->category_id) ? $result->category_id : $data['category_id']}}" 
                                                data-id = "{{isset($result) ? $result->id : ''}}"
                                                placeholder="Click here to edit">{{isset($result) ?  $result->content_lable :'' }}</textarea>
        </div>
    </div>
    <div class="title-detail">
        <span>0{{$data['category_id']}} の要素を深掘り</span>
    </div>
</div>
<div class="col-md-12 detail-infor row">
    @for($i = 1; $i < 5; $i++)
    <?php $content = 'content_'.$i; ?>
    <div class="event-information-content col-md-6">
        <textarea name="value-lable" class="edit-input-content" 
            data-month="{{isset($result->month) ? $result->month : $data['month']}}" 
            data-year="{{isset($result->year) ? $result->year : $data['year']}}" 
            data-category = "{{isset($result->category_id) ? $result->category_id : $data['category_id']}}" 
            data-id = "{{isset($result) ? $result->id : ''}}"
            data-content = "{{$i}}"
            placeholder="Click here to edit">{{ isset($result) ?  $result->$content : ''}}</textarea>
    </div>
    @endfor
</div>