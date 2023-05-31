@extends('layouts.main')

@section('title', 'Jenis Layanan')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">
            <div class="flex items-center justify-between pb-4 mb-5">
                <a href=""
                    class="bg-sky-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-sky-600 duration-500">Tambah
                    Data</a>
                <div class="flex flex-row">
                    <label for="jenis" class="self-center mr-2 text-black">Jenis Customer <span>:</span></label>
                    <select name="jenis" id="jenis"
                        class="w-64 h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block active:cursor-pointer hover:cursor-pointer p-2.5 duration-500">
                        @foreach ($jenis_customer as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis_customer }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="flex mb-4 border-b border-gray-200 w-full">
                <ul class="flex -mb-px text-sm font-medium justify-between text-center w-full" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="w-full" role="presentation">
                        <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Analisa</button>
                    </li>
                    <li class="w-full" role="presentation">
                        <button
                            class="inline-block p-4 w-full border-b-2 rounded-t-lg"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Sewa</button>
                    </li>
                </ul>
            </div>
            
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-xs text-white uppercase bg-green-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Analisis
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Dibuat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Diperbarui
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
                                @foreach ($layanan as $value)
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $value->nama_layanan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $value->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $value->updated_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $jenis_harga_layanan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href=""
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <a href=""
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-xs text-white uppercase bg-green-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Fasilitas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanan as $value)
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{-- {{ $value->nama_layanan }} --}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ $value->created_at }} --}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ $value->updated_at }} --}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href=""
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                            <a href=""
                                                class="font-medium text-blue-600 hover:underline">Hapus</a>
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
