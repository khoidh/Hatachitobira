@php
    $column_state="";
    if($column->type == 1)
        $column_state = "コラム";
    else
        $column_state = "インタビュー";
@endphp
<div class="article-status">
    <hr class="shape-8"/>
    <img
        @if($column->type == 0)
            src="{{asset('images/user/column/column-icon.png')}}" alt="column-icon.png"
        @else
            src="{{asset('images/user/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
        @endif
    >
    <span style="">{{$column_state}}</span>
    {{-- @if($column->type ==1) left: 25px; @endif --}}
</div>