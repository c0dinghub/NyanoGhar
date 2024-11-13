@extends('admin.layouts.app')
@section('content')

    <div class="bg-slate-100 shadow-lg ">
        <div class="container-fluid pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.allProperties.index') }}">All Properties</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.pages.addProperty') }}">Form</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container mx-auto px-8 max-w-6xl ">
            <h1 class="text-2xl font-semibold mb-6">Add Property(Form)</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="propertyForm" action="{{ route('storeProperty') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-md font-medium text-[#2a3844] ">Property Title:<sup class="text-red-500 text-md ">*</sup> </label>
                        <input type="text" id="property_title" name="property_title"
                                value="{{ old('property_title', $property->property_title ?? '') }}"
                            class="mt-1 block bg-gray-50 w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="status" class="block text-md font-medium text-[#2a3844]">Status:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="status" name="status"
                            class="mt-1 block w-full bg-gray-50  p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <<option value="" disabled {{ old('status', $property->status ?? '') == '' ? 'selected' : '' }}>Select Status</option>
                            <option value="for_rent" {{ old('status', $property->status ?? '') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                            <option value="for_sale" {{ old('status', $property->status ?? '') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                        </select>
                    </div>
                </div>

                <!-- Conditional Fields -->
                <div id="rentFields" class="hidden mb-6">
                    <label for="rentPrice" class="block text-md font-medium text-[#2a3844]">Monthly Rent Price:</label>
                    <div class="relative">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">NPR</span>
                        <input type="integer" id="rentPrice" name="rent_price" min="100"
                                value="{{ old('rent_price', $property->rent_price ?? '') }}"
                            class="bg-gray-50 pl-14 mt-1 block w-1/2 h-9 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div id="saleFields" class="hidden mb-6">
                    <label for="salePrice" class="block text-md font-medium text-[#2a3844]">Sale Price:</label>
                    <div class="relative">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">NPR</span>
                        <input type="integer" id="salePrice" name="sale_price" min="100"
                                value="{{ old('sale_price', $property->sale_price ?? '') }}"
                            class="bg-gray-50 pl-14 mt-1 block w-1/2 h-9 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Common Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="property_type" class="block text-md font-medium text-[#2a3844]">Property Type:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="property_type" name="property_type"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected {{ old('status', $property->status ?? '') == '' ? 'selected' : '' }}>Select Property Type</option>
                            <option value="house" {{ old('property_type', $property->property_type ?? '') == 'house' ? 'selected' : '' }}>House</option>
                            <option value="apartment" {{ old('property_type', $property->property_type ?? '') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                        </select>
                    </div>

                    <div id="houseFields" class="hidden">
                        <label for="house_category" class="block text-md font-medium text-[#2a3844]">House Category:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="house_category" name="house_category"
                            class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled {{ old('house_category') == '' ? 'selected' : '' }}>Select House Category</option>
                            <option value="2bhk" {{ old('house_category') == '2bhk' ? 'selected' : '' }}>2BHK</option>
                            <option value="duplex" {{ old('house_category') == 'duplex' ? 'selected' : '' }}>Duplex</option>
                            <option value="bungalow" {{ old('house_category') == 'bungalow' ? 'selected' : '' }}>Bungalow</option>
                            <option value="villa" {{ old('house_category') == 'villa' ? 'selected' : '' }}>Villa</option>
                            <option value="4bhk" {{ old('house_category') == '4bhk' ? 'selected' : '' }}>4BHK</option>
                            <option value="triplex" {{ old('house_category') == 'triplex' ? 'selected' : '' }}>Triplex</option>
                            <option value="others" {{ old('house_category') == 'others' ? 'selected' : '' }}>Others</option>
                        </select>

                    </div>

                    <div id="apartmentFields" class="hidden">
                        <label for="apartment_name" class="block text-md font-medium text-[#2a3844]">Apartment Name:</label>
                        <input type="text" id="apartment_name" name="apartment_name"
                            class="bg-gray-50 mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Enter Apartment Name" >

                        <label for="apartment_category" class="block text-md font-medium text-[#2a3844] mt-4">Apartment Category:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="apartment_category" name="apartment_category"
                            class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >
                            <option value="" disabled {{ old('apartment_category') == '' ? 'selected' : '' }}>Select Apartment Category</option>
                            <option value="studio" {{ old('apartment_category') == 'studio' ? 'selected' : '' }}>Studio</option>
                            <option value="2bhk" {{ old('apartment_category') == '2bhk' ? 'selected' : '' }}>2BHK</option>
                            <option value="3bhk" {{ old('apartment_category') == '3bhk' ? 'selected' : '' }}>3BHK</option>
                            <option value="duplex" {{ old('apartment_category') == 'duplex' ? 'selected' : '' }}>Duplex</option>
                            <option value="4bhk" {{ old('apartment_category') == '4bhk' ? 'selected' : '' }}>4BHK</option>
                            <option value="penthouse" {{ old('apartment_category') == 'penthouse' ? 'selected' : '' }}>Penthouse</option>
                        </select>
                    </div>

                    <!-- Build Year Fields -->
                    <div class="">
                        <label for="build-year" class="block text-md font-medium text-[#2a3844]">Build Year:<sup class="text-red-500 text-md ">*</sup></label>
                        <div class="flex">
                            <input type="number" id="build-year" name="build_year"
                                class="mt-1 block w-2/3 bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter Year" min="1" >
                            <select id="year-type" name="year_type"
                                class="mt-1 block w-1/3 bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="bs">BS</option>
                                <option value="ad">AD</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="area" class="block text-md font-medium text-[#2a3844]">Area (sq ft):<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" min="0" id="property_area" name="property_area"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="bedrooms" class="block text-md font-medium text-[#2a3844]"> Bedrooms:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" min="0" id="bedrooms" name="bedrooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="bathrooms" class="block text-md font-medium text-[#2a3844]"> Bathrooms:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" min="0" id="bathrooms" name="bathrooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="hall_rooms" class="block text-md font-medium text-[#2a3844]"> Hall Rooms:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" min="0" id="hall_rooms" name="hall_rooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="total_rooms" class="block text-md font-medium text-[#2a3844]"> Total Rooms:</label>
                        <input type="number" min="0" id="total_rooms" name="total_rooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="house_facing" class="block text-md font-medium text-[#2a3844]">House Facing:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="house_facing" name="house_facing"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected>Select House Facing</option>
                            <option value="north">North</option>
                            <option value="north_east">North-East</option>
                            <option value="north_west">North-West</option>
                            <option value="south">South</option>
                            <option value="south_east">South-East</option>
                            <option value="south_west">South-West</option>
                            <option value="east">East</option>
                            <option value="west">West</option>
                        </select>
                    </div>

                    <div>
                        <label for="number_of_floors" class="block text-md font-medium text-[#2a3844]">Number of
                            Floors:<sup class="text-red-500 text-md ">*</sup></label>
                        <select id="no_of_floors" name="no_of_floors"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected>Select Number of Floors</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="3.5">4</option>
                            <option value="3.5">4.5</option>
                        </select>
                    </div>
                </div>

                <!-- Location Fields -->

                <livewire:address-dependent-dropdown />

                <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-6 gap-4">
                    <div class="ward_no">
                        <label for="ward_no" class="block text-md font-medium text-[#2a3844]"> Ward :</label>
                        <input type="number" min="1" id="ward_no" name="ward_no"
                            value="{{old('ward_no', $property->ward_no ?? '' )}}"
                            class="bg-gray-50 mt-2 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="address_area mb-6">
                        <label for="address_area" class="block text-md font-medium text-[#2a3844]"> Address Area :</label>
                        <input type="text" id="address_area" name="address_area"
                            value="{{old('address_area', $property->address_area ?? '')}}"
                            class="bg-gray-50 mt-2 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Amenities -->
                <div class="mb-6">
                    <label for="amenities" class="block text-md font-medium text-[#2a3844]">Amenities:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2 text-[#374958] ml-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="amenity_id" value="1" class="form-checkbox">
                            <span class="ml-2">Security</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="amenity_id" value="2" class="form-checkbox">
                            <span class="ml-2">Swimming Pool</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="amenity_id" value="3" class="form-checkbox">
                            <span class="ml-2">Gym</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="amenity_id" value="5" class="form-checkbox">
                            <span class="ml-2">Garden</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="amenity_id" value="6" class="form-checkbox">
                            <span class="ml-2">CCTV</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Car Parking Spaces -->
                    <div>
                        <label for="car_parking" class="block text-md font-medium text-[#2a3844]">Car Parking Spaces:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" id="car_parking" name="car_parking_spaces" min="0" value="0"
                            class="mt-1 block w-full bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Bike Parking Spaces -->
                    <div>
                        <label for="bike_parking" class="block text-md font-medium text-[#2a3844]">Bike Parking
                            Spaces:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="number" id="bike_parking" name="bike_parking_spaces" min="0"
                            value="0"
                            class="mt-1 block w-full bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label for="image" class="block text-md font-medium text-[#2a3844]">Upload Image:<sup class="text-red-500 text-md ">*</sup></label>
                        <input type="file" id="image" name="property_photo" accept="image/*"
                            class="bg-gray-50 mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <small class="text-gray-500">Only one image can be uploaded.</small>
                    </div>


                    <div>
                        <label for="video" class="block text-md font-medium text-[#2a3844]">Property Video:</label>
                        <input type="file" id="video" name="property_video" accept="video/*"
                            class="bg-gray-50 mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <small class="text-gray-500">Upload a video tour of the property (optional).</small>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-md font-medium text-[#2a3844]">Description:</label>
                    <textarea id="description" name="description" rows="5"
                        class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 mb-10 px-4 rounded-lg shadow-md">Submit
                        </button>
                </div>
            </form>
        </div>
    </div>

@endsection
