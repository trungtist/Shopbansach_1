<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('TenDN',50);
            $table->string('MatKhau');
            $table->integer('Role');
        });

        DB::table('user')->insert([
            ['TenDN'=>'admin', 'MatKhau'=>'$2y$10$grSmMYTthyqx1thqeRwA2OWD/ieKEvjWLOe7xtt7nf2vxIwxzpWjq', 'Role'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
