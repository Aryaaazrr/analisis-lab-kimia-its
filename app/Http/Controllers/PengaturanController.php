<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.pengaturan', compact('user'));
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
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->old_password == null) {
            // dd('kontol');
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|max:255',
                'email' => 'required|email',
                'no_telepon' => 'required|regex:/^\d{10,12}$/',
                'alamat' => 'max:255',
                'foto' => 'image|mimes:jpeg,png,jpg|max:5120'
            ]);

            $file_path = 'uploads/photo';

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->file('foto')) {
                $photo = $request->file('foto');
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(100000, 1001238912) . "." . $ext;
                $photo->move($file_path, $filename);
                $request['foto'] = $filename;
                // $path = $photo->storeAs('photo/profile', $photo, 'public');

                // // simpan data ke database
                $new = User::where('id', $request->id)->first();
                $new->update([
                    'nama_lengkap' => $request->nama_lengkap,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                    'alamat' => $request->alamat,
                    'foto' => $filename,
                ]);

                return redirect()->back()->with('success', 'Profile berhasil diperbarui.');
            }

            $new = User::where('id', $request->id)->first();
            $new->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);

            return redirect()->back()->with('success', 'Profile berhasil diperbarui.');
        } else {

            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return redirect()->back()->with('error', 'Password Lama tidak sesuai.');
            }

            if ($request->new_password != $request->confirm_password) {
                return redirect()->back()->with('error', 'Password Baru dan Konfirmasi password tidak sama.');
            }

            $validator = Validator::make($request->all(), [
                'new_password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,}$/|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator);
            }

            $new = User::where('id', Auth::user()->id)->first();
            $new->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
