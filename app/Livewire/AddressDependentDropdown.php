<?php

namespace App\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;

use Livewire\Component;


class AddressDependentDropdown extends Component
{
    public $provinces = [];
    public $districts = [];
    public $local_bodies = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedLocalBody = null;

    public function mount($defaultProvince = null, $defaultDistrict = null, $defaultLocalBody = null)
    {
        // Load all provinces once when the component is mounted
        $this->provinces = Province::all();

        // Set default values if provided
        $this->selectedProvince = $defaultProvince;
        $this->selectedDistrict = $defaultDistrict;
        $this->selectedLocalBody = $defaultLocalBody;

        // Preload districts and local bodies based on selected values
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
