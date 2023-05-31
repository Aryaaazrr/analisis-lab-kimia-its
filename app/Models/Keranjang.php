<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = ['id', 'users_id', 'layanan_id', 'nama_sampel', 'jenis_sampel', 'wujud_sampel', 'jumlah', 'subtotal'];
}
