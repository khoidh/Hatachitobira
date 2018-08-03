@extends('admin.home')

@section('javascrip')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2it6o345n9m69rt8fldr7z4pqq61l14ty56xvd2q076vo1y3"></script> -->

@endsection

@section('content')
<div>
	<textarea id="ckeditor-text"></textarea>
	<script type="text/javascript">
        CKEDITOR.replace('ckeditor-text' );
    </script>
</div>
<!-- <div style="margin-top: 20px">
    <textarea id="ckeditor-text1"></textarea>
	<script type="text/javascript">
        tinymce.init({ selector:'#ckeditor-text1' });
    </script>
</div> -->
@endsection