<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LayananSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan_sewa = Layanan::where('jenis_layanan', 'Sewa')->get();
        return view('admin.layanan-sewa', compact('layanan_sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.layanan-sewa-add');
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
            'jenis_layanan' => 'Sewa',
            'harga_internal_kimia' => $request->harga_internal_kimia,
            'harga_internal_its' => $request->harga_internal_its,
            'harga_umum' => $request->harga_umum,
        ]);

        Session::flash('success', 'success-add-analisa');
        Session::flash('message-success', 'Data Layanan Sewa Berhasil Ditambahkan.');
        return redirect('admin/layanan-sewa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayananSewa  $layananSewa
     * @return \Illuminate\Http\Response
     */
    public function show(LayananSewa $layananSewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayananSewa  $layananSewa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layanan_sewa = Layanan::find($id);
        return view('admin.content.layanan-sewa-edit', compact('layanan_sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayananSewa  $layananSewa
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
        return redirect('admin/layanan-sewa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayananSewa  $layananSewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan_sewa = Layanan::where('id', $id)->first();
        $layanan_sewa->delete();

        Session::flash('delete', 'success-add-analisa');
        Session::flash('message-delete', 'Data Layanan Berhasil Dihapus.');
        return redirect('admin/layanan-sewa');
    }
}
