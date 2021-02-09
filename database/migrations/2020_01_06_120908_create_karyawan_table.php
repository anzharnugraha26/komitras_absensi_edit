<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tanggalmasuk');
            $table->string('tanggallahir');
            $table->string('divisi');
            $table->string('nama_divisi');
	        $table->string('email')->unique();
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
