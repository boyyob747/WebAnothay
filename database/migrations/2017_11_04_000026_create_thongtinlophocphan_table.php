<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongtinlophocphanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinlophocphans', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('nhom_thi');
          $table->integer('STT');
          $table->integer('lophocphan_id')->unsigned();
          $table->foreign('lophocphan_id')->references('id')->on('lophocphans')->onDelete('cascade');
          $table->integer('student_id')->unsigned()->index();
          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
          $table->integer('diem')->default('-1');
          $table->integer('state')->default('0');//0 la chua cho thi 1 la cho thi
          $table->time('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thongtinlophocphans');
    }
}
