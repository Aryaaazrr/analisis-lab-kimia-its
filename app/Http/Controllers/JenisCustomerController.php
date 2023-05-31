<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisCustomer;
use Illuminate\Support\Facades\Validator;

class JenisCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_customer = JenisCustomer::all();
        return view('admin.customer', compact('jenis_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.customer-add');
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
            'nama_jenis_customer' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // simpan data ke database
        $new = JenisCustomer::create([
            'nama_jenis_customer' => $request->nama_jenis_customer,
        ]);

        return redirect()->route('customer')->with('success', 'Data jenis customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_customer = JenisCustomer::find($id);
        return view('admin.content.customer-edit', compact('jenis_customer'));
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
        // validasi data
        $validator = Validator::make($request->all(), [
            'nama_jenis_customer' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // simpan data ke database
        $new = JenisCustomer::where('id', $id)->first();
        $new->update($request->all());

        return redirect()->route('customer')->with('success', 'Data jenis customer berhasil ditambahkan.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_customer = JenisCustomer::where('id', $id)->first();
        $jenis_customer->delete();

        return redirect('admin/customer')->with('success', 'Data jenis customer berhasil ditambahkan.');

    }
}
