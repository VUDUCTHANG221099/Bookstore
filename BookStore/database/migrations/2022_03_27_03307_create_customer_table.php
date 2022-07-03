<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone',50);
            $table->string('address');
            $table->string('province_id', 6);
            $table->foreign('province_id')->references('id')->on('province')->ondelete('cascade');
            $table->string('district_id', 6);
            $table->foreign('district_id')->references('id')->on('district')->ondelete('cascade');
            $table->string('ward_id', 6);
            $table->foreign('ward_id')->references('id')->on('ward')->ondelete('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->ondelete('cascade');
            $table->integer('status')->default('1')->comment('1 Default address; 0 No');
            // $table->integer('numberOrder')->unsigned();
            // $table->mediumIncrements('numberOrder');	
            // $table->primary(['id','numberOrder']);
            
            

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
