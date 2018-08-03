<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'            => 1,
            'name'          => bcrypt('ベトナムの求人/転職情報'),
            'description'   => bcrypt('ベトナムの仕事事情・生活環境
国民の平均年齢が28歳弱。
現在、ベトナムで生活する日本人滞在者は約1万5千人。日本人にとってますます住みやすくなってきているベトナムについて、今回はRGF HR Agent Vietnamの辻さんにベトナムでの就職事情や生活環境について詳しくお話を伺いました。'),
        ]);
    }
}
