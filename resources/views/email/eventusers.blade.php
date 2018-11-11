<div>このたびは、{イベント名}にお申し込みいただきありがとうございます。</div>
<div>内容は以下の通りです。</div>
<div>-----</div>
{{--<div> {{ $thisUser['name }}様</div>--}}
<div>イベント名 : {{ $thisUser_add['title'] }} </div>
<div>日程      ： {{ $thisUser_add['started_at'] }} ~ {{ $thisUser_add['closed_at'] }}</div>
<div>場所      ： {{ $thisUser_add['address'] }}</div>
<div>概要      ： {{ $thisUser_add['overview'] }}</div>
<div>参加費    ： {{ $thisUser_add['entry_fee'] }} ¥ </div>
<div>定員      ： {{ $thisUser_add['capacity'] }} 人</div>
<div>詳細ページURL ： {{route('event.show', $thisUser_add['id']) }}</div>
<div>-----</div>
<br>
<div>入場時は、お申込みいただきました以下の情報をお伝えください。</div>
<div>-----</div>
<div>学校・学部     : {{$thisUser_add['school'] }}</div>
<div>学年          : {{$thisUser_add['school_year'] }}</div>
<div>申込み者のお名前: {{$thisUser_add['name'] }}</div>
<div>お電話番号     : {{$thisUser_add['phone_number'] }}</div>
<div>メールアドレス : {{$thisUser_add['mail_address'] }}</div>
<div>質問          : {{$thisUser_add['question'] }}</div>
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