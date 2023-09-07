<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;

class LocationDropdowns extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;


    public $selectedProvinsi = NULL;
    public $selectedKota = NULL;
    public $selectedKecamatan = NULL;
    public $selectedKelurahan = NULL;

    public function mount($selectedKelurahan = null)
    {
        $this->provinsi = Province::all();
        $this->kota = [];
        $this->kecamatan = [];
        $this->kelurahan = [];
        $this->selectedKelurahan = $selectedKelurahan;

        if (!is_null($selectedKelurahan)) {
            $city = Regency::with('province')->find($selectedKelurahan);
            if ($city) {
                $this->kecamatan = Regency::where('province_id', $city->province->province_id)->get();
                $this->kota = District::where('regency_id', $city->regency_id)->get();
                $this->selectedProvinsi = $city->province->province_id;
                $this->selectedKota = $city->regency->regency_id;
                $this->selectedKecamatan = $city->regency->district->district_id;
            }
        }
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Regency::where('province_id', $provinsi)->get();
        $this->selectedKota = null;
        $this->selectedKecamatan= null;
        $this->kelurahan = [];
    }

    public function updatedSelectedKota($kota)
    {
        if (!is_null($kota)) {
            $this->kecamatan = District::where('regency_id', $kota)->get();
        } else {
            $this->kecamatan = [];
        }
    }
    
    public function updatedSelectedKecamatan($kecamatan){
        if (!is_null($kecamatan)) {
            $this->kelurahan = Village::where('district_id', $kecamatan)->get();
        } else {
            $this->kelurahan = [];
        }
    }

    public function render()
    {
        return view('livewire.location-dropdowns');
    }
}
