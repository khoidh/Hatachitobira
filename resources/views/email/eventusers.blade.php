<div>このたびは、{イベント名}にお申し込みいただきありがとうございます。</div>
<div>内容は以下の通りです。</div>
<div>-----</div>
{{--<div> {{ $thisUser->name }}様</div>--}}
<div>イベント名 : {{ $thisUser->title }} </div>
<div>日程      ： {{ $thisUser->started_at }} ~ {{ $thisUser->closed_at }}</div>
<div>場所      ： {{ $thisUser->address }}</div>
<div>概要      ： {{ $thisUser->overview }}</div>
<div>参加費    ： {{ $thisUser->entry_fee}} ¥ </div>
<div>定員      ： {{ $thisUser->capacity}} 人</div>
<div>詳細ページURL ： {{route('event.show', $thisUser->id)}}</div>
<div>-----</div>
<br>
<div>入場時は、お申込みいただきました以下の情報をお伝えください。</div>
<div>-----</div>
<div>学校・学部     : </div>
<div>学年          : </div>
<div>申込み者のお名前: </div>
<div>お電話番号     : </div>
<div>メールアドレス : </div>
<div>質問          : </div>
<div>-----</div>
<br>
<div>イベントに関するご質問は、</div>
<div>info@originalpoint.co.jp</div>
<div>宛にご連絡ください。</div>
<br>
<div>当日のご来場を楽しみにしています。</div>
<br>
<div>ハタチのトビラ運営事務局</div>
<div>info@originalpoint.co.jp</div>