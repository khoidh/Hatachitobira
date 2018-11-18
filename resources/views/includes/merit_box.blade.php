<div class="c-col c-merit_box">
    <div class="image">
        <img src="{{ asset($image) }}" alt="{{ $title }}">
        <span class="number">{{ str_pad($number, 2, 0, STR_PAD_LEFT) }}</span>
    </div>
    <p class="title">{!! nl2br($title) !!}</p>
    @isset($body)
        <p class="body">{!! nl2br($body) !!}</p>
    @endisset
</div>