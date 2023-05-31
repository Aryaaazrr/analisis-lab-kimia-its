<?php

namespace App\Http\Livewire;

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MultiStepLayanan extends Component
{
    // protected $layout = 'layouts.step';

    public $totalStep = 3;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {
        if ($this->currentStep < $this->totalStep) {
            $this->currentStep++;
        } else {
            $this->currentStep = $this->totalStep;
        }
    }

    public function decreaseStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        } else {
            $this->currentStep = 1;
        }
    }

    public function render()
    {
        // dd($this->currentStep);
        $jenis_customer = Auth::user()->jenis_customer;
        $layanananalisa = Layanan::where('jenis_layanan', 'Analisa')->get();
        $layanansewa = Layanan::where('jenis_layanan', 'Sewa')->get();
        return view('livewire.multi-step-layanan', ['layanan_analisa' => $layanananalisa, 'layanan_sewa' => $layanansewa, 'jenis_customer' => $jenis_customer]);
    }
}
