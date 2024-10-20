<div class="grid grid-cols-2 gap-4">

    <div>
        <label for="province text-bold">Province</label>
        <select wire:model="selectedProvince" id="province" name="province_id" class="form-control" wire:change="changeSelectedProvince">
            <option value="" selected>Select Province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->province_en }}</option>
            @endforeach
        </select>
    </div>


    <div class="">
        <label for="district">District</label>
        <select wire:model="selectedDistrict" id="district" name="district_id" class="form-control" wire:change="changeSelectedProvince">
            <option value="" selected>Select District</option>
            @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->district_en }}</option>
            @endforeach
        </select>
    </div>
    <div class="">
        <label for="localBody">Local Body</label>
        <select wire:model="selectedLocalBody" name="local_body_id" id="localBody" class="form-control">
            <option value="" selected>Select Local Body</option>
            @foreach ($localBodies as $localBody)
                <option value="{{ $localBody->id }}">{{ $localBody->local_body_en }}</option>
            @endforeach
        </select>
    </div>
</div>
