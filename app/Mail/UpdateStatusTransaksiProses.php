<?php

namespace App\Mail;

use App\Models\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class UpdateStatusTransaksiProses extends Mailable
{
    use Queueable, SerializesModels;

        /**
     * The order instance.
     *
     * @var \App\Models\Transaksi
     */
    protected $transaksi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Update Status Transaksi Proses',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $domain = Config::get('app.url');
        return new Content(
            markdown: 'emails.transaksi.status-proses',
            with: [
                'kode_transaksi' => $this->transaksi->kode_transaksi,
                'status_transaksi' => $this->transaksi->status_transaksi,
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
