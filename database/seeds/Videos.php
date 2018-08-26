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
        for($i=1;$i<=5;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,3),
                'url'           => 'https://www.youtube.com/watch?v=ObwNpMXlmPU',
                'description'   => '部活の先輩後輩のキス【ファーストキス】。',
                'image'         => 'video01.jpg',
                'sort'          => 1,
            ]);
        }
        for($i=6;$i<=10;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,3),
                'url'           => 'https://www.youtube.com/watch?v=xijH08HD2ns',
                'description'   => 'ハタチのトビラ#3 （株）Huber. 〜インバウンド事業に取り組む社会人の1日にとは〜',
                'image'         => 'video02.jpg',
                'sort'          => 1,
            ]);
        }
        for ($i = 11; $i <= 15; $i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,3),
                'url'           => 'https://www.youtube.com/watch?v=Rdu0Cr1kJGo',
                'description'   => 'ハタチのトビラ#6 NPO法人グリーンズ〜持続可能な社会をつくるために活動するNPO職員の1日とは〜',
                'image'         => 'video03.jpg',
                'sort'          => 1,
            ]);
        }
    }
}
