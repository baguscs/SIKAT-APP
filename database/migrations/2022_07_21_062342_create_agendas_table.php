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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->string('isi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tempat');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('status');
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
        Schema::dropIfExists('agendas');
    }
};
