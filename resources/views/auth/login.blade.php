@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <div class="bg-white py-6 rounded shadow-md w-full md:w-7/12 lg:w-6/12 xl:w-3/12 m-5">
        {{-- <img src="img/logo.png" alt="logo" class="absolute w-56 object-fill -mt-9 opacity-20 grayscale-0"> --}}
        <div class="flex flex-col justify-center items-center text-center mb-3">
            <img src="img/logo.png" alt="logo" class="mt-10">
            <div class="w-10/12">
                <h1 class="font-semibold text-2xl mt-10">SIGN IN</h1>
                <p class="w-full mt-2">Masukkan email dan kata sandi Anda di bawah ini</p>

                @if (session('status'))
                    <div class="font-normal p-2 text-red-950 mt-3 bg-red-300 rounded-md">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="font-normal p-2 text-green-950 mt-3 bg-green-300 rounded-md">
                        {{ session('message-success') }}
                    </div>
                @endif

                <form action="" method="POST">
                    @csrf
                    <div class="flex mt-4 items-start flex-col">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" name="email" id="email" required autofocus placeholder="Masukkan Email"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-4 items-start flex-col">
                        <label for="password" class="mb-2">Kata Sandi</label>
                        <input type="password" name="password" id="password" required autofocus
                            placeholder="Masukkan Kata Sandi"
                            class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                    </div>
                    <div class="flex mt-2 items-end flex-col">
                        <a href="/forgot" class="text-xs hover:text-green-800 outline-none duration-500">Lupa Kata
                            Sandi?</a>
                    </div>
                    <div class="flex mt-4 mb-8 items-start flex-col">
                        <button type="submit"
                            class="h-10 w w-full bg-green-600 hover:bg-green-800 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500 ">Sign
                            In</button>
                    </div>
                    <div class="flex mt-2 items-center flex-row justify-center">
                        <p class="text-xs mr-2">Tidak mempunyai akun?</p><a href="/register"
                            class="text-xs text-green-600 hover:text-green-800 outline-none underline duration-500">Daftar Disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
