<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePremiumPicturePurchasesTable08072021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_picture_purchases', function (Blueprint $table) {
            $table->string('note')->after('price');
            $table->string('reply')->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premium_picture_purchases', function (Blueprint $table) {
            $table->dropColumn(['note', 'reply']);
        });
    }
}
