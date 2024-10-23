<div class="relative grid grid-cols-2 gap-6">
    <div class="province col-span-1">
        <label for="provinces" class="block text-lg font-medium mb-2 text-black">Select Province <sup class="text-red-500 text-lg ">*</sup></label>
        <select id="provinces" name="province_id"
            wire:model.live="selectedProvince"
            class="py-2 px-4 block w-full bg-gray-50 border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="">Select a Province</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ $selectedProvince == $province->id ? 'selected' : '' }}>
                    {{ $province->province_en }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="district">
        <label for="districts" class="block text-lg font-medium mb-2 text-black">Select District</label>
        <select id="districts" name="district_id"
            wire:model.live="selectedDistrict"
            class="py-2 px-4 block w-full bg-gray-50 border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="">Select a District</option>
            @if($districts)
                @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $selectedDistrict == $district->id ? 'selected' : '' }}>
                        {{ $district->district_en }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="local_body ">
        <label for="local_bodies" class="block text-lg font-medium mb-2 text-black">Local Body</label>
        <select id="local_bodies" name="local_body_id"
                wire:model.live="selectedLocalBody"
                class="py-2 px-4 block w-full bg-gray-50 border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="">Select Local Body</option>
            @if($local_bodies)
                @foreach($local_bodies as $local_body)
                    <option value="{{ $local_body->id }}" {{ $selectedLocalBody == $local_body->id ? 'selected' : '' }}>
                        {{ $local_body->local_body_en }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>


</div>
