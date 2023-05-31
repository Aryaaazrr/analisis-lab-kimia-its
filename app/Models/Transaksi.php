<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ['kode_transaksi', 'users_id', 'grand_total_transaksi', 'catatan', 'status_transaksi', 'hasil_analisis', 'sertifikat', 'kwitansi', 'start_at'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    public function pembayaranTransaksi()
    {
        return $this->hasMany(PembayaranTransaksi::class, 'transaksi_id');
    }
}
