<?php

use Illuminate\Database\Seeder;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=20;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => 1,
                'url'           => 'https://i.ytimg.com/vi_webp/ObwNpMXlmPU/maxresdefault.webp',
                'description'   => '部活の先輩後輩のキス【ファーストキス】。',
                'image'         => 'video01.jpg',
                'sort'          => 1,
            ]);
        }
        for($i=21;$i<=40;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => 2,
                'url'           => 'blob:https://www.youtube.com/fffc5984-677e-4cbd-bab3-d205eaedde49',
                'description'   => 'ハタチのトビラ#3 （株）Huber. 〜インバウンド事業に取り組む社会人の1日にとは〜',
                'image'         => 'video02.jpg',
                'sort'          => 1,
            ]);
        }
        for ($i = 41; $i <= 60; $i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => 3,
                'url'           => 'blob:https://www.youtube.com/5db0ab72-7d59-42e3-b571-7ceca817b758',
                'description'   => 'ハタチのトビラ#6 NPO法人グリーンズ〜持続可能な社会をつくるために活動するNPO職員の1日とは〜',
                'image'         => 'video03.jpg',
                'sort'          => 1,
            ]);
        }
    }
}
