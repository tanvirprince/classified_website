<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnGoogleAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            //
            $table->string('ads_1_link')->nullable()->after('ads_8');
            $table->string('ads_2_link')->nullable()->after('ads_1_link');
            $table->string('ads_3_link')->nullable()->after('ads_2_link');
            $table->string('ads_4_link')->nullable()->after('ads_3_link');
            $table->string('ads_5_link')->nullable()->after('ads_4_link');

            $table->string('ads_1_title')->nullable()->after('ads_5_link');
            $table->string('ads_2_title')->nullable()->after('ads_1_title');
            $table->string('ads_3_title')->nullable()->after('ads_2_title');
            $table->string('ads_4_title')->nullable()->after('ads_3_title');
            $table->string('ads_5_title')->nullable()->after('ads_4_title');
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
