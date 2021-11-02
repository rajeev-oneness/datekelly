<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_type')->comment('1: Ladies, 2: Clubs, 3: Mens');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phn_no');
            $table->string('whatsapp_no');
            $table->string('password');
            $table->string('about');
            $table->string('age');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('address', 1000);
            $table->string('website_address', 1000);
            $table->integer('status')->comment('0: Blocked, 1: Active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
