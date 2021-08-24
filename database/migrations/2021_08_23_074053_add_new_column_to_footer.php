<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToFooter extends Migration
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
            $table->string('title1')->nullable()->after('title');
            $table->string('title2')->nullable()->after('title1');
            $table->string('title3')->nullable()->after('title2');
            $table->string('title4')->nullable()->after('title3');

            $table->string('link1')->nullable()->after('title4');
            $table->string('link2')->nullable()->after('link1');
            $table->string('link3')->nullable()->after('link2');
            $table->string('link4')->nullable()->after('link3');
            $table->string('link5')->nullable()->after('link4');
            $table->string('link6')->nullable()->after('link5');

            $table->string('menu1')->nullable()->after('link6');
            $table->string('menu2')->nullable()->after('menu1');
            $table->string('menu3')->nullable()->after('menu2');
            $table->string('menu4')->nullable()->after('menu3');
            $table->string('menu5')->nullable()->after('menu4');
            $table->string('menu6')->nullable()->after('menu5');
            $table->string('menu7')->nullable()->after('menu6');



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
