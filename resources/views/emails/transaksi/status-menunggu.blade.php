<x-mail::message>
Halo!

<div>
    Kode Transaksi: {{ $kode_transaksi }}
</div>
<div>
    Total yang harus dibayar: {{ currency_IDR($grand_total_transaksi) }}
</div>
<div>
    Status Transaksi: {{ $status_transaksi }}
</div>
<br>

<div>
    Silahkan tunggu konfirmasi diterima untuk melanjutkan pembayaran. 
</div>
<br>

<x-mail::button :url="$url">
Cek Status
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
