<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('avatar')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');

            
        });
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('avatar')->nullable();
            $table->integer('type')->default(1)->comment('0:banner left; 1 banner center; 2 banner right');
            $table->timestamp('create_at')->nullable();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('avatar');
            $table->longText('description')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('post')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');

        Schema::dropIfExists('ads');
        Schema::dropIfExists('comments');

    }
}
