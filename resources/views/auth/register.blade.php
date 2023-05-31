@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="bg-white py-6 rounded shadow-md w-full md:w-7/12 lg:w-6/12 xl:w-3/12 m-5">
        <div class="flex flex-col justify-center items-center text-center mb-3">
            <img src="img/logo.png" alt="logo" class="mt-10">
            <div class="w-10/12">
                <h1 class="font-semibold text-2xl mt-10">SIGN UP</h1>
                <p class="w-full mt-2">Masukkan data diri anda untuk mendaftarkan akun</p>

                @if ($errors->any())
                    <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="register" method="POST">
                    @csrf
                    <div class="flex mt-4 items-start flex-col">
                        <label for="username" class="mb-2">Username <span class="text-red-600">*</span></label>
                        <input type="text" name="username" id="username" autofocus value="{{ old('username') }}"
                            placeholder="Masukkan Username"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="nama_lengkap" class="mb-2">Nama Lengkap <span class="text-red-600">*</span></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" autofocus value="{{ old('nama_lengkap') }}"
                            placeholder="Masukkan Nama Lengkap"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="email" class="mb-2">Email <span class="text-red-600">*</span></label>
                        <input type="email" name="email" id="email" autofocus placeholder="Masukkan Email" value="{{ old('email') }}"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="jenis" class="mb-2">Jenis Customer <span class="text-red-600">*</span></label>
                        <select name="jenis" id="jenis"
                            class="w-full h-10 border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            @foreach ($jenis_customer as $item)
                                <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="institusi" class="mb-2">Institusi</label>
                        <input type="text" name="institusi" id="institusi" autofocus value="{{ old('institusi') }}"
                            placeholder="Masukkan Nama Institusi"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="departemen" class="mb-2">Departemen / Program Studi</label>
                        <input type="text" name="departemen" id="departemen" autofocus value="{{ old('departemen') }}"
                            placeholder="Masukkan Departemen atau Program Studi"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="no_telepon" class="mb-2">No Whatsapp <span class="text-red-600">*</span></label>
                        <input type="text" name="no_telepon" id="no_telepon" autofocus value="{{ old('no_telepon') }}"
                            placeholder="Masukkan No Whatsapp"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="password" class="mb-2">Kata Sandi <span class="text-red-600">*</span></label>
                        <input type="password" name="password" id="password" autofocus 
                            placeholder="Masukkan Kata Sandi"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="confirm-password" class="mb-2">Konfirmasi Kata Sandi <span class="text-red-600">*</span></label>
                        <input type="password" name="confirm-password" id="confirm-password" autofocus
                            placeholder="Masukkan Konfirmasi Kata Sandi"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-6 mb-8 items-start flex-col">
                        <button type="submit"
                            class="h-10 w w-full bg-green-600 hover:bg-green-800 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500 ">Sign
                            Up</button>
                    </div>
                    <div class="flex mt-2 items-center flex-row justify-center">
                        <p class="text-xs mr-2">Sudah memiliki akun?</p><a href="{{ route('login') }}"
                            class="text-xs text-green-600 hover:text-green-800 outline-none underline duration-500">Sign
                            In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
