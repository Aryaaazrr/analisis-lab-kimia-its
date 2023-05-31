@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
    <div class="bg-white py-6 rounded shadow-md w-full md:w-7/12 lg:w-6/12 xl:w-3/12 m-5">
        <div class="flex flex-col justify-center items-center text-center mb-3">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="mt-10">
            <div class="w-10/12">
                <h1 class="font-semibold text-2xl mt-10">VERIFIKASI EMAIL</h1>
                <div class="font-normal p-2 text-green-950 mt-3 bg-green-300 rounded-md">
                    <p class="w-full">Email Verifikasi berhasil dikirim ke email anda. silahkan cek inbox email anda.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
