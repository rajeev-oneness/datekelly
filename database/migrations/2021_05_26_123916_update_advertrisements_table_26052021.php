<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdvertrisementsTable26052021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('sex')->after('category');
            $table->integer('age')->after('sex');
            $table->integer('length')->after('age');
            $table->string('cup_size')->after('length');
            $table->integer('weight')->comment('kilogram(kg)')->after('cup_size');
            $table->string('body_size')->after('weight');
            $table->string('descent')->after('body_size');
            $table->string('language')->after('descent');
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
            $table->dropColumn(['sex', 'age', 'length','cup_size', 'weight', 'body_size', 'descent', 'language']);
        });
    }
}
