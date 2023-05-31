@extends('layouts.main')

@section('title', 'Edit Layanan Analisa')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg h-auto bg-slate-50">

            @if ($errors->any())
                <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('layanan-analisa-update', $layanan_analisa->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-6">
                    <div class="flex mt-4 items-start flex-col">
                        <label for="nama_layanan" class="mb-2 text-gray-900">Nama
                            Layanan</label>
                        <input type="text" id="nama_layanan" name="nama_layanan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Nama Layanan" value="{{ $layanan_analisa->nama_layanan }}">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_internal_kimia" class="mb-2 text-gray-900">Harga Internal Kimia</label>
                        <input type="text" id="harga_internal_kimia" name="harga_internal_kimia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Internal Kimia" value="{{ $layanan_analisa->harga_internal_kimia }}">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_internal_its" class="mb-2 text-gray-900">Harga Internal ITS</label>
                        <input type="text" id="harga_internal_its" name="harga_internal_its"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Internal ITS" value="{{ $layanan_analisa->harga_internal_its }}">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="harga_umum" class="mb-2 text-gray-900">Harga Umum</label>
                        <input type="text" id="harga_umum" name="harga_umum"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Harga Umum" value="{{ $layanan_analisa->harga_umum }}">
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-yellow-300 hover:bg-yellow-400 shadow-md focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 mr-4 text-center duration-500">Edit</button>
                <a href="{{ route('layanan-analisa') }}"
                    class="bg-green-500 text-white self-center p-3 text-sm rounded-md shadow-md hover:bg-green-600 duration-500">Kembali</a>
            </form>

        </div>
    </div>

@endsection
