<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateThamGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tham_gia', function (Blueprint $table) {
            $table->integer('MaSach',11);
            $table->integer('MaTacGia');
            $table->string('VaiTro');
        });

        DB::table('tham_gia')->insert([
            ['MaSach'=>1, 'MaTacGia'=>1, 'VaiTro'=>'Tác giả a']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tham_gia');
    }
}
