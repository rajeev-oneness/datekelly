<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLadyPremiumPictureTable08072021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lady_premium_pictures', function (Blueprint $table) {
            $table->string('theme')->after('price');
            $table->string('notes')->after('theme');
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
            $table->dropColumn(['theme', 'notes']);
        });
    }
}
