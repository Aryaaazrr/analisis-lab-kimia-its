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
        Schema::create('pembayaran_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->enum('pembayaran', ['DP', 'Lunas']);
            $table->enum('jenis_pembayaran', ['Tunai', 'Non-tunai']);
            $table->integer('jumlah_bayar', false, false);
            $table->string('bukti_bayar');
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Menunggu Konfirmasi', 'Sudah Dibayar', 'Belum Lunas', 'Ditolak']);
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
        Schema::dropIfExists('pembayaran_transaksi');
    }
};
