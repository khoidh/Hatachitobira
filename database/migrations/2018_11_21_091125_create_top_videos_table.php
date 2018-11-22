<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_type_id')->unsigned();
            $table->string('title',256);
            $table->string('thumbnail',256);
            $table->string('youtube_url',256);
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
        Schema::dropIfExists('top_videos');
    }
}
