@extends('layouts.main')

@section('title', 'Hasil Analisa')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-8 rounded-lg h-auto bg-slate-50">
            <div class="flex flex-col pb-4 mb-4">
                <div class="flex justify-between">
                    <div class="flex font-medium text-xl items-center">
                        {{ __('Status Transaksi :') }}
                    </div>
                    <div class="flex font-medium text-xl items-center">
                        {{-- {{ __('Pilihan Layanan :') }} --}}
                    </div>
                </div>

                @if ($detail->status_transaksi == 'Diterima')
                    <div class="w-full my-8 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 50%"></div>
                    </div>
                @elseif ($detail->status_transaksi == 'Proses')
                    <div class="w-full my-8 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                @elseif ($detail->status_transaksi == 'Selesai')
                    <div class="w-full my-8 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                    </div>
                @else
                    <div class="w-full my-8 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 25%"></div>
                    </div>
                @endif


                {{-- <input type="text" id="disabled-input" aria-label="disabled input"
                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $detail->kode_transaksi }}" disabled> --}}
                <div class="flex mb-4 items-start flex-col">
                    <label for="harga_internal_kimia" class="text-gray-900">Hasil Analisis</label>
                    <div class="flex flex-row w-full items-center">
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class=" bg-gray-100 border mr-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $detail->hasil_analisis }}" disabled>
                        <a href="{{ route('riwayat-hasil-analisis', $detail->id) }}" class="flex p-4 text-center self-center text-white bg-blue-500 hover:bg-blue-600 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 duration-500">
                            <svg fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z">
                                </path>
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z">
                                </path>
                            </svg>
                            Unduh
                        </a>
                    </div>
                </div>
                <div class="flex mb-4 items-start flex-col">
                    <label for="harga_internal_kimia" class="text-gray-900">Sertifikat</label>
                    <div class="flex flex-row w-full items-center">
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class=" bg-gray-100 border mr-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $detail->sertifikat }}" disabled>
                        <a href="{{ route('riwayat-sertifikat', $detail->id) }}" class="flex p-4 text-center self-center text-white bg-blue-500 hover:bg-blue-600 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 duration-500">
                            <svg fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z">
                                </path>
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z">
                                </path>
                            </svg>
                            Unduh
                        </a>
                    </div>
                </div>

                <div class="flex justify-center items-center w-full mt-20">
                    <a href="{{ route('riwayat') }}"
                        class="bg-transparent border-2 border-green-600 rounded-lg p-3 mr-2 text-green-600 duration-500">Kembali</a>
                </div>

            </div>
        </div>
    </div>
@endsection
