<div><p> {{ $thisUser->name }}様</p></div>

<div><p> {{ $thisUser->title }} への参加のお申込みを受け付けました。</p></div>
<div><p>日程    ： {{ $thisUser->started_at }} - {{ $thisUser->closed_at }}</p></div>
<div><p>場所    ： {{ $thisUser->address }}</p></div>
<div><p>概要    ： {{ $thisUser->overview }}</p></div>
<div><p>参加費： {{ $thisUser->entry_fee}}</p></div>
<div><p>定員： {{ $thisUser->capacity}}</p></div>

<div><p>当日の参加、お待ちしております。</p></div>