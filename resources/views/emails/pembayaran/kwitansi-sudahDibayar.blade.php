<x-mail::message>
TANDA TERIMA UANG MUKA LAYANAN

<div>
    Nomor: {{ $kode_transaksi }}
</div>
<div>
    Jumlah Uang diterima keseluruhan: {{ currency_IDR($jumlah_bayar) }}
</div>
<div>
    Status Pembayaran: {{ $status_pembayaran }}
</div>
<br>


<x-mail::button :url="$url">
Cek Status Pembayaran
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
