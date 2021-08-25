<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFooterAgain extends Migration
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
            $table->string('title5')->nullable()->after('title4');

            $table->string('link7')->nullable()->after('link6');
            $table->string('link8')->nullable()->after('link7');
            $table->string('link9')->nullable()->after('link8');
            $table->string('link10')->nullable()->after('link9');

            $table->string('menu8')->nullable()->after('menu7');
            $table->string('menu9')->nullable()->after('menu8');
            $table->string('menu10')->nullable()->after('menu9');

            $table->string('field11')->nullable()->after('menu10');
            $table->string('field12')->nullable()->after('field11');
            $table->string('field13')->nullable()->after('field12');
            $table->string('field14')->nullable()->after('field13');
            $table->string('field15')->nullable()->after('field14');
            $table->string('field16')->nullable()->after('field15');
            $table->string('field17')->nullable()->after('field16');
            $table->string('field18')->nullable()->after('field17');

            $table->string('field19')->nullable()->after('field18');
            $table->string('field20')->nullable()->after('field19');

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
