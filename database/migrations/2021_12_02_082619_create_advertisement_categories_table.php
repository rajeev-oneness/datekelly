<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advertisement_id');
            $table->integer('category_id');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        
        $data = [
            ['name' => 'Girlfriend Experience','description' => 'Girlfriend Experience'],
            ['name' => 'French Kissing','description' => 'French Kissing'],
            ['name' => 'Positive reviews','description' => 'Positive reviews'],
            ['name' => 'Transsexuals','description' => 'Transsexuals'],
            ['name' => 'Safe sex','description' => 'Safe sex'],
            ['name' => 'Escort','description' => 'Escort'],
            ['name' => 'Blowjob with condom','description' => 'Blowjob with condom'],
            ['name' => 'Anal sex','description' => 'Anal sex'],
            ['name' => 'New Ladies','description' => 'New Ladies'],
            ['name' => 'S&M','description' => 'S&M'],
            ['name' => 'Thai Massage','description' => 'Thai Massage'],
        ];
        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_categories');
    }
}
