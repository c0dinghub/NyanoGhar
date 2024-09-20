@extends('layouts.frontendLayout')
@section('addcontent')

    <body class="bg-gray-200 ">
        <!-- Main Container -->
        <div class="container mx-auto p-6">
            <div class="flex flex-col md:flex-row">

                <!-- Sidebar for Search -->
                <div class="md:w-1/4 h-fit bg-white p-6 rounded-lg shadow-md mb-6 md:mb-0 sticky top-6">
                    <h3 class="text-xl font-semibold mb-4">Search Properties</h3>

                    <div class="mb-4">
                        <label class="block text-gray-600 mb-2" for="property-type">Property Type</label>
                        <select id="property-type" name="property-type" class="w-full p-2 border border-gray-300 rounded-lg">
                            <option value="any">Any</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="villa">Villa</option>
                            <option value="office">Office</option>
                        </select>
                    </div>

                    <!-- Property Status Toggle -->
                    <div class="flex items-center mb-4">
                        <label class="flex items-center mr-4">
                            <input type="radio" name="property_type" value="buy" checked onchange="toggleSearch('buy')"
                                class="mr-2">
                            Buy
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="property_type" value="rent" onchange="toggleSearch('rent')"
                                class="mr-2">
                            Rent
                        </label>
                    </div>

                    <!-- Rent-Specific Fields -->
                    <div id="rent-fields" class="hidden">
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2" for="rent-price-range">Rent Price Range</label>
                            <select id="rent-price-range" name="rent-price-range"
                                class="w-full p-2 border border-gray-300 rounded-lg">
                                <option value="under-10000">Under Rs 10,000</option>
                                <option value="10000-25000">Rs 10,000 - 25,000</option>
                                <option value="25000-50000">Rs 25,000 - 50,000</option>
                                <option value="50000+"> Over Rs 50,000</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2" for="lease-duration">Lease Duration</label>
                            <select id="lease-duration" name="lease-duration"
                                class="w-full p-2 border border-gray-300 rounded-lg">
                                <option value="any">Any</option>
                                <option value="6-months">Under 6 Months</option>
                                <option value="1-year">1 Year</option>
                                <option value="2-years">Over 2 Years</option>
                            </select>
                        </div>
                    </div>

                    <!-- Buy-Specific Fields (shown by default) -->
                    <div id="buy-fields">
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2" for="buy-price-range">Buying Price Range</label>
                            <select id="buy-price-range" name="buy-price-range"
                                class="w-full p-2 border border-gray-300 rounded-lg">
                                <option value="under-100k">Under 5 Lakhs</option>
                                <option value="100k-500k">Rs 5 - 20 Lakhs</option>
                                <option value="over-500k">Rs 20 - 50 Lakhs </option>
                                <option value="over-500k">Rs 50 Lakhs - 1 Cr </option>
                                <option value="over-500k">Rs 1 - 3 Cr </option>
                                <option value="over-500k">Over Rs 3 Cr </option>
                            </select>
                        </div>
                    </div>

                    <!-- Shared Fields (common for both rent and buy) -->
                    <div class="mb-4">
                        <label class="block text-gray-600 mb-2" for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter location"
                            class="w-full p-2 border border-gray-300 rounded-lg">
                    </div>

                    <button type="submit"
                        class=" text-center w-full bg-orange-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-orange-600">
                        Search
                    </button>
                </div>

                <!-- Property Details Section -->
                <div class="card w-3/4">

                    {{-- <div
                        class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row ml-0 md:ml-6 h-80 mb-4">
                        <!-- Property Image -->
                        <div class="md:w-1/2 overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/house1.jpg') }}" alt="Property Image"
                                class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                        </div>

                        <!-- Property Details -->
                        <div class="md:w-1/2 p-6 flex flex-col ">
                            <div class="flex items-center  justify-between mb-4">
                                <div class="flex gap-4 uppercase ">
                                    <span class="bg-gray-200  px-2  w-fit rounded-full ">House</span>
                                    <span class="bg-green-500 text-white px-2 pb-0.5 w-fit rounded-full ">Sale</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <ion-icon name="heart-outline" class="heart-icon text-xl"></ion-icon>
                                    <!-- Share Icon -->
                                    <a href=""><ion-icon name="share-outline"
                                            class="cursor-pointer text-xl"></ion-icon></a>
                                </div>
                            </div>
                            <h2 class="text-2xl font-semibold mb-4">Bungalow House for Sale</h2>
                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs 12 Cr</p>
                            <p class="text-gray-600 mb-4 flex items-center "><ion-icon name="map"
                                    class="mr-2"></ion-icon> Hattigaudi, Kathmandu</p>

                            <ul class="flex gap-6 text-gray-600 mb-8">
                                <li class="flex items-center gap-1 font-semibold"><ion-icon name="bed"></ion-icon>Bedrooms: 7</li>
                                <li class="flex items-center gap-1 font-semibold"><ion-icon name="rainy"></ion-icon>Bathrooms: 2</li>
                                <li class="flex items-center gap-1 font-semibold"><ion-icon name="home"></ion-icon>Floors: 2.5</li>
                            </ul>

                            <div class="flex justify-between items-center">
                                <a href="tel:+1234567890"
                                    class="bg-green-500 font-semibold h-9 text-white px-3 rounded-lg flex items-center gap-2 hover:bg-green-600 transition-colors">
                                    <ion-icon name="call"></ion-icon> Call
                                </a>
                                <a href="{{route('propertyDetail')}}"
                                    class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center hover:bg-blue-700 transition-colors">
                                    <ion-icon name="eye"></ion-icon>View Details
                                </a>
                            </div>

                        </div>
                    </div> --}}
                    @foreach ($properties as $property)
                        <div
                            class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row ml-0 md:ml-6 h-80 mb-4">
                            <!-- Property Image -->
                            <div class="md:w-1/2 overflow-hidden">
                                <img src="{{ $property->property_photo }}" alt="Property Image"
                                    class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                            </div>

                            <!-- Property Details -->
                            <div class="md:w-1/2 p-6 flex flex-col ">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex gap-4  ">
                                        <span class="bg-gray-200 flex items-center px-3  w-fit rounded-full  capitalize">{{$property->property_type}}</span>

                                            @if ($property->status === 'for_sale')
                                            <span class="bg-green-500 flex items-center text-white text-sm px-3  w-fit rounded-full ">Sale </span>
                                            @else
                                            <span class="bg-orange-500 flex items-center text-white text-sm px-3 w-fit rounded-full ">Rent </span>
                                            @endif

                                    </div>
                                    <div class="flex items-center gap-4">
                                        <ion-icon name="heart-outline" class="heart-icon text-xl"></ion-icon>
                                        <!-- Share Icon -->
                                        <a href=""><ion-icon name="share-outline"
                                                class="cursor-pointer text-xl"></ion-icon></a>
                                    </div>
                                </div>

                                <h2 class="text-2xl font-semibold mb-4">{{$property->property_title}}</h2>
                                @if($property->sale_price )
                                <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{$property->sale_price}}</p>
                                @elseif ($property->rent_price )
                                <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{$property->rent_price ??''}}/m</p>
                                @endif
                                <p class="text-gray-600 mb-4 flex items-center "><ion-icon name="map"
                                        class="mr-2"></ion-icon> {{$property->address_area}}, {{$property->district->name}}</p>

                                <ul class=" text-gray-600 flex gap-6 mb-8 items-center ">
                                    <li class="flex items-center gap-1 font-semibold"><ion-icon name="bed"></ion-icon>Bedrooms: {{$property->bedrooms}}</li>
                                    <li class="flex items-center gap-1 font-semibold" ><ion-icon name="rainy"></ion-icon>Bathrooms: {{$property->bathrooms}}</li>
                                    <li class="flex items-center gap-1 font-semibold"><ion-icon name="home"></ion-icon>Floors: {{$property->no_of_floors}}</li>
                                </ul>

                                <div class="flex justify-between items-center">
                                    <a href="tel:+1234567890"
                                        class="bg-green-500 font-semibold h-9 text-white px-3 rounded-lg flex items-center gap-2 hover:bg-green-600 transition-colors">
                                        <ion-icon name="call"></ion-icon> Call
                                    </a>
                                    <a href="{{route('propertyDetail')}}"
                                        class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center hover:bg-blue-700 transition-colors">
                                        <ion-icon name="eye"></ion-icon>View Details
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{-- <div
                        class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row ml-0 md:ml-6 h-80">
                        <!-- Property Image -->
                        <div class="md:w-1/2 overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/house2.jpg') }}" alt="Property Image"
                                class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                        </div>

                        <!-- Property Details -->
                        <div class="md:w-1/2 p-6 flex flex-col ">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex gap-4 uppercase ">
                                    <span class="bg-gray-200  px-2  w-fit rounded-full ">House</span>
                                    <span class="bg-[#f5663b] text-white px-2 pb-0.5 w-fit rounded-full ">Rent</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <ion-icon name="heart-outline" class="heart-icon text-xl"></ion-icon>
                                    <!-- Share Icon -->
                                    <a href=""><ion-icon name="share-outline"
                                            class="cursor-pointer text-xl"></ion-icon></a>
                                </div>
                            </div>
                            <h2 class="text-2xl font-semibold mb-4">House for Rent</h2>
                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs 1 Lakh/Month</p>
                            <p class="text-gray-600 mb-4 flex items-center "><ion-icon name="map"
                                    class="mr-2"></ion-icon> Bhangal, Kathmandu</p>

                            <ul class="flex gap-6 text-gray-600 mb-8 font-semibold">
                                <li class="flex items-center gap-1"><ion-icon name="bed"></ion-icon>Bedrooms: 7</li>
                                <li class="flex items-center gap-1 font-semibold"><ion-icon name="rainy"></ion-icon>Bathrooms: 4</li>
                                <li class="flex items-center gap-1 font-semibold"><ion-icon name="home"></ion-icon>Floors: 2.5</li>
                            </ul>

                            <div class="flex justify-between items-center">
                                <a href="tel:+1234567890"
                                    class="bg-green-500 font-semibold h-9 text-white px-3 rounded-lg flex items-center gap-2 hover:bg-green-600 transition-colors">
                                    <ion-icon name="call"></ion-icon> Call
                                </a>
                                <a href="/property-details"
                                    class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center hover:bg-blue-700 transition-colors">
                                    <ion-icon name="eye"></ion-icon>View Details
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
        <section class=" py-2">
            <div class="container1 mx-auto px-4 h-32">
                <div class="bg-orange-500 shadow-lg flex items-center p-10 justify-between text-center h-full">
                    <div class="ml-10 ">
                        <h2 class="text-3xl font-semibold text-white mb-2">Looking for a dream home?</h2>
                        <p class="text-white font-semibold text-lg">We can help you realize your dream of a new home.</p>
                    </div>

                    <a href="{{route('searchPage')}}" class="bg-white text-orange-500 py-3 px-4 flex items-center justify-center hover:bg-gray-800 hover:text-white transition-transform duration-200 hover:scale-105">
                        <span class="mr-2  font-semibold">Contact Us Today</span>
                        <ion-icon name="arrow-forward-outline" class="text-xl font-semibold"></ion-icon>
                    </a>
                </div>
            </div>
        </section>
    </body>
    <script>
        function toggleSearch(type) {
            const rentFields = document.getElementById('rent-fields');
            const buyFields = document.getElementById('buy-fields');
            if (type === 'rent') {
                rentFields.classList.remove('hidden');
                buyFields.classList.add('hidden');
            } else {
                rentFields.classList.add('hidden');
                buyFields.classList.remove('hidden');
            }
        }
    </script>
@endsection
