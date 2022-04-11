<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnintoadvertisementsImageTableon01Nov2021519PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements_images', function (Blueprint $table) {
            $table->string('type')->after('img')->comment('1: Image, 2 Video')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements_images', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
