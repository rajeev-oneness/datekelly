<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        
        $data = [
            ['title' => 'West-European'],
            ['title' => 'East-European'],
            ['title' => 'African'],
            ['title' => 'American'],
            ['title' => 'Arab'],
            ['title' => 'Asian'],
            ['title' => 'Latin'],
        ];

        DB::table('descents')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descents');
    }
}
