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
                'description'   => bcrypt('部活の先輩後輩のキス【ファーストキス】。'),
                'image'         => 'maxresdefault.jpg',
                'sort'          => 1,
            ]);
        }

    }
}
