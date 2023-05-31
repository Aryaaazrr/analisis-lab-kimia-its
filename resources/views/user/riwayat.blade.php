@extends('layouts.main')

@section('title', 'Riwayat Layanan')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">

        @if (session('status'))
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('status') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif

        <div class="p-4 rounded-lg h-auto bg-slate-50">
            <div class="relative overflow-x-auto bg-slate-50 shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center text-gray-500">
                    <thead class="text-xs text-white uppercase bg-green-900">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode Transaksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Dibuat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Mulai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Selesai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->kode_transaksi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tanggal_dibuat }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tanggal_mulai }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->status_transaksi == 'Selesai')
                                        {{ $tanggal_selesai }}
                                    @else
                                        {{ $item->status_selesai_at }}
                                    @endif
                                </td>
                                <td class="px-6 py-6">
                                    @if ($item->status_transaksi == 'Diterima')
                                        <button
                                            class=" bg-amber-400 rounded-3xl uppercase text-xs text-white p-2 hover:bg-amber-500 duration-500">
                                            {{ $item->status_transaksi }}
                                        </button>
                                    @elseif ($item->status_transaksi == 'Proses')
                                        <button
                                            class=" bg-blue-500 rounded-3xl uppercase text-xs text-white p-2 hover:bg-blue-600 duration-500">
                                            {{ $item->status_transaksi }}
                                        </button>
                                    @elseif ($item->status_transaksi == 'Selesai')
                                        <button
                                            class=" bg-green-500 rounded-3xl uppercase text-xs text-white p-2 hover:bg-green-600 duration-500">
                                            {{ $item->status_transaksi }}
                                        </button>
                                    @elseif ($item->status_transaksi == 'Ditolak')
                                        <button
                                            class=" bg-red-600 rounded-3xl uppercase text-xs text-white p-2 hover:bg-red-700 duration-500">
                                            {{ $item->status_transaksi }}
                                        </button>
                                    @else
                                        <button
                                            class=" bg-sky-500 rounded-3xl uppercase text-xs text-white p-2 hover:bg-sky-600 duration-500">
                                            {{ $item->status_transaksi }}
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex flex-col items-center justify-center">
                                    @if ($item->status_transaksi == 'Diterima')
                                        <a href="{{ route('layanan.pembayaran', $item->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lanjutkan
                                            Pembayaran</a>
                                    @elseif($item->status_transaksi == 'Selesai')
                                        <a href="{{ route('riwayat-hasil', $item->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Hasil</a>
                                    @else
                                        @if ($cekPembayaran == $item->id)
                                            <a href="{{ route('riwayat-status', $item->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Lihat
                                                Detail</a>
                                            <a href="{{ route('riwayat-pembayaran', $cekPembayaran) }}"
                                                class="font-medium text-blue-600 hover:underline">Lihat
                                                Pembayaran</a>
                                        @else
                                            <a href="{{ route('riwayat-status', $item->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                                Detail</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
