<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'email' => 'tinhvan@gmail.com',
            'password' => bcrypt('tinhvan@2018'),
        ]);
    }
}
