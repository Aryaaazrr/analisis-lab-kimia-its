<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisHargaLayanan extends Model
{
    use HasFactory;

    protected $table = 'jenis_harga_layanan';

    protected $fillable = ['layanan_id', 'jenis_customer_id', 'harga'];
}
