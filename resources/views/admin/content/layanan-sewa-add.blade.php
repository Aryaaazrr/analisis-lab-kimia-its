@extends('layouts.main')

@section('title', 'Tambah Layanan Sewa')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">
            @if (session('success'))
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
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

            @if ($errors->any())
                <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            

            <form action="{{ route('layanan-sewa-store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <div class="flex mt-4 items-start flex-col">
                        <label for="nama_layanan" class="mb-2 text-gray-900">Nama
                            Layanan</label>
                        <input type="text" id="nama_layanan" name="nama_layanan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Nama Layanan">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_internal_kimia" class="mb-2 text-gray-900">Harga Internal Kimia</label>
                        <input type="text" id="harga_internal_kimia" name="harga_internal_kimia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Internal Kimia">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_internal_its" class="mb-2 text-gray-900">Harga Internal ITS</label>
                        <input type="text" id="harga_internal_its" name="harga_internal_its"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Internal ITS">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_umum" class="mb-2 text-gray-900">Harga Umum</label>
                        <input type="text" id="harga_umum" name="harga_umum"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Umum">
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">Tambah</button>
                <a href="{{ route('layanan-sewa') }}"
                    class="bg-green-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-green-600 duration-500">Kembali</a>
            </form>

        </div>
    </div>

@endsection
