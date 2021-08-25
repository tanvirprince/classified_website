<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToFooterDropNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            //
            $table->string('dropdown_1_status')->nullable()->after('field20');
            $table->string('dropdown_2_status')->nullable()->after('dropdown_1_status');

            $table->string('dropdown_1')->nullable()->after('dropdown_2_status');
            $table->string('dropdown_2')->nullable()->after('dropdown_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            //
        });
    }
}
