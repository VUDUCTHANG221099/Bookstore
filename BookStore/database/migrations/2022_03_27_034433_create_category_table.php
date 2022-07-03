<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->string('category_slug');

            // $table->timestamps();
        
        });
        Schema::create('author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_name');
            $table->string('author_slug');
            $table->string('avatar')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->ondelete('cascade');
            
        });
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name');
            $table->string('book_slug');
            $table->text('description')->nullable();
            $table->tinyInteger('language')->default(1)->nullable()->comment('1 Tiếng Việt; 2 Tiếng Anh; 3 Ngôn ngữ khác');
            $table->string('avatar',50)->nullable();
            $table->string('year_publish')->nullable();
            $table->integer('quantity')->unsigned();
            $table->float('price')->unsigned();
            $table->string('NXB')->nullable();
            $table->integer('pages')->unsigned()->nullable();
            $table->boolean('is_top')->default(0)->comment('1 Nổi bật; 0 Không nổi bật');
            $table->boolean('status')->comment('1 còn sách; 0 không còn sách');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->ondelete('cascade');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('author')->ondelete('cascade');
            $table->timestamps();
        });
       
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('author');
        Schema::dropIfExists('book');


    }
}
