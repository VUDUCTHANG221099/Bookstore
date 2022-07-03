<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('id_code', 45);
            $table->integer('id_book');
            $table->string('book_name');
            $table->string('slug');
            $table->integer('quantity');
            $table->double('price');
            $table->integer('status')->default(0)->comment('0 chưa xử lý');//Xử lý song là xóa đơn luôn
            $table->datetime('time');
            $table->string('image')->nullable();
            $table->integer('id_shipper')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
