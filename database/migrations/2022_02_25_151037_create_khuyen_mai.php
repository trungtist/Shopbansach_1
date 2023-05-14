<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhuyenMai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mai', function (Blueprint $table) {
            $table->integer('MaKM',11);
            $table->string('TenKM');
            $table->integer('GiamGia');
        });

        DB::table('khuyen_mai')->insert([
            ['MaKM'=>1, 'TenKM'=>'Khuyến mại 10%', 'GiamGia'=>10],
            ['MaKM'=>377019926, 'TenKM'=>'Không khuyến mại', 'GiamGia'=>0]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyen_mai');
    }
}
