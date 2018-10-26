<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMythemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_themes', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer("category_id")->after('id')->comment("カテゴリ");
            $table->string('memo',256)->nullable();
            $table->string('last_log',256)->nullable();
            $table->text('keywords',256)->nullable();
            $table->string('this_mytheme',256)->nullable();
            $table->string('this_action',256)->nullable();
            $table->string("content_lable",255)->nullable()->after('this_action');
            $table->string("content_1",255)->nullable()->after('content_lable');
            $table->string("content_2",255)->nullable()->after('content_1');
            $table->string("content_3",255)->nullable()->after('content_2');
            $table->string("content_4",255)->nullable()->after('content_3');
            $table->integer("month")->after('content_4');
            $table->integer("year")->after('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('my_themes');
    }
}
