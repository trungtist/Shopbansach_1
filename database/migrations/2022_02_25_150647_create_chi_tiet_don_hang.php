<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateChiTietDonHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->integer('MaDonHang',11);
            $table->integer('MaSach');
            $table->integer('SoLuong');
            $table->bigInteger('DonGia');
        });

        DB::table('chi_tiet_don_hang')->insert([
            ['MaDonHang'=>255419916, 'MaSach'=>2, 'SoLuong'=>1, 'DonGia'=>90000],
            ['MaDonHang'=>317999085, 'MaSach'=>3, 'SoLuong'=>1, 'DonGia'=>151200],
            ['MaDonHang'=>317999085, 'MaSach'=>16, 'SoLuong'=>1, 'DonGia'=>143100],
            ['MaDonHang'=>680601536, 'MaSach'=>2, 'SoLuong'=>1, 'DonGia'=>90000],
            ['MaDonHang'=>680601536, 'MaSach'=>3, 'SoLuong'=>5, 'DonGia'=>151200],
            ['MaDonHang'=>680601536, 'MaSach'=>4, 'SoLuong'=>3, 'DonGia'=>116100],
            ['MaDonHang'=>790214152, 'MaSach'=>2, 'SoLuong'=>3, 'DonGia'=>90000],
            ['MaDonHang'=>1643890240, 'MaSach'=>431327246, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1643890240, 'MaSach'=>612034523, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1643892997, 'MaSach'=>612034523, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1643892997, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1643892997, 'MaSach'=>794717844, 'SoLuong'=>2, 'DonGia'=>252000],
            ['MaDonHang'=>1643893062, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1643893062, 'MaSach'=>794717844, 'SoLuong'=>3, 'DonGia'=>252000],
            ['MaDonHang'=>1645292960, 'MaSach'=>18, 'SoLuong'=>1, 'DonGia'=>79200],
            ['MaDonHang'=>1645293130, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
            ['MaDonHang'=>1645293164, 'MaSach'=>334281778, 'SoLuong'=>1, 'DonGia'=>30000],
            ['MaDonHang'=>1645346648, 'MaSach'=>334281778, 'SoLuong'=>2, 'DonGia'=>30000],
            ['MaDonHang'=>1645346648, 'MaSach'=>503078130, 'SoLuong'=>1, 'DonGia'=>30000],
            ['MaDonHang'=>1645346648, 'MaSach'=>633772850, 'SoLuong'=>1, 'DonGia'=>30000]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
}
