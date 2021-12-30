<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CheckPrimiumPictureTitleon7Dec2021415PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $picture = DB::table('lady_premium_pictures')->get();
        foreach ($picture as $key => $value) {
            DB::table('lady_premium_pictures')->where('id',$value->id)->update([
                'theme' => emptyCheck($value->theme),
                'notes' => emptyCheck($value->notes)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
