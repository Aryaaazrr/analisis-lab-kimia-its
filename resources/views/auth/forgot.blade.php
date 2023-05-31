@extends('layouts.app')

@section('title', 'Lupa Kata Sandi')

@section('content')
        <div class="bg-white py-6 rounded shadow-md w-full md:w-7/12 lg:w-6/12 xl:w-3/12 m-5">
            <div class="flex flex-col justify-center items-center text-center mb-3">
                <img src="img/logo.png" alt="logo" class="mt-10">
                <div class="w-10/12">
                    <h1 class="font-semibold text-2xl mt-10">LUPA KATA SANDI</h1>
                    <p class="w-full mt-2">Masukkan email yang telah terdaftar</p>
                    <form action="" method="POST">
                        @csrf
                        <div class="flex mt-4 items-start flex-col">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" name="email" id="email" required autofocus placeholder="Masukkan Email" class="h-10 w-full border border-gray-900 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 duration-500">
                        </div>
                        <div class="flex mt-6 mb-8 items-start flex-col">
                            <button type="submit" class="h-10 w w-full bg-green-600 hover:bg-green-800 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500 ">Send Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
