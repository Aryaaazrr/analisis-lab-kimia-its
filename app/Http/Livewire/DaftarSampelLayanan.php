<?php

namespace App\Http\Livewire;

use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarSampelLayanan extends Component
{
    public $sampel;

    protected $rules = [
        'sampel.*.nama_sampel' => 'required',
        'sampel.*.jumlah' => 'required|numeric|min:1',
        'sampel.*.jenis_sampel' => 'required',
        'sampel.*.wujud_sampel' => 'required',
        'sampel.*.catatan' => 'max:255'
    ];

    protected $messages = [
        'sampel.*.nama_sampel.required' => 'Nama sampel wajib diisi!',
        'sampel.*.jumlah.required' => 'Jumlah sampel wajib diisi!',
        'sampel.*.jumlah.numeric' => 'Jumlah sampel harus angka!',
        'sampel.*.jumlah.min' => 'Jumlah sampel minimal 1',
        'sampel.*.jenis_sampel.required' => 'Jenis sampel wajib diisi!',
        'sampel.*.wujud_sampel.required' => 'Wujud sampel wajib diisi!',
        'sampel.*.catatan.max' => 'Catatan maksimal 255 karakter!',
    ];

    public function render()
    {
        $keranjang = Keranjang::select('layanan_id')->where('users_id', Auth::user()->id)->first();
        $pilihanLayanan = $keranjang->layanan_id;
        // dd($pilihanLayanan);
        $jenis_sampel = ['Organik', 'Non-Organik'];
        $wujud_sampel = ['Padat', 'Cair', 'Gas'];
        return view('livewire.daftar-sampel-layanan', ['jenis_sampel' => $jenis_sampel, 'wujud_sampel' => $wujud_sampel, 'pilihanLayanan' => $pilihanLayanan]);
    }

    public function mount()
    {
        $this->sampel = collect();
    }

    public function add()
    {
        $this->sampel->push(new Transaksi());
    }

    public function delete($index)
    {
        // $sampel = $this->sampel[$index];
        // $this->sampel->forget($index);
        $this->sampel->forget($index);
        $this->sampel = $this->sampel->values();
    }

    public function save()
    {
        $this->validate($this->rules, $this->messages);

        // $jadwal $this->sampel['jadwal'];
        // $myDate = Carbon::now();
        // dd
        // $request['jadwal'] = $myDate->toDateString();
        // dd($this->sampel);
        // session(['input_sampel' => $this->sampel]);
        // $pilihanLayanan = session('pilihanLayanan');
        // $cekKeranjang = Keranjang::where('users_id', Auth::user()->id)->first();
        // $pilihanLayanan = $cekKeranjang->layanan_id;
        // $pilihanLayanan = session('pilihanLayanan');
        
        // $cekKeranjang = Keranjang::where('users_id', Auth::user()->id)->first();
        // // dd($pilihanLayanan);
        
        $dataSampel = $this->sampel->toArray();
        session(['dataSampel' => $dataSampel]);
        // // dd($dataSampel);
        // // Lanjutkan ke langkah berikutnya
        // foreach ($dataSampel as $sampel) {
        //     Keranjang::updateOrInsert([
        //         'users_id' => Auth::user()->id,
        //         'layanan_id' => $cekKeranjang->layanan_id,
        //     ], $sampel);
        //     // Keranjang::where('users_id', Auth::user()->id)->update($sampel);
        //     // $inputSampel->update()
        //     // dd($sampel);
        // }


        // Keranjang::create()
        return redirect('layanan/cek-transaksi');



        // session()->flash('success','The data has been saved successfully');
    }
}
