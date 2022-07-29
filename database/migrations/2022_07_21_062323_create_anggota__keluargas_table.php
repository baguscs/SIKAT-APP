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
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wargas_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('nik')->unique();
            $table->string('nama_warga');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('status_hubungan');
            $table->string('no_telp');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']);
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
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
        Schema::dropIfExists('anggota__keluargas');
    }
};
