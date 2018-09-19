<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->timestamp('started_at')->nullable()->after('time_to');
            $table->timestamp('closed_at')->nullable()->after('started_at');
            $table->string('address',256)->after('closed_at');
            $table->text('overview')->after('address');
            $table->integer('entry_fee')->after('overview');
            $table->integer('capacity')->after('overview');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('started_at');
            $table->dropColumn('closed_at');
            $table->dropColumn('address');
            $table->dropColumn('overview');     //Tóm tắt, tổng quan
            $table->dropColumn('entry_fee');    //Phí tham gia
            $table->dropColumn('capacity');     //Sức chứa
        });
    }
}
