@extends('layouts.main')

@section('title', 'Input Sampel')

@section('content')

    @livewire('daftar-sampel-layanan')
    {{-- <div class="p-10 -mt-4 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">
            <ol
                class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
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
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">

                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Daftar <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center ">
                    <span class="mr-2">3</span>
                    Pembayaran
                </li>
            </ol>
        </div>

        <form action="{{ route('layanan.step2.post') }}" method="POST">
            @csrf
            <div class=" p-8 mt-4 rounded-lg h-auto bg-slate-50" id="form">
                <div class="flex justify-between">
                    <div class="font-medium text-2xl items-center">
                        {{ __('Daftar Sampel') }}
                    </div>
                    <div class="flex justify-center">
                        <a href="javascript:void(0)"
                            class="p-2 text-sm flex items-center rounded-lg bg-blue-200 text-blue-800 border border-blue-800"
                            id="tambah-entri">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true" class="w-6">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z">
                                </path>
                            </svg>
                            Tambah Entri</a>
                    </div>
                </div>
            </div>

            <div class="p-8 mt-4 rounded-lg h-auto bg-slate-50" id="form-repeat">

                @if (session('status'))
                    <div id="alert-1"
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
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div id="alert-2"
                        class="flex items-center mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Danger</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="flex mt-4 mb-4 flex-col rounded-md">
                    <div class="flex justify-end">
                        <button type="button"
                            class="p-2 ml-4 text-sm flex items-center rounded-lg bg-red-700 hover:bg-red-800 text-white "
                            id="hapus-entri">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true" class="w-6">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex justify-evenly flex-row w-full">
                        <div class="flex mt-4 mr-2 w-full flex-col">
                            <label for="nama_sampel" class="mb-2 text-gray-900">Nama Sampel</label>
                            <input type="text" id="nama_sampel" name="nama_sampel"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                placeholder="Masukkan Nama Sampel">
                        </div>
                        <div class="flex mt-4 ml-2 items-start w-full flex-col">
                            <label for="jumlah" class="mb-2 text-gray-900">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                min="0" value="0">
                        </div>
                    </div>
                    <div class="flex justify-evenly flex-row w-full">
                        <div class="flex mt-4 mr-2 items-start w-full flex-col">
                            <label for="jenis_sampel" class="mb-2 text-gray-900">Jenis Sampel</label>
                            <select name="jenis_sampel" id="jenis_sampel"
                                class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                                @foreach ($jenis_sampel as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4 ml-2 items-start w-full flex-col">
                            <label for="wujud_sampel" class="mb-2 text-gray-900">Wujud Sampel</label>
                            <select name="wujud_sampel" id="wujud_sampel"
                                class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                                @foreach ($wujud_sampel as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-evenly flex-row w-full">
                        <div class="flex mt-4 mr-2 items-start w-full flex-col">
                            <label for="jadwal" class="mb-2 text-gray-900">Tentukan Jadwal</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div> --}}
                                {{-- <input datepicker datepicker-autohide datepicker-buttons type="date" id="jadwal"
                                    name="jadwal" datepicker-orientation="bottom left" datepicker-format="dd/mm/yyyy"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                    placeholder="Select date"> --}}
                                {{-- <input type="date" name="jadwal" id="jadwal"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5">
                            </div>
                        </div>
                        <div class="flex mt-4 ml-2 items-start w-full flex-col">
                            <label for="catatan" class="mb-2 text-gray-900">Catatan</label>
                            <input type="text" name="catatan" id="catatan" placeholder="Masukkan Catatan Lain"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex my-4 justify-between bg-slate-50 p-4 rounded-lg">
                <a href="{{ route('layanan.step1') }}"
                    class="text-blue-700 bg-transparent mr-2 border-2 border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z">
                        </path>
                    </svg>
                    Cancel
                </a>
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
    </div> --}}
@endsection
