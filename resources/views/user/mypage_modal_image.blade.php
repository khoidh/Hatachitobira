<form action="mypage_modal_image_submit" id="form_information" accept-charset="utf-8">
    <div class="event-information-wrapper col-md-12 clearfix">
        <div class="col-md-12 clearfix">
            <input type="file" name="file-image" accept=".png, .jpg, .jpeg" class="file-image" value="{{isset($result) ? $result->content_lable : ''}}">
        </div>
        <div class="col-md-12 clearfix">
            <input type="text" name="description" class="image-description" placeholder="Description" value="{{isset($result) ? $result->content_1 : ''}}">
        </div>
        <input type="hidden" name="month" value="{{isset($result->month) ? $result->month : $data['month']}}">
        <input type="hidden" name="year" value="{{isset($result->year) ? $result->year : $data['year']}}">
        <input type="hidden" name="category_id" value="{{isset($result->category_id) ? $result->category_id : $data['category_id']}}">
        <input type="hidden" name="id" value="{{isset($result) ? $result->id : ''}}">
        <input type="hidden" name="memo" value="{{isset($result_1) ? $result_1->memo : ''}}">
        <input type="hidden" name="last_log" value="{{isset($result_1) ? $result_1->last_log : ''}}">
        <input type="hidden" name="this_mytheme" value="{{isset($result_1) ? $result_1->this_mytheme : ''}}">
        <input type="hidden" name="this_action" value="{{isset($result_1) ? $result_1->this_action : ''}}">
        <input type="hidden" name="tmppath" id="tmppath" value="{{isset($result) && $result->content_lable ? asset('image/mypage/'.$result->content_lable) : asset('image/mypage/mypage-01.png')}}">
    </div>
</form>
