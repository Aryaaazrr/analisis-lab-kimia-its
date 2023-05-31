<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan', 
        'jenis_layanan',
        'harga_internal_kimia',
        'harga_internal_its',
        'harga_umum'
    ];
}
