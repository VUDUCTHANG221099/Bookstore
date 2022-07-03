<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->string('id',6)->index();
            $table->string('name',45);
            $table->string('type',45);
        });
        Schema::create('district', function (Blueprint $table) {
            
            $table->string('id',6)->index();
            $table->string('name',45);
            $table->string('type',45);
            $table->string('province_id', 6);
            $table->foreign('province_id')->references('id')->on('province')->ondelete('cascade');
        });
        Schema::create('ward', function (Blueprint $table) {
            $table->string('id',6)->index();
            $table->string('name',45);
            $table->string('type',45);
            $table->string('district_id', 6);
            $table->foreign('district_id')->references('id')->on('district')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('province');
        Schema::dropIfExists('district');
        Schema::dropIfExists('ward');


    }
}
