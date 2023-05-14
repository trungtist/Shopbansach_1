<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViTriShip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vi_tri_ship', function (Blueprint $table) {
            $table->integer('MaViTri',11);
            $table->string('TenViTri');
            $table->integer('PhiShip');
            $table->integer('Status');
        });

        DB::table('vi_tri_ship')->insert([
            ['MaViTri'=>1, 'TenViTri'=>'Cầu Giấy - Hà Nội', 'PhiShip'=>25000, 'Status'=>1],
            ['MaViTri'=>2, 'TenViTri'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiShip'=>20000, 'Status'=>1],
            ['MaViTri'=>1644075428, 'TenViTri'=>'vip_1', 'PhiShip'=>25000, 'Status'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vi_tri_ship');
    }
}
