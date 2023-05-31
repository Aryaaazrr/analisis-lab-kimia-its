<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\JenisCustomer;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahSampel = DetailTransaksi::count();
        $customer = User::whereRoleId(2)->count();
        $status_proses = Transaksi::where('status_transaksi', '=', 'Proses')
            ->count();

        if ($request->has('date')) {
            $date = $request->date;
            $startDate = Carbon::parse($date)->startOfDay();
            $endDate = Carbon::parse($date)->endOfDay();

            $search = Transaksi::whereBetween('created_at', [$startDate, $endDate])->get();
            $detail = DetailTransaksi::whereIn('transaksi_id', $search->pluck('transaksi_id'))->get();

            return view('admin.beranda', [
                'jumlahSampel' => $jumlahSampel,
                'customer' => $customer,
                'status_proses' => $status_proses,
                'search' => $search,
                'detail' => $detail
            ]);
        }
        return view('admin.beranda', [
            'jumlahSampel' => $jumlahSampel,
            'customer' => $customer,
            'status_proses' => $status_proses
        ]);
    }

    public function show(Request $request)
    {
        // return view('admin.beranda', ['search' => $search]);
        // dd($search);
    }

    public function pengaturan(Request $request)
    {
        return view('admin.pengaturan');
        // $request->session()->flush();
    }
}
