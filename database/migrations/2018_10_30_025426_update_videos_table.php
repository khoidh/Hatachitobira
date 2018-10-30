<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos',function(Blueprint $table){
            $table->string('title',256)->nullable()->after('url');
            $table->string('thumbnails',256)->nullable()->after('title');
            $table->string('embedHtml',256)->nullable()->after('thumbnails');
            $table->integer('viewCount')->nullable()->after('embedHtml');
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos',function(Blueprint $table){
            $table->dropColumn('title');
            $table->dropColumn('thumbnails');
            $table->dropColumn('embedHtml');
            $table->dropColumn('viewCount');
            $table->string('description',191)->nullable()->after('url');
            $table->string('image',191)->nullable()->after('description');
        });
    }
}
