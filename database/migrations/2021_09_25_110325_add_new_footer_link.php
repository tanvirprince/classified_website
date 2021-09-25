<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFooterLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('link11')->nullable()->after('link10');
            $table->string('link12')->nullable()->after('link11');
            $table->string('link13')->nullable()->after('link12');
            $table->string('link14')->nullable()->after('link13');
            $table->string('link15')->nullable()->after('link14');
            $table->string('link16')->nullable()->after('link15');
            $table->string('link17')->nullable()->after('link16');
            $table->string('link18')->nullable()->after('link17');
            $table->string('link19')->nullable()->after('link18');
            $table->string('link20')->nullable()->after('link19');
            $table->string('link21')->nullable()->after('link20');
            $table->string('link22')->nullable()->after('link21');
            $table->string('link23')->nullable()->after('link22');
            $table->string('link24')->nullable()->after('link23');
            $table->string('link25')->nullable()->after('link24');
            $table->string('link26')->nullable()->after('link25');

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
