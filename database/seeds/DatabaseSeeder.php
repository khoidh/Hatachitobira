<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(Categories::class);
        $this->call(Events::class);
        $this->call(Columns::class);
        $this->call(Videos::class);
    }
}
