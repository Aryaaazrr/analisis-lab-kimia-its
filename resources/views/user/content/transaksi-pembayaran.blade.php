@extends('layouts.main')

@section('title', 'Lihat Pembayaran Transaksi')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">

            @if ($errors->any())
                <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('transaksi-status-pembayaran', $pembayaran->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-4">
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="kode_transaksi" class="mb-2 text-gray-900">Kode Transaksi</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $pembayaran->kode_transaksi }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="nama_customer" class="mb-2 text-gray-900">Nama Customer</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $cust->nama_lengkap }}" disabled>
                        </div>
                    </div>
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="nama_layanan" class="mb-2 text-gray-900">Pembayaran</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $pembayaran->pembayaran }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="jenis_layanan" class="mb-2 text-gray-900">Jenis Pembayaran</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $pembayaran->jenis_pembayaran }}" disabled>
                        </div>
                    </div>
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="grand_total" class="mb-2 text-gray-900">Total</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $pembayaran->grand_total_transaksi }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="grand_total" class="mb-2 text-gray-900">Nominal Yang sudah dibayar</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $pembayaran->jumlah_bayar }}" disabled>
                        </div>
                    </div>
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="status_pembayaran" class="mb-2 text-gray-900">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran"
                                class="w-full h-10 border mb-6 border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                                <option value="{{ $pembayaran->status_pembayaran }}"
                                    {{ old('status_pembayaran') == $pembayaran->status_pembayaran ? 'selected' : '' }}
                                    @readonly(true)>
                                    {{ $pembayaran->status_pembayaran }}
                                </option>
                                @foreach ($status_pembayaran as $item)
                                    <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <a href="{{ route('transaksi') }}"
                        class="bg-green-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-green-600 duration-500">Kembali</a>
                    <div class="flex justify-end">
                        <a href="{{ route('download.bukti', $pembayaran->transaksi_id) }}" target="_blank"
                            rel="noopener noreferrer"
                            class="flex flex-row text-white bg-blue-500 hover:bg-blue-600 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true" class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z">
                                </path>
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z">
                                </path>
                            </svg>
                            Unduh Bukti Pembayaran</a>
                        <button type="submit"
                            class="text-white bg-yellow-300 hover:bg-yellow-400 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">Perbarui
                            Status</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
