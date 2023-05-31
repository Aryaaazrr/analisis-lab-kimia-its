@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <div class="p-2 md:p-6 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto">
            <div class="grid xl:grid-cols-4 gap-4 mb-4">
                <div class="flex flex-col items-center justify-center h-40 rounded-2xl bg-white border-2">
                    <img src="/img/icon-sampel.png" alt="icon" class="absolute md:-ml-64 md:w-28 w-24 -ml-56">
                    <p class="text-2xl text-black font-semibold">Jumlah Sampel</p>
                    <p class="text-5xl text-black font-semibold mt-4 ">{{ $jumlahSampel }}</p>
                </div>
                <div class="flex flex-col items-center justify-center h-40 rounded-2xl bg-white border-2">
                    <img src="/img/icon-customer.png" alt="icon" class="absolute md:-ml-64 md:w-28 w-24 -ml-56">
                    <p class="text-2xl text-black font-semibold">Customer</p>
                    <p class="text-5xl text-black font-semibold mt-4 ">{{ $customer }}</p>
                </div>
                <div class="flex flex-col items-center justify-center h-40 rounded-2xl bg-white border-2">
                    <img src="/img/icon-proses.png" alt="icon" class="absolute md:-ml-64 md:w-28 w-24 -ml-52">
                    <p class="text-2xl text-black font-semibold">Dalam Proses</p>
                    <p class="text-5xl text-black font-semibold mt-4 ">{{ $status_proses }}</p>
                </div>
                <div class="flex flex-col items-center justify-center h-40 rounded-2xl bg-white border-2">
                    <img src="/img/icon-analis.png" alt="icon" class="absolute md:-ml-64 md:w-24 w-20 -ml-52">
                    <p class="text-2xl text-black font-semibold">Total Analisis</p>
                    <p class="text-5xl text-black font-semibold mt-4 ">10</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-12 mb-4">
                {{-- <div class="flex w-full h-auto mt-10 rounded p-5 bg-gray-50"> --}}

                {{-- <div class="flex flex-col overflow-x-auto mb-5 shadow-md rounded-lg p-4 bg-gray-100">
                    <form action="{{ route('beranda-search') }}" method="post">
                        @csrf
                        <div class="flex flex-row items-center justify-start pb-1">
                            <div class="relative flex flex-row ">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide type="text" datepicker-orientation="bottom left"
                                    datepicker-format="yyyy-mm-dd" name="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                    placeholder="Select date">
                            </div>
                            <div class="flex flex-row w-full">
                                <button>Cek</button>
                            </div>
                        </div>
                    </form>

                    <table class="w-full mt-4 text-sm text-left text-gray-500 rounded-lg">
                        <thead class="text-sm text-white uppercase bg-green-900">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ID Transaksi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Layanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Layanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($search as $item)
                                <tr class="bg-white border-b hover:bg-green-50">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->grand_total_transaksi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <div class="flex flex-col overflow-x-auto mb-5 shadow-md rounded-lg p-4 bg-gray-100">
                    <form action="{{ route('beranda-search') }}" method="post">
                        @csrf
                        <div class="flex flex-row items-center justify-start pb-1">
                            <div class="relative flex flex-row">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide type="text" datepicker-orientation="bottom left"
                                    datepicker-format="yyyy-mm-dd" name="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                    placeholder="Select date">
                            </div>
                            <div class="flex flex-row w-full">
                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-2 ml-2 rounded-md hover:bg-green-700">
                                    Cek
                                </button>
                            </div>
                        </div>
                    </form>

                    @if (isset($search))
                        <table class="w-full mt-4 text-sm text-left text-gray-500 rounded-lg">
                            <thead class="text-sm text-white uppercase bg-green-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ID Transaksi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Dibuat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Mulai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($search as $item)
                                    <tr class="bg-white border-b hover:bg-green-50">
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item->kode_transaksi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->start_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ currency_IDR($item->grand_total_transaksi) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('transaksi-detail', $item->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Cek</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-gray-500 text-center">Tidak ada data
                                            ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>


                {{-- </div> --}}
            </div>

            {{-- <div class="grid grid-cols-1 gap-4 mt-8 mb-4">

                <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Sampel</time> --}}
                    {{-- <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                        <li>
                            <a href="#"
                                class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                <img class="w-12 h-12 mb-3 mr-3 rounded-full sm:mb-0"
                                    src="/docs/images/people/profile-picture-1.jpg" alt="Jese Leos image" />
                                <div class="text-gray-600 dark:text-gray-400">
                                    <div class="text-base font-normal"><span
                                            class="font-medium text-gray-900 dark:text-white">Jese Leos</span> likes <span
                                            class="font-medium text-gray-900 dark:text-white">Bonnie Green's</span> post in
                                        <span class="font-medium text-gray-900 dark:text-white"> How to start with Flowbite
                                            library</span></div>
                                    <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                                    <span
                                        class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                        <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Public
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                <img class="w-12 h-12 mb-3 mr-3 rounded-full sm:mb-0"
                                    src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie Green image" />
                                <div>
                                    <div class="text-base font-normal text-gray-600 dark:text-gray-400"><span
                                            class="font-medium text-gray-900 dark:text-white">Bonnie Green</span> react to
                                        <span class="font-medium text-gray-900 dark:text-white">Thomas Lean's</span>
                                        comment</div>
                                    <span
                                        class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                        <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                                clip-rule="evenodd"></path>
                                            <path
                                                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z">
                                            </path>
                                        </svg>
                                        Private
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ol> --}}
                {{-- </div>

            </div> --}}
        </div>
    </div>
@endsection
