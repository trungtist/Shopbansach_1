<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDonHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->integer('MaDonHang',11);
            $table->integer('DaThanhToan');
            $table->datetime('NgayDat');
            $table->date('NgayGiao')->nullable();
            $table->string('DiaChi');
            $table->integer('PhiGiaoHang');
            $table->integer('ThanhTien');
            $table->string('MoTa')->nullable();
            $table->integer('MaKH');
            $table->integer('tran_code');
        });

        DB::table('don_hang')->insert([
            ['MaDonHang'=>255419916, 'DaThanhToan'=>1, 'NgayDat'=>'2021-12-10 17:45:15', 'NgayGiao'=>'0000-00-00', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>115000, 'MoTa'=>'abc', 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>317999085, 'DaThanhToan'=>1, 'NgayDat'=>'2021-12-11 10:28:27', 'NgayGiao'=>'2021-12-25', 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>314300, 'MoTa'=>'shop chất lượng', 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>680601536, 'DaThanhToan'=>0, 'NgayDat'=>'2021-12-10 19:24:53', 'NgayGiao'=>'0000-00-00', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1219300, 'MoTa'=>'hay lam ban oi', 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>790214152, 'DaThanhToan'=>0, 'NgayDat'=>'2021-12-11 09:31:08', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>295000, 'MoTa'=>'hay', 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>1643890240, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-03 19:10:40', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>529000, 'MoTa'=>'mong gui hang som', 'MaKH'=>2, 'tran_code'=>0],
            ['MaDonHang'=>1643892997, 'DaThanhToan'=>1, 'NgayDat'=>'2022-02-03 19:56:37', 'NgayGiao'=>'2022-02-09', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1033000, 'MoTa'=>'ok', 'MaKH'=>2, 'tran_code'=>0],
            ['MaDonHang'=>1643893062, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-03 19:57:42', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1033000, 'MoTa'=>NULL, 'MaKH'=>2, 'tran_code'=>0],
            ['MaDonHang'=>1645292960, 'DaThanhToan'=>1, 'NgayDat'=>'2022-02-20 00:49:20', 'NgayGiao'=>'2022-02-21', 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>99200, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>13691002],
            ['MaDonHang'=>1645293130, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-20 00:52:10', 'NgayGiao'=>NULL, 'DiaChi'=>'vip_1', 'PhiGiaoHang'=>25000, 'ThanhTien'=>277000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>1645293164, 'DaThanhToan'=>2, 'NgayDat'=>'2022-02-20 00:52:44', 'NgayGiao'=>NULL, 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>50000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0],
            ['MaDonHang'=>1645346648, 'DaThanhToan'=>2, 'NgayDat'=>'2022-02-20 15:44:08', 'NgayGiao'=>NULL, 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>140000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
