<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCauhoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhois', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('cautl_a')->nullable();
          $table->string('cautl_b')->nullable();
          $table->string('cautl_c')->nullable();
          $table->string('cautl_d')->nullable();
          $table->string('cau_hoi')->nullable();
          $table->integer('cau_tl')->default(0);
          $table->integer('id_baithi')->unsigned();
          $table->foreign('id_baithi')->references('id')->on('baitracnghiems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cauhois');
    }
}
