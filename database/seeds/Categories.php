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
            'slug'          => 'エンタメ',
            'icon'          => 'img-cate-1.png',
            'sort'          => 1,
                    
            'display'       => 1,
            'description'   => 'ベトナムの仕事事情・生活環境
国民の平均年齢が28歳弱。
現在、ベトナムで生活する日本人滞在者は約1万5千人。日本人にとってますます住みやすくなってきているベトナムについて、今回はRGF HR Agent Vietnamの辻さんにベトナムでの就職事情や生活環境について詳しくお話を伺いました。',
        ]);
        DB::table('categories')->insert([
            'id'            => 2,
            'name'          => 'サービス',
            'slug'          => 'サービス',
            'icon'          => 'img-cate-2.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => '採用担当者×大学生で考える、採用におけるジョブシャドウイング映像化の効果とは？〜ハタチのト...',
        ]);
        DB::table('categories')->insert([
            'id'            => 3,
            'name'          => 'テクノロジー',
            'slug'          => 'テクノロジー',
            'icon'          => 'img-cate-3.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]); 
        DB::table('categories')->insert([
            'id'            => 4,
            'name'          => 'モノづくり',
            'slug'          => 'モノづくり',
            'icon'          => 'img-cate-4.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
        DB::table('categories')->insert([
            'id'            => 5,
            'name'          => '教育',
            'slug'          => '教育',
            'icon'          => 'img-cate-5.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
        DB::table('categories')->insert([
            'id'            => 6,
            'name'          => '暮らし',
            'slug'          => '暮らし',
            'icon'          => 'img-cate-6.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
        DB::table('categories')->insert([
            'id'            => 7,
            'name'          => '企業提供講座',
            'slug'          => '企業提供講座',
            'icon'          => 'img-cate-7.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
        DB::table('categories')->insert([
            'id'            => 8,
            'name'          => '食',
            'slug'          => '食',
            'icon'          => 'img-cate-8.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
        DB::table('categories')->insert([
            'id'            => 9,
            'name'          => 'その他',
            'slug'          => 'その他',
            'icon'          => 'img-cate.png',
            'sort'          => 1,            
            'display'       => 1,
            'description'   => 'リクルート事業開発のプロが講師！起業アイデアの磨き方＆アイデアを行動に変えるステップとは？',
        ]);
    }
}
