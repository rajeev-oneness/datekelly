<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewLikeDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_like_dislikes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from');
            $table->bigInteger('to');
            $table->bigInteger('advertisement_id');
            $table->tinyInteger('like')->comment('1: like ,0: dislike');
            $table->tinyInteger('dislike')->comment('1: dislike ,0: like');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_like_dislikes');
    }
}
