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
        //Delete data in table before seed
        DB::table('videos')->delete();

        //run seed
        for($i=1;$i<=5;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,8),
                'url'           => 'https://www.youtube.com/watch?v=09R8_2nJtjg',
                'title'         => 'Maroon 5 - Sugar',
                'thumbnails'    => 'https://i.ytimg.com/vi/09R8_2nJtjg/mqdefault.jpg',
                'embedHtml'     => '<iframe width="480" height="270" src="//www.youtube.com/embed/09R8_2nJtjg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
                'viewCount'     => '2147483647',
                'published_at'   => '2009-10-07 10:51:42',
                'sort'          => 1,
                'type'          => 1,
            ]);
        }
        for($i=6;$i<=10;$i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,8),
                'url'           => 'https://www.youtube.com/watch?v=mBHRaQZAVIE',
                'title'         => 'Điều Bí Mật - Binz ft. Its Lee (Lyric Video)',
                'thumbnails'    => 'https://i.ytimg.com/vi/mBHRaQZAVIE/mqdefault.jpg',
                'embedHtml'     => '<iframe width="480" height="270" src="//www.youtube.com/embed/mBHRaQZAVIE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
                'viewCount'     => '1778141',
                'published_at'   => '2009-10-07 10:51:42',
                'sort'          => 1,
                'type'          => 1,
            ]);
        }
        for ($i = 11; $i <= 15; $i++) {
            DB::table('videos')->insert([
                'id'            => $i,
                'category_id'   => rand(1,8),
                'url'           => 'https://www.youtube.com/watch?v=5jqjxHAVA7I',
                'title'         => 'Thế Giới Thứ Tư - Chi Dân (4K Official MV)',
                'thumbnails'    => 'https://i.ytimg.com/vi/W0ngwudci4M/sddefault.jpg',
                'embedHtml'     => '<iframe width="480" height="270" src="//www.youtube.com/embed/5jqjxHAVA7I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
                'viewCount'     => '43480648',
                'published_at'   => '2009-10-07 10:51:42',
                'sort'          => 1,
                'type'          => 1,
            ]);
        }
    }
}
