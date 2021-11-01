<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['title' => 'Relaxing Massage'],
            ['title' => 'Erotic Massage'],
            ['title' => 'Anal Massage'],
            ['title' => 'Kissing Massage'],
            ['title' => 'Kissing with tongue'],
            ['title' => 'Girlfriend Experience'],
            ['title' => 'Striptease'],
            ['title' => 'Fingering'],
            ['title' => 'Handjob'],
            ['title' => 'Titfuck'],
            ['title' => 'Pussy licking'],
            ['title' => 'Riming me'],
            ['title' => 'Sex with condom'],
            ['title' => 'Sex without condom'],
            ['title' => 'Outdoor sex'],
        ];
        DB::table('services')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
