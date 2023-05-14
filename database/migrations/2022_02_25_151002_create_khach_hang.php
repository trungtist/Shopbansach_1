<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->integer('MaKH',11);
            $table->string('HoTen');
            $table->string('Email');
            $table->string('MatKhau');
            $table->string('DienThoai');
            $table->datetime('NgayTao');
            $table->integer('Status');
        });

        DB::table('khach_hang')->insert([
            ['MaKH'=>2, 'HoTen'=>'abc', 'Email'=>'lamthatnhanh1113@gmail.com', 'MatKhau'=>'$2y$10$Air05HhMjicVl6EcXMP6JOcnCPmAWm1TnysUr8muJ56QfwRQEWC7a', 'DienThoai'=>'0123456789', 'NgayTao'=>'2022-02-03 15:27:12', 'Status'=>1],
            ['MaKH'=>688010869, 'HoTen'=>'Vương Văn Linh', 'Email'=>'lamthatnhanh111@gmail.com', 'MatKhau'=>'$2y$10$8MDJC/3d5tMwRuhUshDoT.Zy4JHZXknJau8drYdIi94y17RWig3fW', 'DienThoai'=>'0352566267', 'NgayTao'=>'2021-12-04 16:57:36', 'Status'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
