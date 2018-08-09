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
        for($i=1;$i<=20;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 1,
                'title'         => '1．日本語教師　2．総務（労務）　 ※オンライン面接可　',
                'description'   => '高度なIT人材育成のための日本語教師と、当社初の専任総務を募集。',
                'image'         => 'column01.jpg',
                'sort'          => 1,
            ]);
        }
        for($i=21;$i<=40;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 2,
                'title'         => 'ジョブシャドウイングを映像化するハタチのトビラとは',
                'description'   => '弊社では、企業側の「自社の魅力を学生に訴求できていない」といった問題意識や、大学生側の「世の中にどんな仕事があるのか、よくわからない」「説明会や採用ページをみるだけでは、情報として不足している」といった声に応えるために、ジョブシャドウイングの様子を映像化して学生に訴求する「ハタチのトビラ」というサービスを展開しています。',
                'image'         => 'column02.jpg',
                'sort'          => 1,
            ]);
        }
        for($i=41;$i<=60;$i++) {
            DB::table('columns')->insert([
                'id'            => $i,
                'category_id'   => 3,
                'title'         => 'インターンシップの成果指標をどこに置くか？',
                'description'   => '採用活動の成果指標は一般的に「採用目標数の達成」に重きが置かれ、インターンシップの成果指標は「母集団形成、その先の内定に至った学生の数」に重きが置かれます。',
                'image'         => 'column01.jpg',
                'sort'          => 1,
            ]);
        }
    }
}
