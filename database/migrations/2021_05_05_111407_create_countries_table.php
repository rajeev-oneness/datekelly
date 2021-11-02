<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_code');
            $table->string('country_code');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            ['name' => 'India','phone_code' => '91','country_code' => 'IN'],
            ['name' => 'Australia','phone_code' => '334','country_code' => 'AUS'],
            ['name' => 'Romania','phone_code' => '40','country_code' => 'RO'],
            ['name' => 'France','phone_code' => '75','country_code' => 'FRA'],
            ['name' => 'Nederland','phone_code' => '31','country_code' => 'NL'],
        ];

        DB::table('countries')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
