<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['country_id' => 1, 'name' => 'Kolkata'],
            ['country_id' => 2, 'name' => 'Sydney'],
            ['country_id' => 4, 'name' => 'Paris'],
            ['country_id' => 4, 'name' => 'Lyon'],
            ['country_id' => 2, 'name' => 'Melbourne'],
            ['country_id' => 3, 'name' => 'Bucharest'],
            ['country_id' => 3, 'name' => 'Sibiu'],
            ['country_id' => 5, 'name' => 'Den Haag'],
            ['country_id' => 5, 'name' => 'Rijswijk'],
            ['country_id' => 5, 'name' => 'Amsterdam'],
            ['country_id' => 5, 'name' => 'Haarlem'],
        ];
        DB::table('cities')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
