<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('image');
            $table->string('price');
            $table->integer('rating');
            $table->bigInteger('no_of_loves');
            $table->integer('is_verified')->comment('0: not verified, 1: verified');
            $table->string('phn_no');
            $table->string('whatsapp');
            $table->string('about');
            $table->integer('ladies_id');
            $table->integer('club_id');
            $table->string('message');
            $table->integer('category');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
