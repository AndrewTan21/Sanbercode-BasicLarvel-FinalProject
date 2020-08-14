<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->integer('point_vote')->default(0);
            $table->integer('reply_id')->default(0);
           $table->string('page_id')->default(0);
           $table->integer('users_id');
            $table->timestamps();
        });
        Schema::create('answers_user_vote', function (Blueprint $table) {
            $table->integer('answer_id');
            $table->integer('user_id');
            $table->string('vote',11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
