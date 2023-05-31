<?php

namespace App\Http\Controllers;

use App\Mail\KwitansiPembayaranBelumLunas;
use App\Mail\KwitansiPembayaranDitolak;
use App\Mail\KwitansiPembayaranSudahDibayar;
use App\Mail\UpdateStatusTransaksiDiterima;
use App\Mail\UpdateStatusTransaksiDitolak;
use App\Mail\UpdateStatusTransaksiMenunggu;
use App\Mail\UpdateStatusTransaksiProses;
use App\Mail\UpdateStatusTransaksiSelesai;
use App\Models\DetailTransaksi;
use App\Models\Layanan;
use App\Models\PembayaranTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        foreach ($transaksi as $value) {
            if ($value->status_transaksi != 'Selesai') {
                // cek ketika user melakukan pembayaran
                // $pembayaran = PembayaranTransaksi::where('transaksi_id', $value->id)->first();
                // $cek_pembayaran = $pembayaran->transaksi_id;

                $tanggal_dibuat = Carbon::parse($value->created_at)->format('d-m-Y');
                $tanggal_mulai = Carbon::parse($value->start_at)->format('d-m-Y');
                return view('admin.transaksi', ['transaksi' => $transaksi, 'tanggal_dibuat' => $tanggal_dibuat, 'tanggal_mulai' => $tanggal_mulai]);
            }
            // $pembayaran = PembayaranTransaksi::where('transaksi_id', $value->id)->first();
            // $cek_pembayaran = $pembayaran->transaksi_id;

            $tanggal_dibuat = Carbon::parse($value->created_at)->format('d-m-Y');
            $tanggal_mulai = Carbon::parse($value->start_at)->format('d-m-Y');
            $tanggal_selesai = Carbon::parse($value->status_selesai_at)->format('d-m-Y');
            return view('admin.transaksi', ['transaksi' => $transaksi, 'tanggal_dibuat' => $tanggal_dibuat, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);
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
        // $pembayaran = PembayaranTransaksi::where();
        $pembayaran = DB::table('transaksi')
            ->join('pembayaran_transaksi', 'transaksi.id', '=', 'pembayaran_transaksi.transaksi_id')
            // ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->where('transaksi.id', $id)->first();
        // dd($pembayaran);
        $cust = User::find($pembayaran->users_id);
        // $cekPelunasan = $pembayaran->jumlah_bayar;

        if ($pembayaran->status_pembayaran == 'Sudah Dibayar') {
            $status_pembayaran = ['Sudah Dibayar'];
            return view('user.content.transaksi-pembayaran', ['pembayaran' => $pembayaran, 'cust' => $cust, 'status_pembayaran' => $status_pembayaran]);
        } elseif ($pembayaran->status_pembayaran == 'Belum Lunas') {
            $status_pembayaran = ['Sudah Dibayar'];
            return view('user.content.transaksi-pembayaran', ['pembayaran' => $pembayaran, 'cust' => $cust, 'status_pembayaran' => $status_pembayaran]);
        } elseif ($pembayaran->status_pembayaran == 'Menunggu Konfirmasi') {
            $status_pembayaran = ['Belum Lunas', 'Sudah Dibayar', 'Ditolak'];
            return view('user.content.transaksi-pembayaran', ['pembayaran' => $pembayaran, 'cust' => $cust, 'status_pembayaran' => $status_pembayaran]);
        } else {
            $status_pembayaran = ['Menunggu Konfirmasi', 'Sudah Dibayar', 'Belum Lunas'];
            return view('user.content.transaksi-pembayaran', ['pembayaran' => $pembayaran, 'cust' => $cust, 'status_pembayaran' => $status_pembayaran]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $cust = User::find($transaksi->users_id);
        $transaksi = DB::table('transaksi')
            ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->where('transaksi.id', $id)->first();
        $cust = User::find($transaksi->users_id);
        $layanan = Layanan::find($transaksi->layanan_id);
        $detail_transaksi = DetailTransaksi::where('transaksi_id', $transaksi->id)->get();
        $pembayaran = PembayaranTransaksi::where('transaksi_id', $id)->first();

        // if ($pembayaran) {
        if ($transaksi->status_transaksi == 'Diterima') {
            $status_transaksi = ['Proses', 'Selesai'];
            return view('user.content.transaksi-detail', ['transaksi' => $transaksi, 'cust' => $cust, 'layanan' => $layanan, 'status_transaksi' => $status_transaksi, 'detail_transaksi' => $detail_transaksi, 'pembayaran' => $pembayaran]);
        } elseif ($transaksi->status_transaksi == 'Proses') {
            $status_transaksi = ['Selesai'];
            return view('user.content.transaksi-detail', ['transaksi' => $transaksi, 'cust' => $cust, 'layanan' => $layanan, 'status_transaksi' => $status_transaksi, 'detail_transaksi' => $detail_transaksi, 'pembayaran' => $pembayaran]);
        } elseif ($transaksi->status_transaksi == 'Selesai') {
            $status_transaksi = ['Selesai'];
            return view('user.content.transaksi-detail', ['transaksi' => $transaksi, 'cust' => $cust, 'layanan' => $layanan, 'status_transaksi' => $status_transaksi, 'detail_transaksi' => $detail_transaksi, 'pembayaran' => $pembayaran]);
        } elseif ($transaksi->status_transaksi == 'Ditolak') {
            $status_transaksi = ['Menunggu Konfirmasi', 'Diterima', 'Proses', 'Selesai'];
            return view('user.content.transaksi-detail', ['transaksi' => $transaksi, 'cust' => $cust, 'layanan' => $layanan, 'status_transaksi' => $status_transaksi, 'detail_transaksi' => $detail_transaksi, 'pembayaran' => $pembayaran]);
        } else {
            $status_transaksi = ['Diterima', 'Proses', 'Selesai', 'Ditolak'];
            return view('user.content.transaksi-detail', ['transaksi' => $transaksi, 'cust' => $cust, 'layanan' => $layanan, 'status_transaksi' => $status_transaksi, 'detail_transaksi' => $detail_transaksi, 'pembayaran' => $pembayaran]);
        }
        // } 
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
        // dd($request->all());
        $status_saat_ini = Transaksi::select('status_transaksi')->where('id', $id)->first();
        $cekUser = Transaksi::select('users_id')->where('id', $id)->first();
        $user = User::where('id', $cekUser->users_id)->first();
        // dd($user->email);

        if ($request->status_transaksi == $status_saat_ini->status_transaksi) {
            // dd('sama');
            return redirect()->back()->withErrors('Status tidak boleh sama dengan saat ini');
        }
        
        // $status_saat_ini = PembayaranTransaksi::select('status_pembayaran')->where('transaksi_id', $id)->first();
        // if ($status_saat_ini->status_pembayaran == 'Menunggu Konfirmasi') {
        //     return redirect()->back()->withErrors('Status tidak boleh sama dengan saat ini');
        // }
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');

        if ($request->status_transaksi == 'Diterima') {

            $transaksi = Transaksi::find($id);
            $transaksi->status_transaksi = $request->status_transaksi;
            $transaksi->status_diterima_at = Carbon::now($jakartaTimezone)->format('Y-m-d H:i:s');
            $transaksi->save();

            $idTransaksi = $transaksi->id;

            $pembayaran = new PembayaranTransaksi;
            $pembayaran->transaksi_id = $idTransaksi;
            $pembayaran->save();

            if (Mail::to($user->email)->send(new UpdateStatusTransaksiDiterima($transaksi))) {
                return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
            }
        } elseif ($request->status_transaksi == 'Proses') {

            $transaksi = Transaksi::find($id);
            $transaksi->status_transaksi = $request->status_transaksi;
            $transaksi->status_proses_at = Carbon::now($jakartaTimezone)->format('Y-m-d H:i:s');
            $transaksi->save();

            if (Mail::to($user->email)->send(new UpdateStatusTransaksiProses($transaksi))) {
                return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
            }
            // return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
        } elseif ($request->status_transaksi == 'Selesai') {

            $validator = Validator::make($request->all(), [
                'hasil_analisis' => 'required',
                'sertifikat' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $file_path_analisis = 'uploads/hasil_analisis';
            $file_path_sertifikat = 'uploads/sertifikat';

            // ubah nama hasil analisis
            $file_analisis = $request->file('hasil_analisis');
            $file_sertif = $request->file('sertifikat');

            // dd($file, $filesertif);
            $transaksi = Transaksi::find($id);
            $kodeTransaksi = $transaksi->kode_transaksi;

            $ext_analisis = $file_analisis->getClientOriginalExtension();
            $ext_sertif = $file_sertif->getClientOriginalExtension();

            $filename_analisis = 'Hasil_Analisis' . '_' . $kodeTransaksi . '.' . $ext_analisis;
            $filename_sertifikat = 'Sertifikat' . '_' . $kodeTransaksi . '.' . $ext_sertif;

            $file_analisis->move($file_path_analisis, $filename_analisis);
            $file_sertif->move($file_path_sertifikat, $filename_sertifikat);
            // $path_analaisis = $file_analisis->storeAs('uploads/hasil_analisis', $filename_analisis, 'public');
            // $path_sertifikat = $file_sertif->storeAs('uploads/sertifikat', $filename_sertifikat, 'public');

            $transaksi->status_transaksi = $request->status_transaksi;
            $transaksi->hasil_analisis = $filename_analisis;
            $transaksi->sertifikat = $filename_sertifikat;
            $transaksi->status_selesai_at = Carbon::now($jakartaTimezone)->format('Y-m-d H:i:s');
            $transaksi->save();

            if (Mail::to($user->email)->send(new UpdateStatusTransaksiSelesai($transaksi))) {
                return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
            }
        } elseif ($request->status_transaksi == 'Ditolak') {

            $transaksi = Transaksi::find($id);
            $transaksi->status_transaksi = $request->status_transaksi;
            $transaksi->save();

            if (Mail::to($user->email)->send(new UpdateStatusTransaksiDitolak($transaksi))) {
                return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
            }
            // return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
        } else {
            $transaksi = Transaksi::find($id);
            $transaksi->status_transaksi = $request->status_transaksi;
            $transaksi->save();

            if (Mail::to($user->email)->send(new UpdateStatusTransaksiMenunggu($transaksi))) {
                return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
            }
            // return redirect('admin/transaksi')->with('success', 'Status Transaksi Berhasil Diperbarui!');
        }
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

    public function updateStatusPembayaran(Request $request, $id)
    {
        $status_saat_ini = PembayaranTransaksi::select('status_pembayaran', 'transaksi_id')->where('id', $id)->first();
        // dd($status_saat_ini);
        $cekUser = Transaksi::select('users_id')->where('id', $status_saat_ini->transaksi_id)->first();
        $user = User::where('id', $cekUser->users_id)->first();

        if ($request->status_pembayaran == $status_saat_ini->status_pembayaran) {
            // dd('sama');
            return redirect()->back()->withErrors('Status tidak boleh sama dengan saat ini');
        }

        if ($request->status_pembayaran == 'Sudah Dibayar') {

            $transaksi = Transaksi::find($status_saat_ini->transaksi_id);

            if ($transaksi) {
                $pembayaran = $transaksi->pembayaranTransaksi()->first();

                if ($pembayaran) {
                    $pembayaran->status_pembayaran = $request->status_pembayaran;
                    $pembayaran->save();

                    if ($pembayaran) {
                        if (Mail::to($user->email)->send(new KwitansiPembayaranSudahDibayar($pembayaran))) {
                            return redirect('admin/transaksi')->with('success', 'Status Pembayaran Berhasil Diperbarui!');
                        } else {
                            // Penanganan jika email gagal dikirim
                            return redirect('admin/transaksi')->with('error', 'Gagal mengirim email.');
                        }
                    } else {
                        // Penanganan jika data pembayaran tidak ditemukan
                        return redirect('admin/transaksi')->with('error', 'Data pembayaran tidak ditemukan.');
                    }
                }
            } else {
                // Penanganan jika data transaksi tidak ditemukan
                return redirect('admin/transaksi')->with('error', 'Data transaksi tidak ditemukan.');
            }
        } elseif ($request->status_pembayaran == 'Belum Lunas') {

            $transaksi = Transaksi::find($status_saat_ini->transaksi_id);

            if ($transaksi) {
                $pembayaran = $transaksi->pembayaranTransaksi()->first();

                if ($pembayaran) {
                    $pembayaran->status_pembayaran = $request->status_pembayaran;
                    $pembayaran->save();

                    if ($pembayaran) {
                        if (Mail::to($user->email)->send(new KwitansiPembayaranBelumLunas($pembayaran))) {
                            return redirect('admin/transaksi')->with('success', 'Status Pembayaran Berhasil Diperbarui!');
                        } else {
                            // Penanganan jika email gagal dikirim
                            return redirect('admin/transaksi')->with('error', 'Gagal mengirim email.');
                        }
                    } else {
                        // Penanganan jika data pembayaran tidak ditemukan
                        return redirect('admin/transaksi')->with('error', 'Data pembayaran tidak ditemukan.');
                    }
                }
            } else {
                // Penanganan jika data transaksi tidak ditemukan
                return redirect('admin/transaksi')->with('error', 'Data transaksi tidak ditemukan.');
            }
        } elseif ($request->status_pembayaran == 'Ditolak') {

            $transaksi = Transaksi::find($status_saat_ini->transaksi_id);

            if ($transaksi) {
                $pembayaran = $transaksi->pembayaranTransaksi()->first();

                if ($pembayaran) {
                    $pembayaran->status_pembayaran = $request->status_pembayaran;
                    $pembayaran->save();

                    if ($pembayaran) {
                        if (Mail::to($user->email)->send(new KwitansiPembayaranDitolak($pembayaran))) {
                            return redirect('admin/transaksi')->with('success', 'Status Pembayaran Berhasil Diperbarui!');
                        } else {
                            // Penanganan jika email gagal dikirim
                            return redirect('admin/transaksi')->with('error', 'Gagal mengirim email.');
                        }
                    } else {
                        // Penanganan jika data pembayaran tidak ditemukan
                        return redirect('admin/transaksi')->with('error', 'Data pembayaran tidak ditemukan.');
                    }
                }
            } else {
                // Penanganan jika data transaksi tidak ditemukan
                return redirect('admin/transaksi')->with('error', 'Data transaksi tidak ditemukan.');
            }
        } else {
            $transaksi = Transaksi::find($status_saat_ini->transaksi_id);

            if ($transaksi) {
                $pembayaran = $transaksi->pembayaranTransaksi()->first();

                if ($pembayaran) {
                    $pembayaran->status_pembayaran = $request->status_pembayaran;
                    $pembayaran->save();

                    return redirect('admin/transaksi')->with('success', 'Status Pembayaran Berhasil Diperbarui!');
                }
            } else {
                // Penanganan jika data transaksi tidak ditemukan
                return redirect('admin/transaksi')->with('error', 'Data transaksi tidak ditemukan.');
            }
        }
    }

    public function downloadBuktiBayar($id)
    {
        // Cari data pembayaran berdasarkan ID atau kriteria lainnya
        $pembayaran = PembayaranTransaksi::where('transaksi_id', $id)->first();

        if ($pembayaran->bukti_bayar != null) {
            // Ambil path atau lokasi file bukti pembayaran
            $file = $pembayaran->bukti_bayar;
            $path = 'uploads/bukti_bayar/' . $file;
            $filePath = public_path($path);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Customer belum melakukan pembayaran.');
        }
    }

    public function terima($id)
    {
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');

        $transaksi = Transaksi::find($id);
        $transaksi->status_transaksi = 'Diterima';
        $transaksi->status_diterima_at = Carbon::now($jakartaTimezone)->format('Y-m-d H:i:s');
        $transaksi->save();
        return response()->json(['success' => true]);
    }
}
