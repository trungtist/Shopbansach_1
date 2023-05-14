<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTacGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tac_gia', function (Blueprint $table) {
            $table->integer('MaTacGia',11);
            $table->string('TenTacGia');
            $table->string('DiaChi');
            $table->string('TieuSu')->nullable()->default('');
            $table->string('DienThoai');
            $table->integer('Status');
        });

        DB::table('tac_gia')->insert([
            ['MaTacGia'=>1, 'TenTacGia'=>'Nguyễn Văn A', 'DiaChi'=>'Hà Nội', 'TieuSu'=>'Là nhà văn', 'DienThoai'=>'0123456789', 'Status'=>1],
            ['MaTacGia'=>2, 'TenTacGia'=>'Nguyễn Văn B', 'DiaChi'=>'Đà Nẵng', 'TieuSu'=>'Là nhà toán học', 'DienThoai'=>'0482435322', 'Status'=>1],            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tac_gia');
    }
}
