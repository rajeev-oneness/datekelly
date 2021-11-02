<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('is_admin_access');
            $table->string('site_name');
            $table->string('site_email');
            $table->string('logo');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'is_admin_access'=>1,
            'site_name' => 'Datekelly',  
            'site_email' => 'support@datekelly.ro',
            'logo' => 'images/site_logo.png',
        ];
    
        DB::table('admin')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
