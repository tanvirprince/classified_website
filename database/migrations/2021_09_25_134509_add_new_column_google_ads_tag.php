<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnGoogleAdsTag extends Migration
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
            $table->string('ads_1_tag')->nullable()->after('ads_5_title');
            $table->string('ads_2_tag')->nullable()->after('ads_1_tag');
            $table->string('ads_3_tag')->nullable()->after('ads_2_tag');
            $table->string('ads_4_tag')->nullable()->after('ads_3_tag');
            $table->string('ads_5_tag')->nullable()->after('ads_4_tag');
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
