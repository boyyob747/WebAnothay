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
          $table->text('cautl_a')->nullable();
          $table->text('cautl_b')->nullable();
          $table->text('cautl_c')->nullable();
          $table->text('cautl_d')->nullable();
          $table->text('cau_hoi')->nullable();
          $table->string('cau_tl');
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
