<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToServiceTableon7Dec2021209PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->tinyInteger('popularity')->default(0)->comment('1: Shows, 0 Hide')->after('title');
        });

        for ($i=0; $i < 3; $i++) { 
            DB::table('services')->where('id',rand(1,25))->update(['popularity' => 1]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('popularity');
        });
    }
}
