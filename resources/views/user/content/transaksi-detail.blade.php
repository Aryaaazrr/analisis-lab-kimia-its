@extends('layouts.main')

@section('title', 'Lihat Detail Transaksi')

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

            <form action="{{ route('transaksi-status', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-4">
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="kode_transaksi" class="mb-2 text-gray-900">Kode Transaksi</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $transaksi->kode_transaksi }}" disabled>
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
                            <label for="nama_layanan" class="mb-2 text-gray-900">Nama Layanan</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $layanan->nama_layanan }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="jenis_layanan" class="mb-2 text-gray-900">Jenis Layanan</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $layanan->jenis_layanan }}" disabled>
                        </div>
                    </div>
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="jadwal" class="mb-2 text-gray-900">Jadwal</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $transaksi->start_at }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="grand_total" class="mb-2 text-gray-900">Total</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $transaksi->grand_total_transaksi }}" disabled>
                        </div>
                    </div>
                    <div class="flex mt-2 items-start justify-between">
                        <div class="flex flex-col w-full mr-2">
                            <label for="catatan" class="mb-2 text-gray-900">Catatan</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $transaksi->catatan }}" disabled>
                        </div>
                        <div class="flex flex-col w-full ml-2">
                            <label for="status_transaksi" class="mb-2 text-gray-900">Status Transaksi</label>
                            <select name="status_transaksi" id="status_transaksi"
                                class="w-full h-10 border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                                <option value="{{ $transaksi->status_transaksi }}"
                                    {{ old('status_transaksi') == $transaksi->status_transaksi ? 'selected' : '' }}
                                    @readonly(true)>
                                    {{ $transaksi->status_transaksi }}
                                </option>
                                @foreach ($status_transaksi as $item)
                                    <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if ($transaksi->status_transaksi == 'Proses')
                        <div class="flex mt-2 items-start justify-between">
                            <div class="flex flex-col w-full mr-2">
                                <label for="hasil_analisis" class="mb-2 text-gray-900">Upload Hasil Analisis</label>
                                <input type="file" name="hasil_analisis" id="hasil_analisis"
                                    class="mb-8 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-full ml-2">
                                <label for="sertifikat" class="mb-2 text-gray-900">Upload Sertifikat Analisis</label>
                                <input type="file" name="sertifikat" id="sertifikat"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex flex-row justify-between">
                    <a href="{{ route('transaksi') }}"
                        class="bg-green-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-green-600 duration-500">Kembali</a>
                    @if ($pembayaran == null)
                        <button type="submit"
                            class="text-white bg-yellow-300 hover:bg-yellow-400 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">Perbarui
                            Status</button>
                    @else
                        <div>
                            <a href="{{ route('transaksi-pembayaran', $pembayaran->transaksi_id) }}"
                                class="bg-blue-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-blue-600 duration-500">Lihat
                                Pembayaran</a>
                            <button type="submit"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">Perbarui
                                Status</button>
                        </div>
                    @endif
                </div>
            </form>

        </div>
        @foreach ($detail_transaksi as $item)
            <div class=" p-6 mt-4 rounded-lg h-auto bg-slate-50" id="form">
                <div class="flex justify-between self-center">
                    <div class="flex font-medium text-xl items-center">
                        {{ __('Daftar Sampel') }} <span class="ml-2">{{ $loop->iteration }}</span>
                    </div>
                </div>
                <div class="flex mt-4 flex-col rounded-md">
                    <div class="flex justify-evenly flex-row w-full">
                        <div class="flex mt-4 mr-2 w-full flex-col">
                            <label for="nama_sampel" class="mb-2 text-sm text-gray-900">Nama
                                Sampel</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $item->nama_sampel }}" disabled>
                            {{-- <input type="text" id="nama_sampel" name="nama_sampel" value="{{ $item->nama_sampel }}"
                                readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"> --}}
                        </div>
                        <div class="flex mt-4 mr-2 w-full flex-col">
                            <label for="jumlah" class="mb-2 text-sm text-gray-900">Jumlah</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $item->jumlah }}" disabled>
                            {{-- <input type="text" id="jumlah" name="jumlah" value="{{ $item->jumlah }}" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"> --}}
                        </div>
                    </div>
                    <div class="flex justify-evenly flex-row w-full">
                        <div class="flex mt-4 mr-2 w-full flex-col">
                            <label for="jenis_sampel" class="mb-2 text-sm text-gray-900">Jenis
                                Sampel</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $item->jenis_sampel }}" disabled>
                            {{-- <input type="text" id="jenis_sampel" name="jenis_sampel"
                                value="{{ $item->jenis_sampel }}" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"> --}}
                        </div>
                        <div class="flex mt-4 mr-2 w-full flex-col">
                            <label for="wujud_sampel" class="mb-2 text-sm text-gray-900">Wujud Sampel</label>
                            <input type="text" id="disabled-input" aria-label="disabled input"
                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $item->wujud_sampel }}" disabled>
                            {{-- <input type="text" id="wujud_sampel" name="wujud_sampel"
                                value="{{ $item->wujud_sampel }}" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
