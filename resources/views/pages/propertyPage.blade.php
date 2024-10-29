@extends('layouts.frontendLayout')
@section('addcontent')

    <body class="bg-gray-200 ">
        <!-- Main Container -->
        <div class="container mx-auto p-6">
            <div class="flex flex-col md:flex-row">

                <!-- Sidebar for Search -->
                <div class="md:w-1/4 h-fit bg-white p-6 rounded-lg shadow-md mb-6 md:mb-0 sticky top-6">
                    <h3 class="text-xl font-semibold mb-4">Search Properties</h3>
                    <form action="{{ route('propertyPage') }}" method="GET" class="grid grid-cols-1 gap-4">

                        <!-- Property Type Dropdown -->
                        <div class="">
                            <label class="block text-gray-600 mb-2" for="property-type">Property Type</label>
                            <select id="property_type" name="property_type"
                                class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                                <option value="">Select Property Type</option>
                                <option value="apartment">Apartment</option>
                                <option value="house">House</option>
                                <!-- Add more property types as needed -->
                            </select>
                        </div>

                        <!-- Location Input -->
                        <div class="">
                            <label class="block text-gray-600 mb-2" for="location">Location</label>
                            <input type="text" id="location" name="location" placeholder="(e.g. district, address area)"
                                class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                        </div>

                        <!-- Purpose Dropdown -->
                        <div class="">
                            <label class="block text-gray-600 mb-2" for="status">Purpose</label>
                            <select id="status" name="status"
                                class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                onchange="toggleBudgetOptions()">
                                <option value="">Select Purpose</option>
                                <option value="for_sale">To Buy</option>
                                <option value="for_rent">To Rent</option>
                            </select>
                        </div>

                        <!-- Budget Dropdown -->
                        <div class="relative">
                            <label class="block text-gray-600 mb-2" for="budget">Budget</label>
                            <select id="budget" name="budget"
                                class="flex w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                aria-label="Budget">
                                <!-- Default budget options can be shown here -->
                                <option value="">Select Budget</option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <button type="submit"
                            class="flex w-full justify-center items-center h-10 bg-blue-600 text-white font-semibold rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 ease-in-out">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Property Details Section -->
                <div class="md:w-3/4 ml-6 bg-white p-4 rounded-md shadow-md">
                    <div
                        class="flex bg-white shadow-sm rounded-md border border-gray-300 p-1 justify-between mb-3 sticky top-0 z-40">
                        <div>
                            @if ($searchPerformed || $sortBy != 'latest')
                                <h2 class="flex p-1 items-center pl-4 text-xl font-semibold">
                                    Available Properties:<p class="flex font-normal ml-2 text-base items-center">(Total {{ $filteredPropertiesCount }} properties)</p>

                                </h2>
                            @else
                                <h2 class="flex p-1 items-center pl-4 text-xl font-semibold">
                                    Available Properties:
                                    <p class="flex font-normal ml-2 text-base items-center">(Total {{ $propertiesCount }} properties)</p>
                                </h2>
                            @endif
                        </div>

                        <!-- Sorting Options -->
                        <div class="flex items-center">
                            <label for="sort" class="block text-base  font-semibold  text-gray-700">Sort By : </label>
                            <select id="sort" name="sort" onchange="location = this.value;"
                                class="block w-40 ml-1 h-9 border-gray-300 rounded-md cursor-pointer text-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option
                                    value="{{ route('propertyPage', ['sort' => 'latest', 'property_type' => request('property_type')]) }}"
                                    {{ $sortBy == 'latest' ? 'selected' : '' }}>Recently Added</option>
                                <option
                                    value="{{ route('propertyPage', ['sort' => 'lowest_sale_price', 'property_type' => request('budget')]) }}"
                                    {{ $sortBy == 'lowest_sale_price' ? 'selected' : '' }}>Lowest Sale Price</option>
                                <option
                                    value="{{ route('propertyPage', ['sort' => 'highest_sale_price', 'property_type' => request('budget')]) }}"
                                    {{ $sortBy == 'highest_sale_price' ? 'selected' : '' }}>Highest Sale Price</option>
                                <option
                                    value="{{ route('propertyPage', ['sort' => 'lowest_rent_price', 'property_type' => request('budget')]) }}"
                                    {{ $sortBy == 'lowest_rent_price' ? 'selected' : '' }}>Lowest Rent Price</option>
                                <option
                                    value="{{ route('propertyPage', ['sort' => 'highest_rent_price', 'property_type' => request('budget')]) }}"
                                    {{ $sortBy == 'highest_rent_price' ? 'selected' : '' }}>Highest Rent Price</option>
                            </select>

                        </div>
                    </div>

                    @if ($properties->isEmpty())
                        <p class="text-center text-xl font-semibold">No properties found matching your search criteria.</p>
                    @else
                        {{-- <div>
                            <h2 class="flex bg-white shadow-sm rounded-md border border-gray-300 p-2 text-xl font-semibold mb-2">Search Results :<p class="flex font-normal ml-2 text-base items-center ">(Found {{ $propertiesCount }} properties)</p></h2>
                        </div> --}}
                        @foreach ($properties as $property)
                            <div
                                class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row mb-4">
                                <!-- Property Image -->
                                <div class="md:w-1/2 overflow-hidden">
                                    <img src="{{ $property->property_photo }}" alt="Property Image"
                                        class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                                </div>

                                <!-- Property Details -->
                                <div class="md:w-1/2 p-6 flex flex-col">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex gap-4">
                                            <span
                                                class="bg-gray-200 flex items-center px-2 pb-[2.5px] w-fit rounded-full capitalize">{{ $property->property_type }}</span>
                                            @if ($property->status === 'for_sale')
                                                <span
                                                    class="bg-green-500 flex items-center text-white px-3 pb-[2px] rounded-full">Sale</span>
                                            @else
                                                <span
                                                    class="bg-orange-500 flex items-center text-white px-3 pb-[2px] rounded-full">Rent</span>
                                            @endif
                                        </div>
                                        {{-- {{$property}} --}}
                                        <div class="flex items-center gap-4">
                                            {{-- <a href="{{route('favourites.add',$property)}}">
                                                <ion-icon name="heart-outline" class="heart-icon text-xl"></ion-icon>
                                            </a> --}}

                                            <form action="{{ in_array($property->id, $favourites) ? route('favourites.remove', $property->id) : route('favourites.add', $property->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @if(in_array($property->id, $favourites))
                                                    <!-- Filled Heart if Favorited -->
                                                    <button type="submit" class="btn btn-success favorite-button">
                                                        <i class="ri-heart-3-fill text-2xl text-red-600"></i>
                                                    </button>
                                                @else
                                                    <!-- Outline Heart if Not Favorited -->
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="ri-heart-3-line text-2xl"></i>
                                                    </button>
                                                @endif
                                            </form>

                                            <a href="">
                                                <ion-icon name="share-outline"
                                                    class="cursor-pointer text-2xl"></ion-icon>
                                            </a>
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-semibold mb-4">{{ $property->property_title }}</h2>
                                    @if ($property->sale_price)
                                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs
                                            {{ formatPrice($property->sale_price) }}</p>
                                    @elseif ($property->rent_price)
                                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs
                                            {{ formatPrice($property->rent_price) }}/month</p>
                                    @endif

                                    <p class="text-gray-600 mb-4 flex font-semibold items-center"><ion-icon name="map"
                                            class="mr-2"></ion-icon>{{ $property->address_area }},
                                        {{ $property->district?->district_en }}</p>

                                    <span class="text-gray-700 mb-4 flex font-semibold items-center"><ion-icon name="calendar"
                                        class="mr-2"></ion-icon>Posted On: {{$property->created_at->toFormattedDateString()}}</span>

                                    <ul class="text-gray-600 flex gap-6 mb-7 items-center">
                                        <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                name="bed"></ion-icon>Bedrooms: {{ $property->bedrooms }}</li>
                                        <li class="flex items-center font-semibold"><ion-icon
                                                name="water"></ion-icon>Bathrooms: {{ $property->bathrooms }}</li>
                                        <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                name="home"></ion-icon>Floors: {{ $property->no_of_floors }}</li>
                                    </ul>


                                    <div class="flex justify-between items-center">
                                        <a href="tel:+1234567890"
                                            class="bg-green-500 font-semibold py-[5.5px] text-white pl-2 pr-3 rounded-lg flex items-center gap-1 transition-transform hover:scale-105">
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
                        <!-- Pagination Links -->
                        <div class="mt-6 flex justify-center items-center space-x-2">
                            {{ $properties->onEachSide(1)->links('pages.pagination') }}
                        </div>

                    @endif
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

                    <a href="{{ route('propertyPage') }}"
                        class="bg-white text-orange-500 py-3 px-4 flex items-center justify-center hover:bg-gray-800 hover:text-white transition-transform duration-200 hover:scale-105">
                        <span class="mr-2 font-semibold">Contact Us Today</span>
                        <ion-icon name="arrow-forward-outline" class="text-xl font-semibold"></ion-icon>
                    </a>
                </div>
            </div>
        </section>
    </body>

@endsection
