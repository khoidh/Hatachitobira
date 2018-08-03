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
                'title'         => bcrypt('1．日本語教師　2．総務（労務）　 ※オンライン面接可　'),
                'description'   => bcrypt('高度なIT人材育成のための日本語教師と、当社初の専任総務を募集。'),
                'image'         => bcrypt('mail_syoku_img_file_1579.jpg'),
                'sort'          => 1,
            ]);
        }
    }
}
