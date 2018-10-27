
<div><p>{{$thisUser->first_name}} {{$thisUser->last_name}} 様</p></div>
<div><p>お問い合わせありがとうございます。</p></div>
<div><p>下記の内容でお問い合わせを受付いたしました。</p></div>
<div>
	<p>問い合わせ内容: {{$thisUser->category_id == 1? '企業' : 'その他'}}</p>
</div>
<div><p>企業名: {{$thisUser->company}}</p></div>
<div><p>住所: {{$thisUser->content}}</p></div>
<div><p>回答まで、今しばらくおまちください。</p></div>
	