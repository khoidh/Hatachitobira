<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->string('slug',256)->after('name')->comment = "slug(URLに使うため)"; 
            $table->string('icon',256)->after('slug')->comment = "slug(アイコン)"; 
            $table->addColumn('integer', 'sort', ['lenght' => 11])->after('icon')->comment("表示順(TOPページなどの表示順")->default(1); 
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
        // Schema::table('categories', function (Blueprint $table) {
        //     $table->dropColumn('description');
        // });
    }
}