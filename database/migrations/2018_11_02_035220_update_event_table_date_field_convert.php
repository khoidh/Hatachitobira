<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventTableDateFieldConvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
                $table->dateTime('started_at')->change();
                $table->dateTime('closed_at')->change();
                $table->dateTime('time_to')->change();
                $table->dateTime('time_from')->change();
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
            $table->date('started_at')->change();
            $table->date('closed_at')->change();
            $table->date('time_to')->change();
            $table->date('time_from')->change();
        });
    }
}
