<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLadyPremiumPicturesTable09072021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lady_premium_pictures', function (Blueprint $table) {
            $table->biginteger('no_of_purchase')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lady_premium_pictures', function (Blueprint $table) {
            $table->dropColumn(['no_of_purchase']);
        });
    }
}
