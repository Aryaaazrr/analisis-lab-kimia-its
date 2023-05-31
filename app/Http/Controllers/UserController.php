<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $currentStep = 1;
        // return view('user.layanan', compact('currentStep'));
    }
    public function riwayat(Request $request)
    {
        return view('user.riwayat');
    }
    public function pengaturan(Request $request)
    {
        return view('user.pengaturan');
    }

    public $currentStep = 1;

    public function nextStep(Request $request, $currentStep)
    {
        if ($currentStep == 1) {
            // Proses validasi langkah 1

            // Jika validasi gagal, kembalikan response dengan error

            // Jika validasi berhasil, lanjutkan ke langkah berikutnya
            $currentStep = 2;
        } elseif ($currentStep == 2) {
            // Proses validasi langkah 2

            // Jika validasi gagal, kembalikan response dengan error

            // Jika validasi berhasil, lanjutkan ke langkah berikutnya
            $currentStep = 3;
        }
    }

    public function previousStep($currentStep)
    {
        $currentStep--;

        return redirect()->route('layanan-previous', compact('currentStep'));
    }
}
