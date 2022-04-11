<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('coin');
            $table->float('price', 8,2);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['coin' => 30, 'price' => 10],
            ['coin' => 80, 'price' => 25],
            ['coin' => 180, 'price' => 50],
            ['coin' => 380, 'price' => 100]
        ];
        DB::table('coins_rates')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins_rates');
    }
}
