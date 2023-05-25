<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateBangGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bang_gia', function (Blueprint $table) {
            $table->integer('MaGia',11);
            $table->integer('MocDau');
            $table->integer('MocCuoi');
        });

        // DB::table('bang_gia')->insert([
        //     ['MaGia'=>1 ,'MocDau'=>0 ,'MocCuoi'=>100000],
        //     ['MaGia'=>2 ,'MocDau'=>100000 ,'MocCuoi'=>200000],
        //     ['MaGia'=>3 ,'MocDau'=>200000 ,'MocCuoi'=>300000],
        //     ['MaGia'=>4 ,'MocDau'=>300000 ,'MocCuoi'=>500000],
        //     ['MaGia'=>5 ,'MocDau'=>500000 ,'MocCuoi'=>1000000],
        //     ['MaGia'=>6 ,'MocDau'=>1000000 ,'MocCuoi'=>5000000],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bang_gia');
    }
}
