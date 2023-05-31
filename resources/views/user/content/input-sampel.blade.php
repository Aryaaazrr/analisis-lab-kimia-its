@extends('layouts.main')

@section('title', 'Input Sampel')

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
                <li class="flex items-center text-gray-400">
                    <span class="mr-2">3</span>
                    Pembayaran
                </li>
            </ol>
        </div>

        <div class=" p-6 mt-4 rounded-lg h-auto bg-slate-50" id="form">
            <div class="flex justify-between self-center">
                <div class="flex font-medium text-xl items-center">
                    {{ __('Pilihan Layanan') }}
                </div>
                <div class="flex font-medium text-xl items-center">
                    {{-- <input type="text" id="id_transaksi" name="id_transaksi"
                        class="bg-white border flex border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-auto p-2.5 duration-500"
                        value="{{ $id_transaksi }}" readonly> --}}
                </div>
            </div>
            <div class="flex mt border-t-2 border-gray-200 mt-4 pt-4 h-auto w-full">
                <div class="relative overflow-x-auto w-full shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white uppercase bg-green-900">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Layanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $layanan->nama_layanan }}
                                </th>
                                @if ($jenis_customer == 'Internal KImia')
                                    <td class="px-6 py-4">
                                        {{ currency_IDR($layanan->harga_internal_kimia) }}
                                    </td>
                                @elseif ($jenis_customer == 'Internal ITS')
                                    <td class="px-6 py-4">
                                        {{ currency_IDR($layanan->harga_internal_its) }}
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        {{ currency_IDR($layanan->harga_umum) }}
                                    </td>
                                @endif
                                <td class="px-6 py-4">
                                    <a href="{{ route('layanan.input-sampel', $layanan->id) }}"
                                        class="font-medium text-blue-600 hover:underline">Input Sampel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex my-4 justify-between bg-slate-50 p-4 rounded-lg">
            <a href="{{ route('layanan') }}"
                class="text-blue-700 bg-transparent mr-2 border-2 border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z">
                    </path>
                </svg>
                Cancel
            </a>
            {{-- <button type="submit"
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Input Sampel
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> --}}
        </div>

    </div>


@endsection
