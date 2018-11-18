<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDisplayToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('videos', function (Blueprint $table) {
            $table->addColumn('integer', 'display', ['lenght' => 4])->after('sort')->comment("1: 表示 0: 非表示")->default(1); 
        });
        Schema::table('events', function (Blueprint $table) {
            $table->addColumn('integer', 'display', ['lenght' => 4])->after('sort')->comment("1: 表示 0: 非表示")->default(1); 
        });
        Schema::table('columns', function (Blueprint $table) {
            $table->addColumn('integer', 'display', ['lenght' => 4])->after('sort')->comment("1: 表示 0: 非表示")->default(1); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('videos',function(Blueprint $table){
            $table->dropColumn('display');
        });
        Schema::table('events',function(Blueprint $table){
            $table->dropColumn('display');
        });
        Schema::table('columns',function(Blueprint $table){
            $table->dropColumn('display');
        });

    }
}
