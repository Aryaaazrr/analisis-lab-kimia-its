@extends('layouts.main')

@section('title', 'Detail Riwayat')

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


                <input type="text" id="disabled-input" aria-label="disabled input"
                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $detail->kode_transaksi }}" disabled>



                <ol
                    class="relative ml-8 mt-4 text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-20 ml-6 flex flex-col justify-center mt-4">
                        <span class="absolute flex items-center justify-center w-20 h-20 rounded-full -left-10">
                            <img src="{{ asset('img/diterima.png') }}" alt="icon-diterima" class="w-20 h-20">
                        </span>
                        <h3 class="font-semibold leading-tight ml-8 uppercase text-black">Diterima</h3>
                        @if ($detail->status_diterima_at == null)
                            <p class="text-sm ml-8 italic">Belum Tersedia</p>
                        @else
                            <p class="text-sm ml-8">{{ $detail->status_diterima_at }}</p>
                        @endif
                    </li>
                    <li class="mb-20 ml-6 flex flex-col justify-center mt-4">
                        <span class="absolute flex items-center justify-center w-20 h-20 rounded-full -left-10">
                            <img src="{{ asset('img/proses.png') }}" alt="icon-diterima" class="w-20 h-20">
                        </span>
                        <h3 class="font-semibold leading-tight ml-8 uppercase text-black">Proses</h3>
                        @if ($detail->status_proses_at == null)
                            <p class="text-sm ml-8 italic">Belum Tersedia</p>
                        @else
                            <p class="text-sm ml-8">{{ $detail->status_proses_at }}</p>
                        @endif
                    </li>
                    <li class="ml-6 flex flex-col justify-center mt-4">
                        <span class="absolute flex items-center justify-center w-20 h-20 rounded-full -left-10">
                            <img src="{{ asset('img/selesai.png') }}" alt="icon-diterima" class="w-20 h-20">
                        </span>
                        <h3 class="font-semibold leading-tight ml-8 uppercase text-black">Selesai</h3>
                        @if ($detail->status_selesai_at == null)
                            <p class="text-sm ml-8 italic">Belum Tersedia</p>
                        @else
                            <p class="text-sm ml-8">{{ $detail->status_selesai_at }}</p>
                        @endif
                    </li>
                </ol>
                    <div class="flex justify-center items-center w-full mt-20">
                        <a href="{{ route('riwayat') }}"
                            class="bg-transparent border-2 border-green-600 rounded-lg p-3 mr-2 text-green-600 duration-500">Kembali</a>
                    </div>


            </div>
        </div>
    </div>
@endsection
