<?php

namespace App\Http\Controllers;

use stdClass;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\JenisCustomer;
use App\Models\DetailTransaksi;
use App\Models\JenisHargaLayanan;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;
use App\Models\PembayaranTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PgSql\Lob;
use RealRashid\SweetAlert\Facades\Alert;


class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_customer = Auth::user()->jenis_customer;
        $layanananalisa = Layanan::where('jenis_layanan', 'Analisa')->get();
        $layanansewa = Layanan::where('jenis_layanan', 'Sewa')->get();
        $idUser = Auth::user()->id;

        $cekKeranjang = Keranjang::where('users_id', $idUser)->first();
        if ($cekKeranjang == null) {
            return view('user.layanan', ['layanan_analisa' => $layanananalisa, 'layanan_sewa' => $layanansewa, 'jenis_customer' => $jenis_customer]);
        } else {
            $cekKeranjang = Keranjang::where('users_id', $idUser)->delete();
            return view('user.layanan', ['layanan_analisa' => $layanananalisa, 'layanan_sewa' => $layanansewa, 'jenis_customer' => $jenis_customer]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jenis_customer = Auth::user()->jenis_customer;
        $layanan = Layanan::find($id);
        $idUser = Auth::user()->id;

        $cekKeranjang = Keranjang::where('users_id', $idUser)->first();

        if ($cekKeranjang == null) {
            Keranjang::create([
                'users_id' => $idUser,
                'layanan_id' => $layanan->id,
            ]);
        }

        $dataSampel = session('dataSampel');
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $dateNow = Carbon::now($jakartaTimezone)->format('Ymd');
        $lastTransaction = Transaksi::latest('kode_transaksi')->first();

        $nextNumber = 1;
        if ($lastTransaction) {
            $lastTransactionNumber = substr($lastTransaction->kode_transaksi, -4);
            if (substr($lastTransaction->kode_transaksi, 3, 8) == $dateNow) {
                $nextNumber = intval($lastTransactionNumber) + 1;
            }
        }

        $transaction = new Transaksi;
        $transaction = 'TLK' . $dateNow . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $jumlahSampel = 1;
        // $totalBayar = $

        if ($layanan->jenis_layanan == 'Sewa') {
            if ($jenis_customer == 'Internal Kimia') {
                $harga = $layanan->harga_internal_kimia;
                $total_bayar = $harga * $jumlahSampel;
                return view('user.content.cek-detail', ['pilihanLayanan' => $layanan, 'jenis_customer' => $jenis_customer, 'dataSampel' => $dataSampel, 'id_transaksi' => $transaction, 'jumlahSampel' => $jumlahSampel, 'total_bayar' => $total_bayar]);
            } elseif ($jenis_customer == 'Internal ITS') {
                $harga = $layanan->harga_internal_its;
                $total_bayar = $harga * $jumlahSampel;
                return view('user.content.cek-detail', ['pilihanLayanan' => $layanan, 'jenis_customer' => $jenis_customer, 'dataSampel' => $dataSampel, 'id_transaksi' => $transaction, 'jumlahSampel' => $jumlahSampel, 'total_bayar' => $total_bayar]);
            } else {
                $harga = $layanan->harga_umum;
                $total_bayar = $harga * $jumlahSampel;
                return view('user.content.cek-detail', ['pilihanLayanan' => $layanan, 'jenis_customer' => $jenis_customer, 'dataSampel' => $dataSampel, 'id_transaksi' => $transaction, 'jumlahSampel' => $jumlahSampel, 'total_bayar' => $total_bayar]);
            }
        }
        return view('user.content.step2', ['layanan' => $layanan, 'jenis_customer' => $jenis_customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $validator = Validator::make($request->all(), [
            'kode_transaksi' => 'required|unique:transaksi',
            'total_biaya' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'jadwal' => 'required|date|after_or_equal:' . Carbon::today($jakartaTimezone)->format('Y-m-d'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cek_keranjang = Keranjang::where('users_id', Auth::user()->id)->first();
        $layanan_sewa = Layanan::where('id', $cek_keranjang->layanan_id)->first();

        
        if ($layanan_sewa->jenis_layanan == 'Sewa') {
            // input transaksi
            $transaksi = Transaksi::create([
                'kode_transaksi' => $request->kode_transaksi,
                'users_id' => $cek_keranjang->users_id,
                'grand_total_transaksi' => $request->total_biaya,
                'catatan' => $request->catatan,
                'start_at' => $request->jadwal
            ]);
            // inisiasi id
            $idTransaksi = $transaksi->id;
            
            $detail_transaksi = DetailTransaksi::create([
                'transaksi_id' => $idTransaksi,
                'layanan_id' => $cek_keranjang->layanan_id,
                'jumlah' => $request->jumlah_sampel,
                'subtotal' => $request->total_biaya,
            ]);
            
            if ($transaksi && $detail_transaksi) {
                Keranjang::where('users_id', Auth::user()->id)->delete();
                return redirect('riwayat')->with('success', 'Transaksi Berhasil!');;
            }
        } else {
            // tampung data sampel
            $data = $request->all();

            // Mendapatkan jumlah sampel
            $jumlahSampel = $data['jumlah_sampel'];

            if ($jumlahSampel == 0) {
                return redirect('layanan')->with('error', 'Sampel anda masih kosong!');
            }

            // Mendapatkan data sampel
            $sampelData = [];
            for ($i = 0; $i < $jumlahSampel; $i++) {
                $sampelData[] = [
                    'nama_sampel' => $data['nama_sampel_' . $i],
                    'jumlah' => $data['jumlah_' . $i],
                    'jenis_sampel' => $data['jenis_sampel_' . $i],
                    'wujud_sampel' => $data['wujud_sampel_' . $i],
                ];
            }

            // input transaksi
            $transaksi = Transaksi::create([
                'kode_transaksi' => $request->kode_transaksi,
                'users_id' => $cek_keranjang->users_id,
                'grand_total_transaksi' => $request->total_biaya,
                'catatan' => $request->catatan,
                'start_at' => $request->jadwal
            ]);
            // inisiasi id
            $idTransaksi = $transaksi->id;


            foreach ($sampelData as $sampel) {
                // input detail transaksi
                $detail_transaksi = DetailTransaksi::create([
                    'transaksi_id' => $idTransaksi,
                    'layanan_id' => $cek_keranjang->layanan_id,
                    'nama_sampel' => $sampel['nama_sampel'],
                    'jenis_sampel' => $sampel['jenis_sampel'],
                    'wujud_sampel' => $sampel['wujud_sampel'],
                    'jumlah' => $sampel['jumlah'],
                    'subtotal' => $request->total_biaya,
                ]);
            }

            if ($transaksi && $detail_transaksi) {
                Keranjang::where('users_id', Auth::user()->id)->delete();
                return redirect('riwayat')->with('success', 'Transaksi Berhasil!');;
            }
        }

        // return redirect('riwayat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        $dataSampel = session('dataSampel');
        $jumlahSampel = count($dataSampel);
        // dd($dataSampel);
        $jenis_customer = Auth::user()->jenis_customer;
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $dateNow = Carbon::now($jakartaTimezone)->format('Ymd');
        $lastTransaction = Transaksi::latest('kode_transaksi')->first();

        $nextNumber = 1;
        if ($lastTransaction) {
            $lastTransactionNumber = substr($lastTransaction->kode_transaksi, -4);
            if (substr($lastTransaction->kode_transaksi, 3, 8) == $dateNow) {
                $nextNumber = intval($lastTransactionNumber) + 1;
            }
        }

        $transaction = new Transaksi;
        $transaction = 'TLK' . $dateNow . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $keranjang = Keranjang::select('layanan_id')->where('users_id', Auth::user()->id)->first();
        $pilihanLayanan = Layanan::where('id', $keranjang->layanan_id)->first();

        if ($jenis_customer == 'Internal Kimia') {
            $harga = $pilihanLayanan->harga_internal_kimia;
            $total_bayar = $harga * $jumlahSampel;
            return view('user.content.cek-detail', ['id_transaksi' => $transaction, 'pilihanLayanan' => $pilihanLayanan, 'jenis_customer' => $jenis_customer, 'total_bayar' => $total_bayar, 'dataSampel' => $dataSampel, 'jumlahSampel' => $jumlahSampel]);
        } elseif ($jenis_customer == 'Internal ITS') {
            $harga = $pilihanLayanan->harga_internal_its;
            $total_bayar = $harga * $jumlahSampel;
            return view('user.content.cek-detail', ['id_transaksi' => $transaction, 'pilihanLayanan' => $pilihanLayanan, 'jenis_customer' => $jenis_customer, 'total_bayar' => $total_bayar, 'dataSampel' => $dataSampel, 'jumlahSampel' => $jumlahSampel]);
        } else {
            $harga = $pilihanLayanan->harga_umum;
            $total_bayar = $harga * $jumlahSampel;
            return view('user.content.cek-detail', ['id_transaksi' => $transaction, 'pilihanLayanan' => $pilihanLayanan, 'jenis_customer' => $jenis_customer, 'total_bayar' => $total_bayar, 'dataSampel' => $dataSampel, 'jumlahSampel' => $jumlahSampel]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cekPembayaran = PembayaranTransaksi::select('status_pembayaran')->where('transaksi_id', $id)->first();
        // dd($cekPembayaran->status_pembayaran);
        if ($cekPembayaran->status_pembayaran == 'Belum Dibayar') {

            $jenis_customer = Auth::user()->jenis_customer;
            $jenis_pembayaran = ['Tunai', 'Non-Tunai'];
            $pembayaran = ['DP', 'Lunas'];
            $transaksi = Transaksi::find($id);
            $pembayaran_transaksi = PembayaranTransaksi::where('transaksi_id', $id)->first();
            return view('user.content.pembayaran', ['jenis_customer' => $jenis_customer, 'jenis_pembayaran' => $jenis_pembayaran, 'pembayaran' => $pembayaran, 'transaksi' => $transaksi, 'pembayaran_transaksi' => $pembayaran_transaksi]);
        } elseif ($cekPembayaran->status_pembayaran == 'Menunggu Konfirmasi') {
            $detail = Transaksi::find($id);
            $pembayaran = $detail->pembayaranTransaksi()->first();
            // dd($pembayaran, $detail);
            return view('user.content.pembayaran-riwayat', ['detail' => $detail, 'pembayaran' => $pembayaran]);
            // return view('user.content.pembayaran-riwayat', ['jenis_customer' => $jenis_customer, 'jenis_pembayaran' => $jenis_pembayaran, 'pembayaran' => $pembayaran, 'transaksi' => $transaksi, 'pembayaran_transaksi' => $pembayaran_transaksi]);
            // return view('user.content.pembayaran-riwayat', ['jenis_customer' => $jenis_customer, 'transaksi' => $transaksi, 'pembayaran_transaksi' => $pembayaran_transaksi]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if ($request->pembayaran == 'DP') {

            $validator = Validator::make($request->all(), [
                'pembayaran' => 'required',
                'jenis_pembayaran' => 'required',
                'jumlah_bayar' => 'required|numeric|min:100000|regex:/^\d+(\.\d{1,2})?$/|max: ' . $transaksi->grand_total_transaksi,
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

            // dd($request->jumlah_bayar == $transaksi->grand_total_transaksi);
            if ($request->jumlah_bayar != $transaksi->grand_total_transaksi = true) {

                $new = PembayaranTransaksi::where('transaksi_id', $id)
                    ->update([
                        'pembayaran' => 'Lunas',
                        'jenis_pembayaran' => $request->jenis_pembayaran,
                        'jumlah_bayar' => $request->jumlah_bayar,
                        'bukti_bayar' => $filename,
                        'status_pembayaran' => 'Menunggu Konfirmasi',
                    ]);
                return redirect('riwayat')->with('success', 'Pembayaran Berhasil Terkirim!');
            } else {
                $new = PembayaranTransaksi::where('transaksi_id', $id)
                    ->update([
                        'pembayaran' => $request->pembayaran,
                        'jenis_pembayaran' => $request->jenis_pembayaran,
                        'jumlah_bayar' => $request->jumlah_bayar,
                        'bukti_bayar' => $filename,
                        'status_pembayaran' => 'Menunggu Konfirmasi',
                    ]);

                return redirect('riwayat')->with('success', 'Pembayaran Berhasil Terkirim!');
            }
        } else {
            $validator = Validator::make($request->all(), [
                'pembayaran' => 'required',
                'jenis_pembayaran' => 'required',
                'jumlah_bayar' => 'required|numeric|min:100000|regex:/^\d+(\.\d{1,2})?$/|max: ' . $transaksi->grand_total_transaksi,
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

            $new = PembayaranTransaksi::where('transaksi_id', $id)
                ->update([
                    'pembayaran' => $request->pembayaran,
                    'jenis_pembayaran' => $request->jenis_pembayaran,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'bukti_bayar' => $filename,
                    'status_pembayaran' => 'Menunggu Konfirmasi',
                ]);

            return redirect('riwayat')->with('success', 'Pembayaran Berhasil Terkirim!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        //
    }

    public function postStep1($id)
    {
        $jenis_customer = Auth::user()->jenis_customer;
        $layanan = Layanan::find($id);
        $idUser = Auth::user()->id;
        $jenis_sampel = ['Organik', 'Non-Organik'];
        $wujud_sampel = ['Padat', 'Cair', 'Gas'];

        $cekKeranjang = Keranjang::where('users_id', $idUser)->first();
        // dd($cekKeranjang);
        if ($cekKeranjang == null) {
            Keranjang::create([
                'users_id' => $idUser,
                'layanan_id' => $layanan->id,
            ]);

            // $title = 'Delete User!';
            // $text = "Are you sure you want to delete?";
            // confirmDelete($title, $text);
            // return view('users.index', compact('users'));
            // dd('memiliki pesanan yang belum terselesaikan');
            // return view('user.content.input-sampel', ['layanan' => $layanan, 'jenis_customer' => $jenis_customer]);
        }
        return view('user.content.input-sampel', ['layanan' => $layanan, 'jenis_customer' => $jenis_customer]);
    }

    public function inputSampel($id)
    {
        $pilihanLayanan = Layanan::find($id);
        $jenis_customer = Auth::user()->jenis_customer;
        $jenis_sampel = ['Organik', 'Non-Organik'];
        $wujud_sampel = ['Padat', 'Cair', 'Gas'];

        return view('user.content.step2', ['jenis_sampel' => $jenis_sampel, 'wujud_sampel' => $wujud_sampel, 'jenis_customer' => $jenis_customer, 'pilihanLayanan' => $pilihanLayanan]);
    }

    public function cek()
    {
        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $dateNow = Carbon::now($jakartaTimezone)->format('Ymd');
        $lastTransaction = Transaksi::latest('kode_transaksi')->first();

        $nextNumber = 1;
        if ($lastTransaction) {
            $lastTransactionNumber = substr($lastTransaction->kode_transaksi, -4);
            if (substr($lastTransaction->kode_transaksi, 3, 8) == $dateNow) {
                $nextNumber = intval($lastTransactionNumber) + 1;
            }
        }

        $transaction = new Transaksi;
        $transaction = 'TLK' . $dateNow . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return view('user.content.cek-detail', ['id_transaksi' => $transaction]);
        // return view('user.content.step2', ['jenis_sampel' => $jenis_sampel, 'wujud_sampel' => $wujud_sampel, 'jenis_customer' => $jenis_customer, 'pilihanLayanan' => $pilihanLayanan]);
        // dd($pilihanLayanan, $input_sampel);
    }

    public function step2()
    {
        $pilihanLayanan = session('pilihanLayanan');

        $input_sampel = session('input_sampel');
        dd($pilihanLayanan, $input_sampel);
        // $inputan = [$pilihanLayanan, $input_sampel];

        $pilihan = DB::table('layanan')
            ->select('*')
            ->whereIn('id', $pilihanLayanan)->get();


        $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $dateNow = Carbon::now($jakartaTimezone)->format('Ymd');
        $lastTransaction = Transaksi::latest('kode_transaksi')->first();

        $nextNumber = 1;
        if ($lastTransaction) {
            $lastTransactionNumber = substr($lastTransaction->kode_transaksi, -4);
            if (substr($lastTransaction->kode_transaksi, 3, 8) == $dateNow) {
                $nextNumber = intval($lastTransactionNumber) + 1;
            }
        }

        $transaction = new Transaksi;
        $transaction = 'TLK' . $dateNow . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        // $jenis_sampel = ['Organik', 'Non-Organik'];
        // $wujud_sampel = ['Padat', 'Cair', 'Gas'];
        return view('user.content.input-detail', ['pilihanLayanan' => $pilihan, 'input_sampel' => $input_sampel, 'id_transaksi' => $transaction]);
    }

    public function postStep2(Request $request)
    {
        $step1Data = session('step1Data');
        // dd($request->all());
        // dd($step1Data, $request->all());

        $validator = Validator::make($request->all(), [
            'kode_transaksi' => 'required',
            'nama_sampel' => 'required',
            'jenis_sampel' => 'required',
            'wujud_sampel' => 'required',
            'jumlah' => 'required|min:1',
            'jadwal' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        dd($request->all());
        // $jakartaTimezone = new DateTimeZone('Asia/Jakarta');
        $myDate = Carbon::now();

        $request['jadwal'] = $myDate->toDateString();

        session(['step2Data' => $request->all()]);

        // Lanjutkan ke langkah berikutnya
        return redirect()->route('layanan.step3');


        // // Simpan data di session untuk digunakan di langkah berikutnya
        // session(['step1Data' => $request->all()]);

        // // Lanjutkan ke langkah berikutnya
        // return redirect()->route('layanan.step2');
    }


    public function step3(Request $request)
    {
        $step1Data = session('step1Data');
        $step2Data = session('step2Data');
        $midle = array_merge($step1Data, $step2Data);



        $jenis_customer = Auth::user()->jenis_customer;

        if ($jenis_customer == 'Internal Kimia') {
            $harga = DB::table('layanan')->select('harga_internal_kimia')->whereIn('id', $request->all())->get();
        } elseif ($jenis_customer == 'Internal ITS') {
            $harga = DB::table('layanan')->select('harga_internal_its')->whereIn('id', $request->all())->get();
            // Simpan data di session untuk digunakan di langkah berikutnya
            session(['step1Data' => $request->all()]);

            // Lanjutkan ke langkah berikutnya
            return redirect()->route('layanan.step2');
        } else {
            $grand_total = DB::table('layanan')->select('harga_umum')->whereIn('id', $step1Data)->sum('harga_umum');


            // dd($data_harga_umum);
            // $jumlah = intval($step2Data['jumlah']);
            // $harga = intval($data_harga_umum);
            // $subtotal = $harga * $jumlah;

            // $data_harga_umum->each(function ($item) {
            //     $item->harga_umum = intval($item->harga_umum);
            //     // Ubah nilai properti 'harga_umum' menjadi integer
            //     dd($item->harga_umum);
            // });

            // foreach ($data_harga_umum as $item) {
            //     $item->harga_umum = intval($item->harga_umum);
            //     // $harga = 
            //     // dd($item->harga_umum);
            // }
            // $harga_umum = new stdClass;
            // $harga_umum->+ = (int) $data_harga_umum->harga_umum;


            // foreach ($data_harga_umum as $key) {
            //     $hasil = $key * $jumlah;
            // }


            // dd($data_harga_umum);
            // $harga = intval($harga);

            // // $harga[];

            // // $data = array_map('intval', $harga);


            // dd(intval($harga));
            // $total_biaya = $harga * $jumlah;
            // dd($total_biaya);
            $jenis_pembayaran = ['Tunai', 'Non-Tunai'];
            $jenis_customer = Auth::user()->jenis_customer;
            $status_pembayaran = ['Belum Dibayar', 'Menunggu Konfirmasi Admin', 'Sudah Dibayar', 'Belum Lunas', 'Ditolak'];
            return view('user.content.step3', ['jenis_pembayaran' => $jenis_pembayaran, 'jenis_customer' => $jenis_customer, 'status_pembayaran' => $status_pembayaran, 'total_biaya' => $grand_total]);
        }
    }

    public function postStep3(Request $request)
    {
        $step1Data = session('step1Data');
        $step2Data = session('step2Data');
        $final = array_merge($step1Data, $step2Data, $request->all());
        dd($final);
        $subtotal = DB::table('layanan')->selectRaw('group_concat(harga_umum) as Harga')
            ->whereIn('id', $step1Data)
            // ->groupBy('id')
            ->get();

        $grand_total = DB::table('layanan')->select('harga_umum')->whereIn('id', $step1Data)->sum('harga_umum');

        // dd($subtotal);
        foreach ($subtotal as $item) {
            $harga_umum = $item;
        }
        // dd($harga_umum, $final);
        // dd($final);

        if ($request->jenis_pembayaran == 'Non-Tunai') {
            $validatedData = $request->validate([
                'informasi_pembayaran' => 'required',
                'jumlah_bayar' => 'required',
                'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            if ($request->pembayaran == 'Lunas') {
                if ($request->jumlah_bayar != $request->total_biaya) {
                    dd('jumlah bayar harus sama dengan total biaya');
                } else {

                    // proses set data transaksi
                    $transaksi = new Transaksi;

                    $transaksi->kode_transaksi = $step2Data['kode_transaksi'];
                    $transaksi->users_id = Auth::user()->id;
                    $transaksi->grand_total_transaksi = $grand_total;
                    $transaksi->start_at = $step2Data['jadwal'];

                    $idTransaksi = $transaksi->id;
                    $transaksi->save();

                    // Simpan data detail transaksi
                    $detailTransaksi = new DetailTransaksi;

                    $detailTransaksi->transaksi_id = $idTransaksi;
                    $detailTransaksi->layanan_id = $step1Data;
                    $detailTransaksi->nama_sampel = $step2Data['nama_sampel'];
                    $detailTransaksi->jenis_sampel = $step2Data['jenis_sampel'];
                    $detailTransaksi->wujud_sampel = $step2Data['wujud_sampel'];
                    $detailTransaksi->jumlah = $step2Data['jumlah'];
                    $detailTransaksi->subtotal = $subtotal;

                    $detailTransaksi->save();

                    // if ($request->hasFile('bukti_bayar')) {
                    //     $bukti_bayar = $request->file('bukti_bayar')->store('bukti_bayar');
                    // }

                    // $request['bukti_bayar'] = $bukti_bayar;

                    // Simpan data detail transaksi
                    $pembayaranTransaksi = new PembayaranTransaksi;

                    $pembayaranTransaksi->transaksi_id = $idTransaksi;
                    $pembayaranTransaksi->pembayaran = $request->pembayaran;
                    $pembayaranTransaksi->jenis_pembayaran = $request->jenis_pembayaran;
                    $pembayaranTransaksi->jumlah_bayar = $request->jumlah_bayar;
                    $pembayaranTransaksi->jumlah_bayar = $request->bukti_bayar;
                    $pembayaranTransaksi->status_pembayaran = 'Menunggu Konfirmasi Admin';

                    $pembayaranTransaksi->save();

                    return redirect()->route('layanan.step4');
                }
            } else {
                $dp = $request->total_biaya / 2;
                if ($request->jumlah_bayar >= $request->total_biaya || $request->jumlah_bayar >= $dp) {
                    dd('pembayaran dp kurang lebih setengah dari total biaya');
                } else {
                    dd('sip');
                }
            }
        } else {
            $validatedData = $request->validate([
                'jumlah_bayar' => 'required',
            ]);
        }
    }
}
