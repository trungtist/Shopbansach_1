<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNhaXuatBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_xuat_ban', function (Blueprint $table) {
            $table->integer('MaNXB',11);
            $table->string('TenNXB');
            $table->string('DiaChi');
            $table->string('DienThoai');
            $table->integer('Status');
        });

        DB::table('nha_xuat_ban')->insert([
            ['MaNXB'=>1, 'TenNXB'=>'Đinh Tị', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0123456789', 'Status'=>1],
            ['MaNXB'=>2, 'TenNXB'=>'NXB Công Thương', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0123456789', 'Status'=>1],
            ['MaNXB'=>3, 'TenNXB'=>' NXB Đại Học Kinh Tế Quốc Dân', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0482435322', 'Status'=>1],
            ['MaNXB'=>4, 'TenNXB'=>'NXB Đà Nẵng', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0329392333', 'Status'=>1],
            ['MaNXB'=>5, 'TenNXB'=>'NXB Công An Nhân Dân', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0482435324', 'Status'=>1],
            ['MaNXB'=>357429078, 'TenNXB'=>'Macmillan Publishers', 'DiaChi'=>'Ngoài nước', 'DienThoai'=>'0123456789', 'Status'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nha_xuat_ban');
    }
}
