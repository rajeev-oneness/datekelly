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
            ['title' => "Relaxing Massage"],
            ['title' => "Erotic Massage"],
            ['title' => "Anal Massage "],
            ['title' => "Kissing"],
            ['title' => "Kissing with tongue"],
            ['title' => "Girlfriend experience"],
            ['title' => "Striptease"],
            ['title' => "Fingering"],
            ['title' => "Handjob"],
            ['title' => "Titfuck"],
            ['title' => "Pussy licking"],
            ['title' => "Rimming (me)"],
            ['title' => "Rimming (client)"],
            ['title' => "Blowjob with condom"],
            ['title' => "Blowjob without condom"],
            ['title' => "Deep Throat"],
            ['title' => "Sex with condom"],
            ['title' => "Sex without condom"],
            ['title' => "Anal sex (me)"],
            ['title' => "Anal sex without condom (me)"],
            ['title' => "Anal sex (client)"],
            ['title' => "Cum on body"],
            ['title' => "Cum on face"],
            ['title' => "Cum in mouth"],
            ['title' => "Swallowing"],
            ['title' => "Toys/Dildo (me)"],
            ['title' => "Toys/Dildo (client)"],
            ['title' => "Trio MFF"],
            ['title' => "Trio MMF"],
            ['title' => "Lesbian sex"],
            ['title' => "Group sex"],
            ['title' => "Outdoor se"],
            ['title' => "Photos"],
            ['title' => "Videos"],
            ['title' => "Special clothes requests"],
            ['title' => "Role Play"],
            ['title' => "Soft SM"],
            ['title' => "BDSM"],
            ['title' => "Domina & Slave"],
            ['title' => "Golden Shower (me)"],
            ['title' => "Golden Shower (client)"],
            ['title' => "Phone sex"],
            ['title' => "Webcam sex"]
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
