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
            'name'          => 'ベトナムの求人/転職情報',
            'description'   => 'ベトナムの仕事事情・生活環境
国民の平均年齢が28歳弱。
現在、ベトナムで生活する日本人滞在者は約1万5千人。日本人にとってますます住みやすくなってきているベトナムについて、今回はRGF HR Agent Vietnamの辻さんにベトナムでの就職事情や生活環境について詳しくお話を伺いました。',
        ]);
        DB::table('categories')->insert([
            'id'            => 2,
            'name'          => '採用領域',
            'description'   => '採用担当者×大学生で考える、採用におけるジョブシャドウイング映像化の効果とは？〜ハタチのト...',
        ]);
        DB::table('categories')->insert([
            'id'            => 3,
            'name'          => '企業提供講座',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);

    }
}
