    
<div class="event-information-wrapper col-md-12 clearfix">
            <span id="error-message-upload" style="color: red"></span>
            <form action="{{url('file-upload')}}" id="fileupload" accept-charset="utf-8" class="dropzone dropzone-area" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <DIV class="dz-message needsclick">    
                    <i class="fa fa-camera fa-2x"></i>
                </DIV>
                
            <input type="hidden" name="month" value="{{isset($result->month) ? $result->month : $data['month']}}">
            <input type="hidden" name="year" value="{{isset($result->year) ? $result->year : $data['year']}}">
            <input type="hidden" name="category_id" value="{{isset($result->category_id) ? $result->category_id : $data['category_id']}}">
            <input type="hidden" name="id" value="{{isset($result) ? $result->id : ''}}">
            <input type="hidden" name="memo" value="{{isset($result_1) ? $result_1->memo : ''}}">
            <input type="hidden" name="last_log" value="{{isset($result_1) ? $result_1->last_log : ''}}">
            <input type="hidden" name="this_mytheme" value="{{isset($result_1) ? $result_1->this_mytheme : ''}}">
            <input type="hidden" name="this_action" value="{{isset($result_1) ? $result_1->this_action : ''}}">
        </form>
    <form action="" id="form_information" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="col-md-12 clearfix">
        <input type="text" name="description" class="image-description" placeholder="自分の名前を入力してください。" value="{{isset($result) ? $result->content_1 : ''}}">
    </div>
    <input type="hidden" name="content_lable" value="" id="content_label">
    <input type="hidden" name="month" id="data-month" value="{{isset($result->month) ? $result->month : $data['month']}}">
    <input type="hidden" name="year" id="data-year" value="{{isset($result->year) ? $result->year : $data['year']}}">
    <input type="hidden" name="category_id" id="data-cat_id" value="{{isset($result->category_id) ? $result->category_id : $data['category_id']}}">
    <input type="hidden" name="id" value="{{isset($result) ? $result->id : ''}}">
    <input type="hidden" name="memo" value="{{isset($result_1) ? $result_1->memo : ''}}">
    <input type="hidden" name="last_log" value="{{isset($result_1) ? $result_1->last_log : ''}}">
    <input type="hidden" name="this_mytheme" value="{{isset($result_1) ? $result_1->this_mytheme : ''}}">
    <input type="hidden" name="this_action" value="{{isset($result_1) ? $result_1->this_action : ''}}">
    <input type="hidden" name="content_lable" id="tmppath" value="{{isset($result) && $result->content_lable ? $result->content_lable : 'no_image.png'}}">
</div>
<script type="text/javascript">
    // Dropzone.autoDiscover = false;
    $(function() {
      // Now that the DOM is fully loaded, create the dropzone, and setup the
      // event listeners
      var myDropzone = new Dropzone("#fileupload",{
        url: "{{url('file-upload')}}",
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        maxFiles: 1
      });
      myDropzone.on("removedfile", function(file) {
        $('#tmppath').val('no_image.png');
        $('#dissmiss_modal_show').addClass('editing');
        $.ajax({
            url : '{{url("file-upload-remove?category_id=")}}'+ $('#data-cat_id').val() +'&year='+$('#data-year').val()+'&month='+$('#data-month').val(),
        })
        $('#error-message-upload').text('');
      });
      myDropzone.on("complete", function(file) {
        if (file.status =='success') {
          $('#dissmiss_modal_show').addClass('editing');
          var responseText = file.xhr.responseText.replace('"', "");
          responseText = responseText.replace('"', "");
          $('#tmppath').val(responseText);
          $('#error-message-upload').text('');
        }
        else {
          $('#error-message-upload').text(file.xhr.responseText + ' File size need smaller than 10MB');
        }
      });
      var file_name = "{{ isset($result) && $result->content_lable ? $result->content_lable : '' }}";
      var mockFile = { name: file_name, size: 12345 };
      if (file_name != '') {
        myDropzone.options.addedfile.call(myDropzone, mockFile);
        myDropzone.options.thumbnail.call(myDropzone, mockFile, "{{ asset('images/user/mypage')}}"+'/'+ file_name);
      }

    })
</script>