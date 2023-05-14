<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->integer('MaLoai',11);
            $table->string('TenLoai');
            $table->integer('MaChuDe');
            $table->integer('Level');
            $table->integer('Status');
        });

        DB::table('loai')->insert([
            ['MaLoai'=>1, 'TenLoai'=>'Văn Học', 'MaChuDe'=>1, 'Level'=>1, 'Status'=>1],
            ['MaLoai'=>2, 'TenLoai'=>'Luật', 'MaChuDe'=>1, 'Level'=>2, 'Status'=>1],
            ['MaLoai'=>3, 'TenLoai'=>'Y Học', 'MaChuDe'=>1, 'Level'=>3, 'Status'=>1],
            ['MaLoai'=>4, 'TenLoai'=>'Thiêu Nhi', 'MaChuDe'=>1, 'Level'=>4, 'Status'=>1],
            ['MaLoai'=>5, 'TenLoai'=>'Sách Khoa Học', 'MaChuDe'=>1, 'Level'=>5, 'Status'=>1],
            ['MaLoai'=>6, 'TenLoai'=>'Ngoại Ngữ', 'MaChuDe'=>1, 'Level'=>6, 'Status'=>1],
            ['MaLoai'=>7, 'TenLoai'=>'Phụ Nữ', 'MaChuDe'=>1, 'Level'=>7, 'Status'=>1],
            ['MaLoai'=>8, 'TenLoai'=>'Tâm Lý - Kỹ Năng Sống', 'MaChuDe'=>1, 'Level'=>8, 'Status'=>1],
            ['MaLoai'=>9, 'TenLoai'=>'Nuôi Dạy Con', 'MaChuDe'=>1, 'Level'=>9, 'Status'=>1],
            ['MaLoai'=>10, 'TenLoai'=>'Kinh Doanh - Kinh Tế', 'MaChuDe'=>1, 'Level'=>10,'Status'=> 1],
            ['MaLoai'=>11, 'TenLoai'=>'Lịch Sử - Địa Lý - Tôn Giáo', 'MaChuDe'=>1, 'Level'=>11,'Status'=> 1],
            ['MaLoai'=>12, 'TenLoai'=>'Nấu Ăn - Nuôi Trồng', 'MaChuDe'=>1, 'Level'=>12,'Status'=> 1],
            ['MaLoai'=>13, 'TenLoai'=>'Sách Cấp 1', 'MaChuDe'=>2, 'Level'=>1, 'Status'=>1],
            ['MaLoai'=>14, 'TenLoai'=>'Sách Cấp 2', 'MaChuDe'=>2, 'Level'=>2, 'Status'=>1],
            ['MaLoai'=>15, 'TenLoai'=>'Sách Cấp 3', 'MaChuDe'=>2, 'Level'=>3, 'Status'=>1],
            ['MaLoai'=>16, 'TenLoai'=>'Sách Thi Đại Học', 'MaChuDe'=>2, 'Level'=>4, 'Status'=>1],
            ['MaLoai'=>17, 'TenLoai'=>'Sách Giáo Viên', 'MaChuDe'=>2, 'Level'=>5, 'Status'=>1],
            ['MaLoai'=>18, 'TenLoai'=>'Sách Đại Học', 'MaChuDe'=>2, 'Level'=>6, 'Status'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
