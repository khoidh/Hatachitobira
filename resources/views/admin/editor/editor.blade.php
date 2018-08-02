@extends('admin.home')

@section('javascrip')
<script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('js/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    var baseURL = "{!! url('/') !!}";
</script>
<script src="{{ asset('js/func_ckfinder.js')}}"></script>
@endsection

@section('content')
<div>
	<textarea id="ckeditor-text"></textarea>
	<script type="text/javascript">
        ckeditor("ckeditor-text");
    </script>
</div>
@endsection