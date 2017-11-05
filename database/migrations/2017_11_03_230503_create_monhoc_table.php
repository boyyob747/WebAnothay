<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Monhoc;
class CreateMonhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monhocs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('monhoc');
        });
        $monhocs = [
          'Tin học Đại cương',
          'TH Tin học đại cương',
          'Cơ sở dữ liệu',
          'Lập trình JAVA',
          'Anh văn CN CNTT',
          'Anh văn A2.1',
          'Anh văn A2.2',
          'Lập trình mạng',
          'Công nghệ Web'
        ];
        foreach ($monhocs as $monhoc) {
          $obj = new Monhoc();
          $obj->monhoc = $monhoc;
          $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monhocs');
    }
}
