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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('institusi')->nullable();
            $table->string('departemen')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_telepon')->unique();
            $table->string('alamat')->nullable();
            $table->enum('jenis_customer', ['Internal Kimia', 'Internal ITS', 'Umum']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
