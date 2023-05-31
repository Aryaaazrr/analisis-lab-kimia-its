@extends('layouts.main')

@section('title', 'Pengaturan')

@section('content')
    <div class="p-10 mt-20 sm:ml-64">


        @if (session('success'))
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('message-success') }}</div>
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

        <div class="p-4 rounded-lg h-auto bg-slate-50">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex -mb-px text-sm font-medium justify-between text-center w-full" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="w-full" role="presentation">
                        <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Ubah Profil</button>
                    </li>
                    <li class="w-full" role="presentation">
                        <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="dashboard-tab"
                            data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                            aria-selected="false">Ubah Password</button>
                    </li>
                </ul>
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
            <div id="myTabContent">
                <div class="hidden md:p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <form action="{{ route('pengaturan-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex w-full h-auto justify-between">
                            <div class="md:w-52 w-80 mr-4 md:mr-10 flex max-h-52">
                                @if ($user->foto)
                                    <img src="{{ asset('uploads/photo/' . $user->foto) }}" class=" rounded-2xl mr-2"
                                        alt="Foto Pengguna">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="w-52 rounded-2xl mr-2"
                                        alt="Foto Default">
                                @endif
                            </div>
                            <div class="w-full flex justify-center flex-col">
                                <div class="flex w-full flex-col mb-4 flex-wrap">
                                    <input type="text" hidden value="{{ $user->id }}" name="id">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="username">Username</label>
                                    <input type="text" id="username" name="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                        value="{{ $user->username }}" readonly>
                                </div>
                                <div class="flex w-full flex-col flex-wrap">
                                    <div class="flex flex-col items-start md:flex-row mb-2 md:items-center">
                                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                            for="file_input">Upload
                                            file</label>
                                        <p class=" md:ml-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">(PNG,
                                            JPG
                                            or
                                            JPEG.)</p>
                                    </div>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                        name="foto" aria-describedby="file_input_help" id="file_input" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class=" mb-4">
                                <label for="nama_lengkap" class="black text-sm font-medium mb-2 text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->nama_lengkap) ? old($user->nama_lengkap) : $user->nama_lengkap }}">
                            </div>
                            <div class=" mb-4">
                                <label for="email" class="mb-2 text-gray-900">Email</label>
                                <input type="text" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->email) ? old($user->email) : $user->email }}">
                            </div>
                            <div class=" mb-4">
                                <label for="no_telepon" class="mb-2 text-gray-900">No. Whatsapp</label>
                                <input type="text" id="no_telepon" name="no_telepon"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->no_telepon) ? old($user->no_telepon) : $user->no_telepon }}">
                            </div>
                            <div class=" mb-4">
                                <label for="institusi" class="mb-2 text-gray-900">Institusi</label>
                                <input type="text" id="institusi" name="institusi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->institusi) ? old($user->institusi) : $user->institusi }}">
                            </div>
                            <div class=" mb-4">
                                <label for="departemen" class="mb-2 text-gray-900">Departemen / Prodi</label>
                                <input type="text" id="departemen" name="departemen"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->departemen) ? $user->departemen : $user->departemen }}">
                            </div>
                            <div class=" mb-4">
                                <label for="alamat" class="mb-2 text-gray-900">Alamat</label>
                                {{-- <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea> --}}
                                <input type="text" id="alamat" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    value="{{ old($user->alamat) ? old($user->alamat) : $user->alamat }}">
                            </div>
                        </div>
                        <div class="w-full flex justify-end items-center mt-4">
                            <button type="submit"
                                class="h-10 p-5 flex items-center bg-yellow-400 hover:bg-yellow-500 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500">Perbarui
                                Profil</button>
                        </div>
                    </form>


                </div>
                <div class="hidden md:p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <form action="{{ route('pengaturan-update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                            <div class=" mb-4">
                                <label for="old_password" class="black text-sm font-medium mb-2 text-gray-900">Password
                                    Lama</label>
                                <input type="password" id="old_password" name="old_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    placeholder="Masukkan Password Lama">
                            </div>
                            <div class=" mb-4">
                                <label for="new_password" class="black text-sm font-medium mb-2 text-gray-900">Password
                                    Baru</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    placeholder="Masukkan Password Baru">
                            </div>
                            <div class=" mb-4">
                                <label for="confirm_password"
                                    class="black text-sm font-medium mb-2 text-gray-900">Konfirmasi
                                    Password Baru</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                                    placeholder="Masukkan Konfirmasi Password Baru">
                            </div>
                        </div>
                        <div class="w-full flex justify-start items-center mt-4">
                            <button type="submit"
                                class="h-10 p-5 flex items-center bg-yellow-400 hover:bg-yellow-500 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
