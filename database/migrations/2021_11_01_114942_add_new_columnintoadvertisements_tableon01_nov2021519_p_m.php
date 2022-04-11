<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnintoadvertisementsTableon01Nov2021519PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('address')->after('language');
            $table->string('my_service')->after('address');
            $table->string('extraprice_for_escort')->after('my_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('my_service');
            $table->dropColumn('extraprice_for_escort');
        });
    }
}
