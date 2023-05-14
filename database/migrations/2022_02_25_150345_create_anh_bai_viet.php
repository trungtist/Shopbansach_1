<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAnhBaiViet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anh_bai_viet', function (Blueprint $table) {
            $table->integer('id',11);
		    $table->text('name_image')->nullable()->default('');
        });

        DB::table('anh_bai_viet')->insert([
            ['id'=>1645028748, 'name_image'=>'hinh-nen-phong-canh-1.jpg'],
            ['id'=>1645034130, 'name_image'=>'273203989_2154362718035042_1197821733344498729_n.jpg']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anh_bai_viet');
    }
}
