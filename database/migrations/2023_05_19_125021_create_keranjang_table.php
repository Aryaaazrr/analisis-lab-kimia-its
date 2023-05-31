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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('layanan_id');
            $table->foreign('layanan_id')->references('id')->on('layanan');
            $table->string('nama_sampel');
            $table->enum('jenis_sampel', ['Organik', 'Non-Organik']);
            $table->enum('wujud_sampel', ['Padat', 'Cair', 'Gas']);
            $table->tinyInteger('jumlah', false, false);
            $table->integer('subtotal', false, false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
};
