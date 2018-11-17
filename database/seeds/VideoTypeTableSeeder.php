<?php

use Illuminate\Database\Seeder;

class VideoTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete data in table before seed
        DB::table('video_types')->delete();

        //run seed
        DB::table('video_types')->insert([
            'id'            => 1,
            'name'          => 'ジョブシャドウ',
            'slug'          => 'job_shadow',
            'description'   => 'ジョブシャドウ',
        ]);
        DB::table('video_types')->insert([
            'id'            => 2,
            'name'          => 'ロールモデル',
            'slug'          => 'role_model',
            'description'   => 'ロールモデル',
        ]);

    }
}
