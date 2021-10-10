<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnForAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            $table->string('auto_1')->nullable()->after('ads_5_tag');
            $table->string('auto_2')->nullable()->after('auto_1');
            $table->string('auto_3')->nullable()->after('auto_2');
            $table->string('auto_4')->nullable()->after('auto_3');
            $table->string('auto_5')->nullable()->after('auto_4');
            $table->string('auto_6')->nullable()->after('auto_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            //
        });
    }
}
