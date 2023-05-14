<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTheLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_loai', function (Blueprint $table) {
            $table->integer('MaTheLoai',11);
            $table->string('TenTheLoai');
            $table->integer('MaLoai');
            $table->integer('Level');
            $table->integer('Status');
        });

        DB::table('the_loai')->insert([
            ['MaTheLoai'=>1, 'TenTheLoai'=>'Truyện Cười', 'MaLoai'=>1, 'Level'=>1, 'Status'=>1],
            ['MaTheLoai'=>2, 'TenTheLoai'=>'Truyện Ngắn - Tản Văn', 'MaLoai'=>2, 'Level'=>2, 'Status'=>1],
            ['MaTheLoai'=>3, 'TenTheLoai'=>'Lớp 5 - Sách Tham Khảo', 'MaLoai'=>13, 'Level'=>1, 'Status'=>1],
            ['MaTheLoai'=>4, 'TenTheLoai'=>'Lớp 9 - Sách Tham Khảo', 'MaLoai'=>14, 'Level'=>2, 'Status'=>1],
            ['MaTheLoai'=>5, 'TenTheLoai'=>'Lớp 10 - Sách Tham Khảo', 'MaLoai'=>15, 'Level'=>3, 'Status'=>1],
            ['MaTheLoai'=>6, 'TenTheLoai'=>'Lớp 12 - Sách Tham Khảo', 'MaLoai'=>16, 'Level'=>4, 'Status'=>1],
            ['MaTheLoai'=>7, 'TenTheLoai'=>'Kiến Thức - Kỹ Năng Sống Cho Trẻ', 'MaLoai'=>8, 'Level'=>3, 'Status'=>1],
            ['MaTheLoai'=>325257678, 'TenTheLoai'=>'Manga - Comic', 'MaLoai'=>4, 'Level'=>4, 'Status'=>1],
            ['MaTheLoai'=>480966078, 'TenTheLoai'=>'Sách tiếng Anh', 'MaLoai'=>6, 'Level'=>8, 'Status'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('the_loai');
    }
}
