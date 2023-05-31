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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('grand_total_transaksi', false, false);
            $table->longText('catatan')->nullable();
            $table->enum('status_transaksi', ['Menunggu Konfirmasi', 'Diterima', 'Proses', 'Selesai']);
            $table->string('hasil_analisis')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('kwitansi')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('status_diterima_at')->nullable();
            $table->dateTime('status_proses_at')->nullable();
            $table->dateTime('status_selesai_at')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
};
