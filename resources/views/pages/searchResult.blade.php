@extends('layouts.frontendLayout') <!-- Ensure this path matches your actual layout file -->

@section('addcontent')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Search Results</h1>

    <!-- Search Form -->
    <div class="mb-6">
        <form action="{{ route('properties.search') }}" method="GET" class="grid grid-cols-[repeat(4,1fr),80px] bg-white p-4 rounded-lg shadow-lg">
            <!-- Location Input -->
            <div class="relative">
                <input type="text" name="location" placeholder="Enter location..."
                    class="w-full border border-gray-300 rounded-l-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                    aria-label="Location" value="{{ request('location') }}">
            </div>

            <!-- Purpose Dropdown -->
            <div class="relative">
                <select name="status" class="flex w-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" aria-label="Purpose">
                    <option value="">Select Purpose</option>
                    <option value="for_sale" {{ request('status') == 'for_sale' ? 'selected' : '' }}>To Buy</option>
                    <option value="for_rent" {{ request('status') == 'for_rent' ? 'selected' : '' }}>To Rent</option>
                </select>
            </div>

            <!-- Property Type Dropdown -->
            <div class="relative">
                <select name="property_type" class="flex w-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Property Type">
                    <option value="">Select Property</option>
                    {{-- <option value="bungalow" {{ request('property_type') == 'bungalow' ? 'selected' : '' }}>Bungalow</option>
                    <option value="villa" {{ request('property_type') == 'villa' ? 'selected' : '' }}>Villa</option> --}}
                    <option value="apartment" {{ request('property_type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="house" {{ request('property_type') == 'house' ? 'selected' : '' }}>House</option>
                </select>
            </div>

            <!-- Budget Dropdown -->
            <div class="relative">
                <select name="budget" class="flex w-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" aria-label="Budget">
                    <option value="">Select Budget</option>
                    <option value="under50k" {{ request('budget') == 'under50k' ? 'selected' : '' }}>Under Rs 50,000</option>
                    <option value="50k-100k" {{ request('budget') == '50k-100k' ? 'selected' : '' }}>Rs 50,000 - 1 Lakh</option>
                    <option value="100k-200k" {{ request('budget') == '100k-200k' ? 'selected' : '' }}>Rs 1 Lakh - 2 Lakhs</option>
                    <option value="200k-500k" {{ request('budget') == '200k-500k' ? 'selected' : '' }}>Rs 2 Lakhs - 5 Lakhs</option>
                    <option value="above500k" {{ request('budget') == 'above500k' ? 'selected' : '' }}>Above Rs 5 Lakhs</option>
                </select>
            </div>

            <!-- Search Button -->
            <div class="flex items-center">
                <button type="submit" class="flex w-full justify-center items-center h-10 bg-blue-600 text-white font-semibold rounded-full shadow-lg hover:bg-blue-700" aria-label="Search">
                    Search
                </button>
            </div>
        </form>
    </div>

    @if($properties->count()) <!-- Ensure properties is defined and has items -->
        @foreach($properties as $property)
            <div class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row h-80 mb-4">
                <!-- Property Image -->
                <div class="md:w-1/2 overflow-hidden">
                    <img src="{{ $property->property_photo }}" alt="Property Image"
                        class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                </div>

                <!-- Property Details -->
                <div class="md:w-1/2 p-6 flex flex-col">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex gap-4">
                            <span class="bg-gray-200 flex items-center px-3 py-[1px] rounded-full capitalize">{{ $property->property_type }}</span>
                            <span class="bg-{{ $property->status === 'for_sale' ? 'green' : 'orange' }}-500 flex items-center text-white px-3 rounded-full">
                                {{ $property->status === 'for_sale' ? 'Sale' : 'Rent' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-4">
                            <ion-icon name="heart-outline" class="heart-icon text-xl"></ion-icon>
                            <a href=""><ion-icon name="share-outline" class="cursor-pointer text-xl"></ion-icon></a>
                        </div>
                    </div>

                    <h2 class="text-2xl font-semibold mb-4">{{ $property->property_title }}</h2>
                    @if($property->sale_price)
                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ number_format($property->sale_price) }}</p>
                    @elseif ($property->rent_price)
                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ number_format($property->rent_price) }}/m</p>
                    @endif

                    <p class="text-gray-600 mb-4 flex items-center">
                        <ion-icon name="map" class="mr-2"></ion-icon> {{ $property->address_area }}, {{ $property->district?->name }}
                    </p>

                    <ul class="text-gray-600 flex gap-6 mb-8 items-center">
                        <li class="flex items-center gap-1 font-semibold"><ion-icon name="bed"></ion-icon> Bedrooms: {{ $property->bedrooms }}</li>
                        <li class="flex items-center font-semibold"><ion-icon name="water"></ion-icon> Bathrooms: {{ $property->bathrooms }}</li>
                        <li class="flex items-center gap-1 font-semibold"><ion-icon name="home"></ion-icon> Floors: {{ $property->no_of_floors }}</li>
                    </ul>

                    <div class="flex justify-between items-center">
                        <a href="tel:+1234567890"
                            class="bg-green-500 font-semibold py-[6px] text-white pl-2 pr-3 rounded-lg flex items-center gap-1 transition-transform hover:scale-105">
                            <ion-icon name="call"></ion-icon> Call
                        </a>
                        <a href="{{ route('propertyDetail', ['id' => $property->id]) }}"
                            class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                            <ion-icon name="eye"></ion-icon> View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="mt-4">No properties found matching your criteria.</p>
    @endif
</div>
@endsection
