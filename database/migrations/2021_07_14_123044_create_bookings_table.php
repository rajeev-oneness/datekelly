<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('user_id');
            $table->bigInteger('advertisement_id');
            $table->tinyInteger('visit_type')->comment('0: private visit, 1:Escort (Lady will visit you)');
            $table->string('customer_address_1');
            $table->string('customer_address_2');
            $table->string('customer_city');
            $table->string('customer_telephone');
            $table->string('extra_info');
            $table->date('date');
            $table->time('time');
            $table->bigInteger('duration_id');
            $table->string('service_id');
            $table->integer('down_payment');
            $table->string('user_address_1');
            $table->string('user_address_2');
            $table->string('user_city');
            $table->string('user_telephone');
            $table->string('user_extra_info');
            $table->tinyInteger('is_confirmed')->default(0)->comment('0: not confirmed, 1: confirmed');
            $table->tinyInteger('is_visited')->default(0)->comment('0: not visited, 1: visited');
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
        Schema::dropIfExists('bookings');
    }
}
