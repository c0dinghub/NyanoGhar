{{-- <div class="grid grid-cols-2 gap-4">
    <!-- Province Dropdown -->
    <div>
        <label for="province">Province</label>
        <select wire:model="selectedProvince" id="province" name="province_id" class="form-control">
            <option value="">Select Province</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- District Dropdown -->
    <div>
        <label for="district">District</label>
        <select wire:model="selectedDistrict" id="district" name="district_id" class="form-control">
            <option value="">Select District</option>
            @if(!is_null($districts))
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <!-- Local Body Dropdown -->
    <div>
        <label for="local_body">Local Body</label>
        <select id="local_body" name="local_body_id" class="form-control">
            <option value="">Select Local Body</option>
            @if(!is_null($localBodies))
                @foreach($localBodies as $localBody)
                    <option value="{{ $localBody->id }}">{{ $localBody->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div> --}}

<div class="mb-6">
    <label for="location" class="mb-6 block text-lg font-medium text-black">Property Location:<sup class="text-red-500 text-lg ">*</sup></label>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <!-- Province Dropdown -->
        <div>
            <label for="province" class="block text-lg font-medium text-black">Province:</label>
            <select id="province" name="province_id"
                class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">Select Province</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" onclick="selectedProvince({{ $province->id }})">
                        {{ $province->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- District Dropdown -->
        <div>
            <label for="district" class="block text-lg font-medium text-black">District:</label>
            <select id="district" name="district_id"
                class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="" disabled selected>Select District</option>
                {{-- @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach --}}
            </select>
        </div>

        <!-- Local Body Dropdown -->
        <div>
            <label for="local_body" class="block text-lg font-medium text-black">Local Body:</label>
            <select id="local_body" name="local_body_id"
                class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="" disabled selected>Select Local Body</option>
            </select>
        </div>

        <!-- Area Input -->
        <div>
            <label for="address_area" class="block text-lg font-medium text-black">Address Area:</label>
            <input type="text" id="address_area" name="address_area"
                class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
    </div>
</div>

