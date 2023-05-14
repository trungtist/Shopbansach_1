<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNguoiDanhGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_danh_gia', function (Blueprint $table) {
            $table->integer('MaND',11);
            $table->string('HoTen');
            $table->string('Email');
            $table->string('AnhNen');
        });

        DB::table('nguoi_danh_gia')->insert([
            ['MaND'=>1, 'HoTen'=>'Trung', 'Email'=>'trungtis@gmail.com', 'AnhNen'=>'comment.png'],
            ['MaND'=>2, 'HoTen'=>'Linh', 'Email'=>'lamnhanh@gmail.com', 'AnhNen'=>'comment.png'],
            ['MaND'=>4, 'HoTen'=>'Linh', 'Email'=>'dfgdf@fdg.com', 'AnhNen'=>'comment4.jpg'],
            ['MaND'=>5, 'HoTen'=>'Linh', 'Email'=>'sdfd@dgdfg.com', 'AnhNen'=>'comment1.png'],
            ['MaND'=>6, 'HoTen'=>'linh', 'Email'=>'lamthatnhanh111@gmail.com', 'AnhNen'=>'comment4.jpg'],
            ['MaND'=>1645085713, 'HoTen'=>'1', 'Email'=>'3534@lsgd.com', 'AnhNen'=>'comment4.jpg'],
            ['MaND'=>1645088866, 'HoTen'=>'Văn Linh Vương', 'Email'=>'ssdgds@gmail.com', 'AnhNen'=>'comment5.jpg']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_danh_gia');
    }
}
