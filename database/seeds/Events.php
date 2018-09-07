<?php

use Illuminate\Database\Seeder;

class Events extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete data in table before seed
        DB::table('events')->delete();

        //run seed
        for($i=1;$i<=20;$i++) {
            DB::table('events')->insert([
                'id'            => $i,
                'category_id'   => 1,
                'title'         => '【毎月20日開催】新たな仲間や ロールモデル と 未来 を考えるイベント “ ハタチ のトビラ ”',
                'image'         => 'hatachi-tobira-event.png',
                'sort'          => 1,
                'time_from'     => '2018-08-03 07:00:00',
                'time_to'       => '2018-08-06 07:00:00',
                'created_at'    => '2018-09-06 07:00:00',
                'updated_at'    => '2018-09-06 07:00:00',
            ]);
        }
    }
}
