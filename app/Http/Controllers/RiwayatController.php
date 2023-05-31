<?php

namespace App\Http\Controllers;

use App\Models\PembayaranTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Transaksi::where('users_id', Auth::user()->id)->get();
        foreach ($riwayat as $value) {
            if ($value->status_transaksi != 'Selesai') {
                $pembayaran = PembayaranTransaksi::where('transaksi_id', $value->id)->first();
                $cek_pembayaran = $pembayaran->transaksi_id;

                $tanggal_dibuat = Carbon::parse($value->created_at)->format('d-m-Y');
                $tanggal_mulai = Carbon::parse($value->start_at)->format('d-m-Y');
                return view('user.riwayat', ['riwayat' => $riwayat, 'tanggal_dibuat' => $tanggal_dibuat, 'tanggal_mulai' => $tanggal_mulai, 'cekPembayaran' => $cek_pembayaran]);
            }
            $pembayaran = PembayaranTransaksi::where('transaksi_id', $value->id)->first();
            $cek_pembayaran = $pembayaran->transaksi_id;

            $tanggal_mulai = Carbon::parse($value->start_at)->format('d-m-Y');
            $tanggal_dibuat = Carbon::parse($value->created_at)->format('d-m-Y');
            $tanggal_selesai = Carbon::parse($value->status_selesai_at)->format('d-m-Y');
            return view('user.riwayat', ['riwayat' => $riwayat, 'tanggal_dibuat' => $tanggal_dibuat, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai, 'cekPembayaran' => $cek_pembayaran]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Transaksi::find($id);
        return view('user.content.detail-riwayat', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Transaksi::find($id);
        $pembayaran = $detail->pembayaranTransaksi()->first();
        // dd($pembayaran, $detail);
        return view('user.content.pembayaran-riwayat', ['detail' => $detail, 'pembayaran' => $pembayaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $detail = Transaksi::find($id);
        $cekStatusPembayaran = PembayaranTransaksi::where('transaksi_id', $id)->first();

        $jumlah_bayar = $cekStatusPembayaran->jumlah_bayar;
        $total = $detail->grand_total_transaksi;
        $pelunasan = $total - $jumlah_bayar;
        
        $validator = Validator::make($request->all(), [
            'jenis_pembayaran' => 'required',
            'jumlah_bayar' => 'required|numeric|min:' . $pelunasan . '|regex:/^\d+(\.\d{1,2})?$/|max: ' . $pelunasan,
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $file_path = 'uploads/bukti_bayar';
        
        if ($request->file('bukti_bayar')) {
            $photo = $request->file('bukti_bayar');
            $ext = $photo->getClientOriginalExtension();
            $filename = rand(100000, 1001238912) . "." . $ext;
            $photo->move($file_path, $filename);
            $request['bukti_bayar'] = $filename;
        }
        
        $total_keseluruhan = $cekStatusPembayaran->jumlah_bayar + $request->jumlah_bayar;
        
        $new = PembayaranTransaksi::where('transaksi_id', $id)
            ->update([
                'pembayaran' => 'Lunas',
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'jumlah_bayar' => $total_keseluruhan,
                'bukti_bayar' => $filename,
            ]);

        return redirect('riwayat')->with('success', 'Pelunasan Berhasil Terkirim!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hasil($id)
    {
        $detail = Transaksi::find($id);
        $pembayaran = $detail->pembayaranTransaksi()->first();
        $cekStatusPembayaran = PembayaranTransaksi::where('transaksi_id', $id)->first();

        $belumLunas = $cekStatusPembayaran->status_pembayaran;
        $jenis_pembayaran = ['Tunai', 'Non-Tunai'];

        $jumlah_bayar = $cekStatusPembayaran->jumlah_bayar;
        $total = $detail->grand_total_transaksi;
        $pelunasan = $total - $jumlah_bayar;
        // dd($pelunasan);
        if ($pelunasan == 0 && $belumLunas == 'Belum Lunas') {
            return view('user.content.pembayaran-riwayat', ['detail' => $detail, 'pembayaran' => $pembayaran, 'jenis_pembayaran' => $jenis_pembayaran, 'total_pelunasan' => $pelunasan]);
        } else {
            if ($belumLunas == 'Sudah Dibayar') {
                return view('user.content.hasil-riwayat', compact('detail'));
            }
            return view('user.content.pelunasan', ['detail' => $detail, 'pembayaran' => $pembayaran, 'jenis_pembayaran' => $jenis_pembayaran, 'total_pelunasan' => $pelunasan]);
        }

    }

    public function downloadHasilAnalisis($id)
    {
        // Cari data transaksi berdasarkan ID atau kriteria lainnya
        $transaksi = Transaksi::where('id', $id)->first();

        // Ambil path atau lokasi file bukti transaksi
        $file = $transaksi->hasil_analisis;
        $path = 'uploads/hasil_analisis/' . $file;
        $filePath = public_path($path);

        try {
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh file.');
        }
    }

    public function downloadSertifikat($id)
    {
        // Cari data transaksi berdasarkan ID atau kriteria lainnya
        $transaksi = Transaksi::where('id', $id)->first();

        // Ambil path atau lokasi file bukti transaksi
        $file = $transaksi->sertifikat;
        $path = 'uploads/sertifikat/' . $file;
        $filePath = public_path($path);

        try {
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh file.');
        }
    }
}
