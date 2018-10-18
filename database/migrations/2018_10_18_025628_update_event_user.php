<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function ($table) {
            $table->date('started_at')->change();
            $table->date('closed_at')->change();
            $table->date('time_to')->change();
            $table->date('time_from')->change();
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
            // $table->dropColumn('time_from');     
            // $table->dropColumn('started_at');
            // $table->dropColumn('closed_at');
            // $table->dropColumn('time_to');
        });
    }
}
