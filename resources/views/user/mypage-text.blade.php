<div class="event-information-wrapper col-md-12 clearfix">
    <div class="title-detail">
        <span class="texxt">{{$data['_text']}}</span>
    </div>
</div>
<div class="event-information-wrapper col-md-12 clearfix">
    <textarea style="width: 100%;border: none;" type="text" rows="3"
      class="model-textarea-edit"
      data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data['month']}}"
      data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data['year']}}"
      data-value="{{$data['field']}}"
      data-type = "{{$data['typies']}}"
      placeholder="{{$data['placehoder']}}"
      >{{$data['field']}}</textarea>
</div>