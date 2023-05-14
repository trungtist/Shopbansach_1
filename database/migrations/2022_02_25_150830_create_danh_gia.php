<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDanhGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->integer('MaDG',11);
            $table->integer('id_prod');
            $table->integer('MaND');
            $table->string('NoiDung');
            $table->datetime('NgayDang');
            $table->integer('type')->default('0');
        });

        DB::table('danh_gia')->insert([
            ['MaDG'=>1, 'id_prod'=>1, 'MaND'=>1, 'NoiDung'=>'Mình cũng vừa mua♥', 'NgayDang'=>'2021-12-14 00:00:01', 'type'=>0],
            ['MaDG'=>2, 'id_prod'=>1, 'MaND'=>2, 'NoiDung'=>'Sách hay quá♥♥♥', 'NgayDang'=>'2021-12-14 00:00:00', 'type'=>0],
            ['MaDG'=>8, 'id_prod'=>2, 'MaND'=>2, 'NoiDung'=>'☻☺', 'NgayDang'=>'2021-12-15 09:28:17', 'type'=>0],
            ['MaDG'=>10, 'id_prod'=>3, 'MaND'=>6, 'NoiDung'=>'hay!', 'NgayDang'=>'2021-12-15 09:47:24', 'type'=>0],
            ['MaDG'=>1645088866, 'id_prod'=>1, 'MaND'=>1645088866, 'NoiDung'=>'hahah', 'NgayDang'=>'2022-02-17 16:07:46', 'type'=>0]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_gia');
    }
}
