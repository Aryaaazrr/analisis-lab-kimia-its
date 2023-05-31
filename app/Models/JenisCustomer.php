<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCustomer extends Model
{
    use HasFactory;

    protected $table = 'jenis_customer';

    protected $fillable = [
        'nama_jenis_customer',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
