<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('copyright', 1000);
            $table->string('logo');
            $table->bigInteger('phn_no');
            $table->string('site_email');
            $table->string('address',500);
            $table->string('google_map', 2000);
            $table->string('terms_conditons', 2000);
            $table->string('cancellation_policy', 2000);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            'site_name' => 'Datekelly',  
            'site_email' => 'support@datekelly.ro',  
            'copyright' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.',  
            'phn_no' => 1234567890, 
            'address' => 'Datekelly',  
            'terms_conditons' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.',  
            'cancellation_policy' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.',  
        ];
    
        DB::table('site_settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
