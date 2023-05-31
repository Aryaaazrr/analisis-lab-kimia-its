<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranTransaksi extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_transaksi';

    protected $fillable = ['id', 'transaksi_id', 'pembayaran', 'jenis_pembayaran', 'jumlah_bayar', 'bukti_bayar', 'status_pembayaran'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
