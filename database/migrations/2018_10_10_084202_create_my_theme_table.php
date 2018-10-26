<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_theme', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('memo',256)->comment= "memo";
            $table->string('last_log',256)->comment= "先月のログ";
            $table->text('keywords',256)->comment= "キーワード リスト";
            $table->string('this_mytheme',256)->comment= "今月のマイテーマ";
            $table->string('this_action',256)->comment= "今月のアクション";
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
        Schema::dropIfExists('my_theme');
    }
}
