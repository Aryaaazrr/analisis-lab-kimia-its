@extends('layouts.main')

@section('title', 'Layanan')

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
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="mr-2">2</span>
                        Input <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">3</span>
                    Pembayaran
                </li>
            </ol>
        </div>

        {{-- <form action="{{ route('layanan.step1.post') }}" method="POST">
            @csrf --}}
        <div class="p-4 mt-4 rounded-lg h-auto bg-slate-50">
            <div class="mt-4">
                <div class="mb-4 border-b border-green-200 dark:border-gray-700">
                    <ul class="flex -mb-px text-sm font-medium justify-between text-center w-full" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="w-full" role="presentation">
                            <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Analisa</button>
                        </li>
                        <li class="w-full" role="presentation">
                            <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="dashboard-tab"
                                data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                                aria-selected="false">Sewa</button>
                        </li>
                    </ul>
                </div>
            </div>
            
            @if (session('status'))
                <div id="alert-2"
                    class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-xs text-white uppercase bg-green-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Analisa
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
                                @foreach ($layanan_analisa as $value)
                                    <tr class="bg-white border-b hover:bg-gray-50">

                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $value->nama_layanan }}
                                        </td>
                                        @if ($jenis_customer == 'Internal KImia')
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_internal_kimia) }}
                                            </td>
                                        @elseif ($jenis_customer == 'Internal ITS')
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_internal_its) }}
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_umum) }}
                                            </td>
                                        @endif
                                        <td class="px-6 py-4">
                                            <a href="{{ route('layanan.input-sampel', $value->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Pilih</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-xs text-white uppercase bg-green-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Sewa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pilih
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanan_sewa as $value)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $value->nama_layanan }}
                                        </td>
                                        @if ($jenis_customer == 'Internal KImia')
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_internal_kimia) }}
                                            </td>
                                        @elseif ($jenis_customer == 'Internal ITS')
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_internal_its) }}
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                                {{ currency_IDR($value->harga_umum) }}
                                            </td>
                                        @endif
                                        <td class="px-6 py-4">
                                            <a href="{{ route('layanan.input-sampel', $value->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Pilih</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
