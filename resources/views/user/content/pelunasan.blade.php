@extends('layouts.main')

@section('title', 'Pelunasan')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">
            <ol
                class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-green-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Pilih <span class="hidden sm:inline-flex sm:ml-2">Layanan</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-green-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">

                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Input <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center text-green-600 dark:text-blue-500">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="mr-2">Pembayaran</span>
                </li>
            </ol>
        </div>

        <div class="p-6 mt-4 rounded-lg h-auto bg-slate-50">
            <div class="flex justify-between self-center">
                <div class="flex font-medium text-xl items-center">
                    {{ __('Info Pelunasan :') }}
                </div>
            </div>

            @if ($errors->any())
                <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('riwayat-pelunasan', $detail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex justify-evenly">
                    <div class="flex mt-8 mr-2 items-start w-full flex-col">
                        <label for="informasi_pembayaran" class="mb-2 text-sm text-gray-900">Informasi Transfer</label>
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class="bg-gray-100 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="No Rek : 1673015902 BNI An. Riris Kurniarina" disabled>
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="pembayaran" class="mb-2 text-gray-900">Pembayaran</label>
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class="bg-gray-100 border font-medium border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $pembayaran->pembayaran }}" disabled>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="jenis_pembayaran" class="mb-2 text-gray-900">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran"
                            class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            @foreach ($jenis_pembayaran as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="total_biaya" class="mb-2 text-gray-900">Total pelunasan</label>
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class="bg-gray-100 border font-medium border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ currency_IDR($total_pelunasan) }}" disabled>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <div class="flex justify-center flex-row">
                            <label for="jumlah_bayar" class="mb-2 text-gray-900">Nominal Bayar</label>
                        </div>
                        <input type="text" id="jumlah_bayar" name="jumlah_bayar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Nominal Pembayaran">
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="status_pembayaran" class="mb-2 text-gray-900">Status Pembayaran</label>
                        <input type="text" id="disabled-input" aria-label="disabled input"
                            class="bg-gray-100 border font-medium border-gray-300 text-red-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $pembayaran->status_pembayaran }}" disabled>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="bukti_bayar" class="mb-2 text-gray-900 flex text-end">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" id="bukti_bayar"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    </div>
                </div>
                <div class="mt-10 flex justify-between items-center">
                    <a href="{{ route('riwayat') }}"
                        class="text-blue-700 bg-transparent mr-2 border-2 border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z">
                            </path>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 ml-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Kirim
                        <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
