<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\JenisCustomer;
use App\Models\LayananAnalisa;
use App\Models\JenisHargaLayanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LayananAnalisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanananalisa = Layanan::where('jenis_layanan', 'Analisa')->get();
        return view('admin.layanan-analisa', compact('layanananalisa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_layanan = ['Analisa', 'Sewa'];
        $jenis_customer = ['Internal Kimia', 'Internal ITS', 'Umum'];
        return view('admin.content.layanan-analisa-add', ['jenis_customer' => $jenis_customer, 'jenis_layanan' => $jenis_layanan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'nama_layanan' => 'required|unique:layanan|max:255',
            'harga_internal_kimia' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'harga_internal_its' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'harga_umum' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $layanan = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga_internal_kimia' => $request->harga_internal_kimia,
            'harga_internal_its' => $request->harga_internal_its,
            'harga_umum' => $request->harga_umum,
        ]);

        Session::flash('success', 'success-add-analisa');
        Session::flash('message-success', 'Data Layanan Analisa Berhasil Ditambahkan.');
        return redirect('admin/layanan-analisa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayananAnalisa  $layananAnalisa
     * @return \Illuminate\Http\Response
     */
    public function show(LayananAnalisa $layananAnalisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayananAnalisa  $layananAnalisa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layanan_analisa = Layanan::find($id);
        // dd($layanan_analisa);
        return view('admin.content.layanan-analisa-edit', compact('layanan_analisa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayananAnalisa  $layananAnalisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'nama_layanan' => 'required|max:255',
            'harga_internal_kimia' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'harga_internal_its' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'harga_umum' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // simpan data ke database
        $new = Layanan::where('id', $id)->first();
        $new->update($request->all());

        Session::flash('success', 'success-add-analisa');
        Session::flash('message-success', 'Data Layanan Berhasil Diperbarui.');
        return redirect('admin/layanan-analisa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayananAnalisa  $layananAnalisa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan_analisa = Layanan::where('id', $id)->first();
        $layanan_analisa->delete();

        Session::flash('delete', 'success-add-analisa');
        Session::flash('message-delete', 'Data Layanan Berhasil Dihapus.');
        return redirect('admin/layanan-analisa');
    }
}
