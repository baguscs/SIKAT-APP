<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama_warga');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('status_perkawinan');
            $table->bigInteger('no_kk')->unique();
            $table->string('alamat');
            $table->string('no_telp');
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'buddha']);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('pekerjaan');
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
        Schema::dropIfExists('wargas');
    }
};
