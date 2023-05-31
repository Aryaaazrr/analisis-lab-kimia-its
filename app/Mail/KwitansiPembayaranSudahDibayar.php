<?php

namespace App\Mail;

use App\Models\PembayaranTransaksi;
use App\Models\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class KwitansiPembayaranSudahDibayar extends Mailable
{
    use Queueable, SerializesModels;

        /**
     * The order instance.
     *
     * @var \App\Models\PembayaranTransaksi
     */
    protected $pembayaran;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PembayaranTransaksi $pembayaran)
    {
        $this->pembayaran = $pembayaran;
        
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Kwitansi Pembayaran Sudah Dibayar',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $transaksi = $this->pembayaran->transaksi()->first();
        $domain = Config::get('app.url');
        return new Content(
            markdown: 'emails.pembayaran.kwitansi-sudahDibayar',
            with: [
                'kode_transaksi' => $transaksi->kode_transaksi,
                // 'nama_user' => $this->nama_user,
                'jumlah_bayar' => $this->pembayaran->jumlah_bayar,
                'status_pembayaran' => $this->pembayaran->status_pembayaran,
                'url' => $domain
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
