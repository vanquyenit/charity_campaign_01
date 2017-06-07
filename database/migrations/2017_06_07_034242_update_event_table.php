<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('img')->after('description');
            $table->string('address')->after('campaign_id');
            $table->string('lat')->after('address');
            $table->string('lng')->after('lat');
            $table->dateTime('start_time')->after('lng');
            $table->dateTime('end_time')->after('start_time');
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
            $table->dropColumn('img');
            $table->dropColumn('address');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
}
