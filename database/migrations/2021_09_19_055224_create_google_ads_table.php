<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_ads', function (Blueprint $table) {
            $table->id();
            $table->string('ads_1')->nullable();
            $table->string('ads_2')->nullable();
            $table->string('ads_3')->nullable();
            $table->string('ads_4')->nullable();
            $table->string('ads_5')->nullable();
            $table->string('ads_6')->nullable();
            $table->string('ads_7')->nullable();
            $table->string('ads_8')->nullable();
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
        Schema::dropIfExists('google_ads');
    }
}
