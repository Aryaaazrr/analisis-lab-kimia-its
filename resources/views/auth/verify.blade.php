@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
    <div class="bg-white py-6 rounded shadow-md w-full md:w-7/12 lg:w-6/12 xl:w-3/12 m-5">
        <div class="flex flex-col justify-center items-center text-center mb-3">
            <img src="img/logo.png" alt="logo" class="mt-10">
            <div class="w-10/12">
                <h1 class="font-semibold text-2xl mt-10">VERIFIKASI EMAIL</h1>
                <p class="w-full mt-2">Silakan klik tautan berikut untuk verifikasi email Anda</p>

                <div class="flex items-center justify-center mt-6 mb-8">
                    <a href="/verify"
                        class="flex justify-center items-center h-10 w-full bg-green-600 hover:bg-green-800 rounded text-white focus:outline-none focus:ring-2 focus:ring-green-600 duration-500 ">Verifikasi
                        Email</a>
                </div>
            </div>
        </div>
    </div>
@endsection
