<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalBody;

class AddressDependentDropdown extends Component
{
    public $provinces = [];
    public $districts = [];
    public $local_bodies = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedLocalBody = null;

    public function mount($selectedProvince = null, $selectedDistrict = null, $selectedLocalBody = null)
    {
        $this->provinces = Province::all(['id', 'province_en']);
        $this->selectedProvince = $selectedProvince;
        $this->selectedDistrict = $selectedDistrict;
        $this->selectedLocalBody = $selectedLocalBody;

        if ($this->selectedProvince) {
            $this->loadDistricts($this->selectedProvince);
        }

        if ($this->selectedDistrict) {
            $this->loadLocalBodies($this->selectedDistrict);
        }
    }


    public function updatedSelectedProvince($province_id)
    {
        // Load districts and reset selected values dependent on province
        $this->loadDistricts($province_id);
        $this->selectedDistrict = null;
        $this->selectedLocalBody = null;
        $this->local_bodies = [];
    }

    public function updatedSelectedDistrict($district_id)
    {
        // Load local bodies and reset selected values dependent on district
        $this->loadLocalBodies($district_id);
        $this->selectedLocalBody = null;
    }

    private function loadDistricts($province_id)
    {
        // Fetch districts for the selected province
        $this->districts = District::where('province_id', $province_id)->get(['id', 'district_en']);
    }

    private function loadLocalBodies($district_id)
    {
        // Fetch local bodies for the selected district
        $this->local_bodies = LocalBody::where('district_id', $district_id)->get(['id', 'local_body_en']);
    }

    public function render()
    {
        return view('livewire.address-dependent-dropdown');
    }
}
