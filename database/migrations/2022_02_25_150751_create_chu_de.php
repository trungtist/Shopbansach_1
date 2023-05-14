<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateChuDe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chu_de', function (Blueprint $table) {
            $table->integer('MaChuDe',11);
            $table->string('TenChuDe');
            $table->integer('Level');
            $table->integer('Status');
        });

        DB::table('chu_de')->insert([
            ['MaChuDe'=>1, 'TenChuDe'=>'Tủ Sách', 'Level'=>1, 'Status'=>1],
            ['MaChuDe'=>2, 'TenChuDe'=>'Sách Giao Khoa', 'Level'=>2, 'Status'=>1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chu_de');
    }
}
