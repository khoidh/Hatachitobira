<?php

use Illuminate\Database\Seeder;

class Columns extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete data in table before seed
        DB::table('columns')->delete();

        //run seed
        for($i=1;$i<=20;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 1,
                'title'         => '採用担当者×大学生で考える、採用におけるジョブシャドウイング映像化の効果とは？〜ハタチのトビラの魅力に迫る〜',
                'description'   => '米国では定着している職業教育の一種で、社会人の1日の仕事を「体験する」インターンシップとは異なり「観察する」というのがその特徴です。',
                'content'       => '<h3>ジョブシャドウイングを映像化するハタチのトビラとは</h3>

<p>ジョブシャドウイングという言葉をご存知でしょうか？</p>

<p>米国では定着している職業教育の一種で、社会人の1日の仕事を「体験する」インターンシップとは異なり「観察する」というのがその特徴です。</p>

<p>弊社では、企業側の「自社の魅力を学生に訴求できていない」といった問題意識や、大学生側の「世の中にどんな仕事があるのか、よくわからない」「説明会や採用ページをみるだけでは、情報として不足している」といった声に応えるために、ジョブシャドウイングの様子を映像化して学生に訴求する「ハタチのトビラ」というサービスを展開しています。</p>

<p>本日は、ガイアの夜明けにも取り上げられ勢いにのる、インバウンドビジネスを展開するスタートアップベンチャー（株）Huberの事例から、ジョブシャドウイングにおける採用への効果や、学生の気づきや学びをインタビュー致しました。</p>

<p>採用担当者と学生それぞれの視点から、ジョブシャドウイングについての理解を深めてみてください。</p>

<h3>採用担当者として、ジョブシャドウイング映像化を実施して得た２つのこと</h3>

<p><img alt="" src="http://originalpoint.co.jp/wp-content/uploads/2018/01/c9cf7bf04b36b9f9bfaeec613c641539-e1517054058792.jpg" style="height:467px; width:700px" /></p>

<p><strong>ージョブシャドウイング映像化（ハタチのトビラ）導入の背景を教えてください</strong></p>

<p>弊社は、「世界中の人たちを友達に」というMissionを掲げインバウンド事業に取り組むスタートアップベンチャーです。</p>

<p>今回の施策導入の背景としては、ガイアの夜明けをはじめとするメディアへの露出も増え、サービスの認知が高まってきた一方で、採用という文脈において弊社で働くという選択肢を認知してもらう機会はまだまだ提供できていないと感じていたからです。</p>

<p><strong>ー実際に、映像化してみて手応えとしていかがでしたか？</strong></p>

<p>そうですね。手応えとしては大きく2つ感じています。</p>

<p>1つは採用担当の私やジョブシャドウイングの対象となった2人の社員をはじめ、自社の価値を改めて実感する機会となったことです。</p>

<p>参加してくれた学生の質問やリアルな感想を通じて、客観的に自社のサービスや風土について考える機会となりました。</p>

<p>動画をみてもわかるように、2人の表情や姿勢からは、ポリシーを感じますよね。2つめは、Huberの魅力を紐解いて映像として可視化してくれたことです。</p>

<p>Huberの魅力というのは、サービスを通じて世界中の人が友達になることや、サービスを提供する我々同士も向き合いつながっていくことです。</p>

<p>弊社の社長も「動物園のような組織をつくりたい」と語ってますが、言葉だけでは伝えきれない社員1人ひとりの個性的な魅力や提供するサービスを立体的に可視化できたと感じています。</p>

<p><strong>ー社員の方々の発言に加え、学生のリアルな感想からも、御社の魅力が伝わってきますよね</strong></p>

<p><img alt="" src="http://originalpoint.co.jp/wp-content/uploads/2018/01/IMG_0724-e1517054216400.jpg" style="height:467px; width:700px" /></p>

<p>そうですね。今回参加してくれた長谷川さん（明治大学２年生）からは、将来について真剣に向き合っている姿勢を感じましたし、自分の学生時代と比較して優秀だなと感心しましたね。</p>

<p>正直、学生のポテンシャルを侮っていたかもしれません。</p>

<p>あとは、ジョブシャドウイング参加後、弊社へ長期インターンとして参画してくれたことも嬉しかったですね。</p>

<h3>大学生として感じるジョブシャドウイングの魅力とは</h3>

<p><img alt="" src="http://originalpoint.co.jp/wp-content/uploads/2018/01/IMG_0722-e1517054821426.jpg" style="height:425px; width:700px" /></p>

<p><strong>ー今回参加しようと思った理由を教えてください</strong></p>

<p>デザイナーという職種について漠然と興味があったのが、まず参加しようと思った動機です。</p>

<p>また、海外志向は元々あって、夏休みはマレーシアで長期の海外インターンにも参加していたので「世界中の人と友達に」というHuberのMissionにも共感する部分が大きかったですね。</p>

<p>また、CtoCの事業についても興味を持ちましたね。</p>

<p><strong>ー参加して、どんなことを感じたか教えてください</strong></p>

<p>私のインターンシップ先では、社員の方と仕事でのコミュニケーションはあっても、将来や仕事観等について深くお話する機会はないので、1日に多くの社員の方とコミュニケーションを取れる機会はすごく貴重でした。現場の実態を知ることができましたね。</p>

<p>特に、デザイナーの三浦さんが仰っていた「好きだからデザイナーをやっている」という言葉は印象的でした。全ての方がそういう訳ではないと思いますが、なんとなく仕事をしている社会人が多いのかなと漠然と思っていたので&hellip;</p>

<p><strong>ーイメージだけで判断せずに、リアルに知るということって大切ですよね</strong></p>

<p>そうですね。今回はじめて間近でCtoCというビジネスモデルについて知れたのも大きかったですね。Airbnb (エアビーアンドビー)なんかは有名ですが、改めてこのビジネスモデルの可能性や価値に気づけたことも学びの一つです。</p>

<p>また、動画を見返すと自分が話していた言葉が視覚的に言語化されることで、改めて自分について整理する機会にもなりました。ジョブシャドウイング参加を通じて、将来どのような方向に進むのかの一歩目の決断ができたことも自分にとって貴重な機会でした。</p>

<h3>インタビュー後記：採用施策を考える前にやるべきことは、魅力の再定義</h3>

<p>インターンシップや説明会を企画するにあたっては、そもそもターゲット学生に対してどんな魅力を訴求するのかを言語化する必要があります。</p>

<p>事業の魅力、人・風土の魅力等、自社の魅力が曖昧な中で採用手法を工夫したところで、採用力は磨かれません。</p>

<p>ジョブシャドウイングという施策は勿論、広報施策のオプションの一つではありますが、自社の魅力を現場社員が捉えなおし、学生が客観的にリアルな言葉で社内・外に発信する一つの機会でもあります。</p>

<p>みなさんも改めて、自社の魅力について様々な角度から考えてみてはいかがでしょうか？</p>

<p>※ハタチのトビラでは1分の広報動画と20分の本編動画を作成しております。是非、Huberの事業を疑似体験してみてください。1分動画は以下よりご覧ください</p>',
                'image'         => 'column01.jpg',
                'sort'          => 1,
                'type'          => 1,
                'created_at'    => '2018-09-06 07:00:00',
                'updated_at'    => '2018-09-06 07:00:00',
            ]);
        }
        for($i=21;$i<=40;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 2,
                'title'         => 'バブル知らない世代vsバブル知っている世代〜18卒新入社員のキャリア観とは〜',
                'description'   => '毎年新人研修の時期になると、うんざりするくらい『主体性が不足している』『相手視点がない』等といった声があがってきます。新人と一回りも二回りも年齢が離れた諸先輩方からすると「俺たちの時代は…」と違和感を感じるのは当然のことかもしれません。',
                'content'       => '<h3>18卒新入社員を職場に受け入れるにあたって</h3>

<p>毎年新人研修の時期になると、うんざりするくらい『主体性が不足している』『相手視点がない』等といった声があがってきます。新人と一回りも二回りも年齢が離れた諸先輩方からすると「俺たちの時代は&hellip;」と違和感を感じるのは当然のことかもしれません。</p>

<p>ただ、それは新人も同じような違和感を感じています。</p>

<p>「自慢話を聞かされる飲み会の楽しさがわからない」「何も決まらない、進捗報告を読み上げる会議に時間を注ぐ意味がわからない」「上司が話したいことを話す面談の価値がわからない」等々、少なからず「あの上司苦手だわ〜」といった感覚を持っている新人も少なくありません。</p>

<p>こうした相互の感覚の違いは、育ってきた時代背景や環境が違うからこそ、起きてしまうのは仕方のないことだと思います。そして、この感覚の違いに対して、これまで培った価値観やルールを一方的に押し付けるだけでは新入社員は職場に順応することができません。</p>

<p>ある程度、個々の特性を理解し許容する、支援することも大切です。</p>

<p>本レポートは、相互理解を促し互いに歩みよっていただくことを目的に、新人のキャリア観にフォーカスして分析をしております。昨今の新人の特性を理解し、育成支援の方法を見直す参考に、またキャリア支援の方向性を考えるにあたっての材料となれば幸いです。</p>

<blockquote>
<p>対象者：(株)シェイクが提供する新入社員研修受講者の一部 2,296名</p>

<p>調査期間:2018年4月2日 〜 2018年4月13日</p>

<p>調査方法 :研修終了後アンケート調査</p>
</blockquote>

<h3>18卒新入社員レポートサマリー</h3>

<p><img alt="" src="http://originalpoint.co.jp/wp-content/uploads/2017/04/58480500_m-e1492337586766.jpg" style="height:530px; width:800px" /></p>

<p>⑴８割を超える、石の上にも3年社員！？仕事に対する考え方はいたって堅実</p>

<p>［「石の上にも3年」やりたいくない仕事も続けることが大切 ］ ［必要な残業は積極的に取り組み、一人 前に成長したい］という回答が８割を超えており、仕事に対する考え方はいたって堅実な様子が伺える。 　</p>

<p>また、上記のように考えている新卒社員程、働く目的を［自分の持っている力を企業の発展に役立てるた め］［仕事を通じて社会に貢献するため］［職場において多くの人々と人間的なふれあいや対話を持つため］ 等と考えており、自社内に貢献しようという欲求が高い</p>

<p>⑵5年後のキャリアプランを描く社員は５割程度</p>

<p>5年後のキャリアプランを明確に描いていると回答した人は５割程度にとどまっている。また、管理職志向が強い社員ほど、5年後のキャリアプランを明確に描いている傾向が強い</p>

<p>⑶管理職志向が強い社員は、業務外でのかかわりを求める傾向に</p>

<p>管理職志向が強い社員ほど、成長不安を感じていないことに加え、［飲みに連れて行くなど、業務外の時間 　においてもかかわってほしい］と考えている社員が多いことがわかった</p>

<p>⑷キャリア支援を求める層は8割程度存在！中長期を見据えたキャリア支援を</p>

<p>［ 私の価値観やキャリアビジョン、ライフプランに関心を持ってほしい］等のキャリア支援に関連する項目 に、求めていると回答した層が8割程いた。つまり、自分のキャリアについて関心を持ち、成長への支援を求 めている新入社員が多いので、上司は一人一人の立場に立ってキャリア支援に取り組むことが大切である</p>

<p>⑸育児休暇を望む社員は７割を超える一方で、管理職へのブレーキが&hellip;</p>

<p>［子どもが生まれたら、育児休暇を取得したい］と考えている社員は７割を超える結果に。 一方で、育児休暇を取得したいと考えている社員ほど、［将来、管理職になり、チームをまとめる立場になり たい］と考えておらず、「育児休暇を取る＝管理職にはなれない」という認識が伺える</p>

<h3>40年間一社で働き続けるなんて、無理ゲーだろっ！上司や職場はどう向き合うか？</h3>

<p>ある会社の新人研修では「40年間一社で働き続けるなんて、無理ゲーだろっ！」と発言している新入社員の方がおりました。</p>

<p>思わず共感してしまったのですが、多くの新入社員の方々のキャリア観は多様化しているでしょうし、個々に求めていることや欲しているアプローチは千差万別でしょう&hellip;</p>

<p>「俺たちの時代は&hellip;」「こうあるべきだ」といった、上司の論理を上から振り下ろす育成には限界があるようにも思います。</p>

<p>最後になりますが、本レポートを通じて、新入社員の理解促進や育成支援にあたっての参考になれば幸いです。</p>

<p><img src="http://originalpoint.co.jp/wp-content/uploads/2018/06/63fd48f7b7948be120df893f3b665f25.png" /></p>

<table>
	<tbody>
		<tr>
			<th>企業名・学校名</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>ご所属部署名</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>氏名</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>お電話番号</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>メールアドレス</th>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>',
                'image'         => 'column02.jpg',
                'sort'          => 1,
                'type'          => 1,
                'created_at'    => '2018-09-06 07:00:00',
                'updated_at'    => '2018-09-06 07:00:00',
            ]);
        }
        for($i=41;$i<=60;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 3,
                'title'         => 'インターンシップの成果指標をどこに置くか？',
                'description'   => '採用活動の成果指標は一般的に「採用目標数の達成」に重きが置かれ、インターンシップの成果指標は「母集団形成、その先の内定に至った学生の数」に重きが置かれます。',
                'content'       => '<p>高度なIT人材育成のための日本語教師と、当社初の専任総務を募集。</p>',
                'image'         => 'column01.jpg',
                'sort'          => 1,
                'type'          => 1,
                'created_at'    => '2018-09-06 07:00:00',
                'updated_at'    => '2018-09-06 07:00:00',
            ]);
        }
    }
}
