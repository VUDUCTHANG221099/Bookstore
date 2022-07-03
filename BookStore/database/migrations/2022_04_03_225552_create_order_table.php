<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_code');
            $table->integer('id_users');
            $table->double('vnp_Amount',10,2)->unsigned();
            $table->string('vnp_BankCode');
            $table->string('vnp_BankTranNo');
            $table->string('vnp_CardType');
            $table->string('vnp_OrderInfo');
            $table->datetime('vnp_PayDate');
            $table->string('vnp_SecureHash');
            // $table->timestamps();
        });
        Schema::create('shipper', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipper_name');
            $table->string('slug');
            $table->string('logo');

            // $table->timestamps();
        });
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_code');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer')->ondelete('cascade');
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('book')->ondelete('cascade');
            $table->integer('quantity')->unsigned();
            // $table->float('price')->unsigned();
            $table->string('payment');
            $table->integer('shipper_id')->unsigned();
            $table->foreign('shipper_id')->references('id')->on('shipper')->ondelete('cascade');
            $table->timestamp('date_order')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:Đang xử lý; 1:Thành công; 2: Không thành công');
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
        
        Schema::dropIfExists('payment');
        Schema::dropIfExists('shipper');
        Schema::dropIfExists('order');
    }
}
