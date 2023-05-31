<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananAnalisa extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = ['nama_layanan'];

    protected $attributes = [
        'jenis_layanan' => 'Analisa',
    ];
}
