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
        //Delete data in table before seed
        DB::table('categories')->delete();

        //run seed
        DB::table('categories')->insert([
            'id'            => 1,
            'name'          => 'エンタメ',
            'description'   => 'ベトナムの仕事事情・生活環境
国民の平均年齢が28歳弱。
現在、ベトナムで生活する日本人滞在者は約1万5千人。日本人にとってますます住みやすくなってきているベトナムについて、今回はRGF HR Agent Vietnamの辻さんにベトナムでの就職事情や生活環境について詳しくお話を伺いました。',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);
        DB::table('categories')->insert([
            'id'            => 2,
            'name'          => 'サービス',
            'description'   => '採用担当者×大学生で考える、採用におけるジョブシャドウイング映像化の効果とは？〜ハタチのト...',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);
        DB::table('categories')->insert([
            'id'            => 3,
            'name'          => 'テクノロジー',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => 'テクノロジー',
            'icon'          => 'テクノロジー',   
        ]); 
        DB::table('categories')->insert([
            'id'            => 4,
            'name'          => 'モノづくり',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);
        DB::table('categories')->insert([
            'id'            => 5,
            'name'          => '教育',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => '教育',
            'icon'          => '教育',   
        ]);
        DB::table('categories')->insert([
            'id'            => 6,
            'name'          => '暮らし',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);
        DB::table('categories')->insert([
            'id'            => 7,
            'name'          => '企業提供講座',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);
        DB::table('categories')->insert([
            'id'            => 8,
            'name'          => '食',
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
            'slug'          => 'モノづくり',
            'icon'          => 'モノづくり',   
        ]);

    }
}
