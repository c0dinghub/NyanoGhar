@extends('layouts.frontendLayout')
@section('addcontent')

    <body class="bg-gray-300 ">
        <div class="container mx-auto m-10 p-6 bg-white rounded-lg shadow-md max-w-4xl">
            <h1 class="text-2xl font-semibold mb-6">Add Property</h1>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form id="propertyForm" action="{{ route('storeProperty') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-lg font-medium text-black ">Property Title:</label>
                        <input type="text" id="property_title" name="property_title"
                            class="mt-1 block bg-gray-50 w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="status" class="block text-lg font-medium text-black">Status:</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full bg-gray-50  p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected>Select Status</option>
                            <option value="for_rent">For Rent</option>
                            <option value="for_sale">For Sale</option>
                        </select>
                    </div>
                </div>

                <!-- Conditional Fields -->
                <div id="rentFields" class="hidden mb-6">
                    <label for="rentPrice" class="block text-lg font-medium text-black">Monthly Rent Price:</label>
                    <div class="relative">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">NPR</span>
                        <input type="integer" id="rentPrice" name="rent_price" min="100"
                            class="bg-gray-50 pl-14 mt-1 block w-1/2 h-9 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div id="saleFields" class="hidden mb-6">
                    <label for="salePrice" class="block text-lg font-medium text-black">Sale Price:</label>
                    <div class="relative">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">NPR</span>
                        <input type="integer" id="salePrice" name="sale_price" min="100"
                            class="bg-gray-50 pl-14 mt-1 block w-1/2 h-9 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Common Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="property_type" class="block text-lg font-medium text-black">Property Type:</label>
                        <select id="property_type" name="property_type"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected>Select Property Type</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="villa">Villa</option>
                            <option value="bungalow">Bungalow</option>
                        </select>
                    </div>

                    <div>
                        <label for="area" class="block text-lg font-medium text-black">Area (sq ft):</label>
                        <input type="number" min="0" id="property_area" name="property_area"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="bedrooms" class="block text-lg font-medium text-black"> Bedrooms:</label>
                        <input type="number" min="0" id="bedrooms" name="bedrooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>


                    <div>
                        <label for="bathrooms" class="block text-lg font-medium text-black"> Bathrooms:</label>
                        <input type="number" min="0" id="bathrooms" name="bathrooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>



                    <div>
                        <label for="hall_rooms" class="block text-lg font-medium text-black"> Hall Rooms:</label>
                        <input type="number" min="0" id="hall_rooms" name="hall_rooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="total_rooms" class="block text-lg font-medium text-black"> Total Rooms:</label>
                        <input type="number" min="0" id="total_rooms" name="total_rooms"
                            class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="house_facing" class="block text-lg font-medium text-black">House Facing:</label>
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
                        <label for="number_of_floors" class="block text-lg font-medium text-black">Number of
                            Floors:</label>
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

                <div class="mb-6">
                    <label for="amenities" class="mb-6 block text-lg font-medium text-black">Property Location:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                        <!-- Province Dropdown -->
                        <div>
                            <label for="province" class="block text-lg font-medium text-black">Province:</label>
                            <select id="province_id" name="province_id"
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
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
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

                <!-- Include Ajax-->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        // Fetch districts when a province is selected
                        $('#province').change(function () {
                            var provinceId = $(this).val();
                            $('#district').html('<option value="">-- Select District --</option>'); // Clear district dropdown
                            $('#local_body').html('<option value="">-- Select Local Body --</option>'); // Clear local body dropdown

                            if (provinceId) {
                                $.ajax({
                                    url: '/get-districts/' + provinceId,
                                    type: 'GET',
                                    success: function (data) {
                                        $.each(data, function (key, district) {
                                            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                                        });
                                    }
                                });
                            }
                        });

                        // Fetch local bodies when a district is selected
                        $('#district').change(function () {
                            var districtId = $(this).val();
                            $('#local_body').html('<option value="">-- Select Local Body --</option>'); // Clear local body dropdown

                            if (districtId) {
                                $.ajax({
                                    url: '/get-local-bodies/' + districtId,
                                    type: 'GET',
                                    success: function (data) {
                                        $.each(data, function (key, localBody) {
                                            $('#local_body').append('<option value="' + localBody.id + '">' + localBody.name + '</option>');
                                        });
                                    }
                                });
                            }
                        });
                    });
                </script>





                <!-- Amenities -->
                <div class="mb-6">
                    <label for="amenities" class="block text-lg font-medium text-black">Amenities:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
                        <label for="car_parking" class="block text-lg font-medium text-black">Car Parking Spaces:</label>
                        <input type="number" id="car_parking" name="car_parking_spaces" min="0" value="0"
                            class="mt-1 block w-full bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Bike Parking Spaces -->
                    <div>
                        <label for="bike_parking" class="block text-lg font-medium text-black">Bike Parking
                            Spaces:</label>
                        <input type="number" id="bike_parking" name="bike_parking_spaces" min="0"
                            value="0"
                            class="mt-1 block w-full bg-gray-50 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label for="image" class="block text-lg font-medium text-black">Upload Images:</label>
                        <input type="file" id="image" name="property_photo" accept="image/*"
                            class="bg-gray-50 mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <small class="text-gray-500">Multiple images can also be uploaded at once.</small>
                    </div>

                    <div>
                        <label for="video" class="block text-lg font-medium text-black">Property Video:</label>
                        <input type="file" id="video" name="property_video" accept="video/*"
                            class="bg-gray-50 mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <small class="text-gray-500">Upload a video tour of the property (optional).</small>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-lg font-medium text-black">Description:</label>
                    <textarea id="description" name="description" rows="5"
                        class="bg-gray-50 mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">Submit
                        Property</button>
                </div>
            </form>
        </div>
    </body>

    <script>
        // Show/hide rent or sale fields based on selected status
        document.getElementById('status').addEventListener('change', function() {
            var rentFields = document.getElementById('rentFields');
            var saleFields = document.getElementById('saleFields');
            if (this.value === 'for_rent') {
                rentFields.classList.remove('hidden');
                saleFields.classList.add('hidden');
            } else if (this.value === 'for_sale') {
                saleFields.classList.remove('hidden');
                rentFields.classList.add('hidden');
            } else {
                rentFields.classList.add('hidden');
                saleFields.classList.add('hidden');
            }
        });
    </script>
@endsection
