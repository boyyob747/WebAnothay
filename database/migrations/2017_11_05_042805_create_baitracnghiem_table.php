<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaitracnghiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baitracnghiems', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('title');
          $table->integer('soluongcauhoi')->default('0');
          $table->integer('diemcua')->default('0'); // 0 la bai thi giua ky; 1 la bai thi cuoi ky ;2 la bai tap ;3 la tap thoi ko diem
          $table->integer('lophoc_id')->unsigned();
          $table->foreign('lophoc_id')->references('id')->on('lophocphans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baitracnghiems');
    }
}
