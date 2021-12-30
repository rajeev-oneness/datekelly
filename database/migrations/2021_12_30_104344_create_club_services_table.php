<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateClubServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('popularity')->default(0)->comment('1: Shows, 0 Hide');
            $table->softdeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // Our services & facilities

        // Parking Taxi Service Discrete entrance Wifi Smoking area Lounge area Bar with alcoholic drinks Bar with non-alcoholic drinks Restaurant with snacks Restaurant with buffet Sex shop Cinema Disco/dancing ATM Machine Slot machines
        // Sauna Jacuzzi Swimming pool Dressing room Showers Towels Bathrobe Garden/outdoor area Relaxing massage Erotic massage Striptease Lapdance Sex show Private rooms BDSM room

        $data = [
            ['title' => 'Parking'],
            ['title' => 'Taxi Service'],
            ['title' => 'Discrete entrance'],
            ['title' => 'Wifi'],
            ['title' => 'Smoking area'],
            ['title' => 'Lounge area'],
            ['title' => 'Bar with alcoholic drinks'],
            ['title' => 'Bar with non-alcoholic drinks'],
            ['title' => 'Restaurant with snacks'],
            ['title' => 'Restaurant with buffet'],
            ['title' => 'Sex shop'],
            ['title' => 'Cinema'],
            ['title' => 'Disco/dancing'],
            ['title' => 'ATM Machine'],
            ['title' => 'Slot machines'],
            ['title' => 'Sauna'],
            ['title' => 'Jacuzzi'],
            ['title' => 'Sauna'],
            ['title' => 'Swimming pool'],
            ['title' => 'Dressing room'],
            ['title' => 'Showers'],
            ['title' => 'Towels'],
            ['title' => 'Bathrobe'],
            ['title' => 'Garden/outdoor area'],
            ['title' => 'Relaxing massage'],
            ['title' => 'Erotic massage'],
            ['title' => 'Striptease'],
            ['title' => 'Lapdance'],
            ['title' => 'Sex show'],
            ['title' => 'Private rooms'],
            ['title' => 'BDSM room'],
        ];

        DB::table('club_services')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_services');
    }
}
