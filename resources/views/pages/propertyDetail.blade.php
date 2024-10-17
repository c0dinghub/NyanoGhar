@extends('layouts.frontendLayout')
@section('addcontent')

    <body class="bg-gray-200">
        <div class="container1 w-full py-6 px-8">
            <div class="flex flex-row md:flex-row ">

                <div class="relative card overflow-hidden bg-white rounded-lg w-full">
                    <div class="flex justify-between px-6 py-2">
                        <div class=" items-center">
                            <h2 class="text-2xl font-semibold">Bungalow House for Sale</h2>
                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs 12 Cr</p>
                            <span class="bg-gray-200  px-2 pb-1 w-fit rounded-full ">House</span>
                        </div>
                        <div class="flex  justify-end flex-col  ">
                            <p class="text-gray-600 flex items-center "><ion-icon name="map" class="mr-2"></ion-icon>
                                Hattigaudi, Kathmandu</p>
                            <span>Posted On: 29 Feb 29, 2024</span>
                        </div>
                    </div>
                    <!-- Slider Images -->
                    <div class="relative w-full m-auto">
                        <!-- Carousel wrapper -->
                        <div id="carousel" class="overflow-hidden relative h-[400px] bg-gray-100">
                            <!-- Carousel items -->
                            <div class="absolute w-full h-full transition-transform duration-700 ease-in-out" id="carousel-items">
                                <!-- Item 1 -->
                                <div class="carousel-item float-left w-full h-full">
                                    <img src="{{ $property->property_photo }}" class="w-full h-full object-contain" alt="image 1">
                                </div>
                                {{-- <!-- Item 2 -->
                                <div class="carousel-item float-left w-full h-full hidden">
                                    <img src="{{ asset('assets/frontend/images/house1.1.jpg') }}" class="w-full h-full object-contain" alt="image 2">
                                </div>
                                <!-- Item 3 -->
                                <div class="carousel-item float-left w-full h-full hidden">
                                    <img src="{{ asset('assets/frontend/images/house1.2.jpg') }}" class="w-full h-full object-contain" alt="image 3">
                                </div> --}}
                                <!-- Additional Items as needed -->
                            </div>
                        </div>

                        <!-- Indicators -->
                        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                            <button class="w-3 h-3 rounded-full bg-gray-400 focus:outline-none" onclick="goToSlide(0)"></button>
                            <button class="w-3 h-3 rounded-full bg-gray-400 focus:outline-none" onclick="goToSlide(1)"></button>
                            <button class="w-3 h-3 rounded-full bg-gray-400 focus:outline-none" onclick="goToSlide(2)"></button>
                        </div>

                        <!-- Slider controls -->
                        <button class="absolute top-0 left-0 z-30 h-full flex items-center justify-center" onclick="prevSlide()">
                            <span class="inline-flex justify-center items-center w-8 h-8 bg-white rounded-full">
                                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <button class="absolute top-0 right-0 z-30 h-full flex items-center justify-center" onclick="nextSlide()">
                            <span class="inline-flex justify-center items-center w-8 h-8 bg-white rounded-full">
                                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <script>
                        let currentSlide = 0;
                        const slides = document.querySelectorAll('.carousel-item');

                        function showSlide(index) {
                            slides.forEach((slide, i) => {
                                slide.classList.add('hidden');
                                if (i === index) {
                                    slide.classList.remove('hidden');
                                }
                            });
                        }

                        function nextSlide() {
                            currentSlide = (currentSlide + 1) % slides.length;
                            showSlide(currentSlide);
                        }

                        function prevSlide() {
                            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                            showSlide(currentSlide);
                        }

                        function goToSlide(index) {
                            currentSlide = index;
                            showSlide(currentSlide);
                        }

                        // Auto-slide every 5 seconds (optional)
                        setInterval(nextSlide, 5000);
                    </script>


                </div>
            </div>
            <div
                class="flex text-xl underline gap-20 border-t-2 border-orange-600 py-2 mt-4 bg-white  font-semibold text-orange-600 justify-center">
                <a href="#Overiew" class="hover:text-orange-500">Overview</a>
                <a href="#Description" class="hover:text-orange-500">Description</a>
                <a href="#Amenities" class="hover:text-orange-500">Amenities</a>
            </div>

            {{-- Overview --}}
            <div id="Overview" class="p-6 uppercase  bg-white mt-4 text-gray-900">
                <h1 class="mb-6 pb-2 font-semibold text-lg text-center border-b-2">Overview</h1>
                <ul class=" p-2 justify-evenly grid grid-cols-6 gap-4 ">
                    <li
                        class=" flex justify-center bg-gray-300 py-6 rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center me-2 text-4xl"><ion-icon name="compass-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Facing:</h4>
                            <span class=" flex items-center text-md font-semibold">{{ $property->house_facing }}</span>
                        </div>
                    </li>
                    <li
                        class="flex justify-center bg-gray-300 items-center rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center me-2 text-4xl"><ion-icon name="home-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Floor:</h4>
                            <span class=" flex items-center text-md font-semibold"> {{$property->no_of_floors}}</span>
                        </div>
                    </li>
                    <li
                        class="flex justify-center bg-gray-300 items-center rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center me-2 text-4xl"><ion-icon name="bed-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Bedrooms:</h4>
                            <span class=" flex items-center text-md font-semibold"> {{$property->bedrooms}}</span>
                        </div>
                    </li>
                    <li
                        class="flex justify-center bg-gray-300 items-center rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center text-4xl"><ion-icon name="water-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Bathrooms:</h4>
                            <span class=" flex items-center text-md font-semibold"> {{$property->bathrooms}}</span>
                        </div>
                    </li>
                    <li
                        class="flex justify-center bg-gray-300 items-center rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center me-2 text-4xl"><ion-icon
                                name="car-sport-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Parking:</h4>
                            <div class="flex gap-1">
                                <span class=" flex items-center text-md font-semibold">Car: {{$property->car_parking_spaces}}</span>
                                <span class=" flex items-center text-md font-semibold">Bike: {{$property->bike_parking_spaces}}</span>
                            </div>
                        </div>
                    </li>
                    <li
                        class="flex justify-center bg-gray-300 items-center rounded-md hover:bg-orange-500 cursor-pointer hover:text-white transform transition duration-500 ease-in-out">
                        <span class="flex items-center me-2 text-4xl"><ion-icon name="cube-outline"></ion-icon></span>
                        <div class="flex flex-col items-center font-semibold">
                            <h4>Furnish:</h4>
                            <span class=" flex items-center text-md font-semibold">Semi-furnish</span>
                        </div>
                    </li>
                </ul>

            </div>

            <div class=" bg-white mt-4 rounded-md text-gray-900">
                {{-- Description --}}
                <div id="Description" class="p-6 font-semibold">
                    <h1 class="mb-6 font-semibold uppercase text-black text-lg text-center pb-2 border-b-2">Description
                    </h1>
                    <ul class="grid grid-cols-2 ">
                        <li class="flex items-center"><ion-icon name="arrow-forward" class="py-4 me-2"></ion-icon>A 2.5
                            storied House with 16 aana of land is for sale.</li>
                        <li class="flex items-center"><ion-icon name="arrow-forward" class="me-2"></ion-icon>Boring
                            water facilities and it has a connected drinking water line as well.</li>
                        <li class="flex items-center"><ion-icon name="arrow-forward" class="me-2"></ion-icon>This
                            property faces East and has a 16 feet road access.</li>
                        <li class="flex items-center"><ion-icon name="arrow-forward" class="me-2"></ion-icon>Please
                            click at call button to directly contact the seller.</li>
                    </ul>
                </div>

                <div id="Amenities" class=" mt-4 p-6">
                    <h1 class="mb-6 font-semibold uppercase text-lg text-center border-b-2 pb-4">Amenities</h1>

                    <div class="flex flex-wrap mt-4 text-white font-semibold justify-evenly">
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="bed" class="text-3xl"></ion-icon>
                            <p>Bedrooms</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="water" class="text-3xl"></ion-icon>
                            <p>Bathrooms</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="car-sport" class="text-3xl"></ion-icon>
                            <p>Parking</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="home" class="text-3xl"></ion-icon>
                            <p>Floor</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="rose" class="text-3xl"></ion-icon>
                            <p>Garden</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out w-[112px]">
                            <ion-icon name="videocam" class="text-3xl"></ion-icon>
                            <p>CCTV</p>
                        </div>
                        <div
                            class="flex flex-col items-center p-6 rounded-lg border border-orange-500 bg-orange-500 hover:bg-gray-300 hover:text-orange-500 cursor-pointer transform transition duration-500 ease-in-out  w-[112px]">
                            <ion-icon name="shield-checkmark" class="text-3xl"></ion-icon>
                            <p>Security</p>
                        </div>

                    </div>


                </div>
            </div>

            {{-- <div id="Reviews" class="bg-white mt-4 rounded-lg">
                <div class="header font-semibold uppercase text-lg text-center border-b-2 pb-4 mt-6">
                    <h2>Reviews</h2>
                </div>
                <div class="review-body mb-6">
                    <div class="grid grid-cols-3 p-6 bg-gray-30 mt-4 ml-6 mr-6 rounded-lg">
                        <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
                            <!-- User Information -->
                            <div class="flex items-center">
                                <img class="w-12 h-12 object-cover rounded-full" src="https://i.pravatar.cc/300" alt="User Avatar">
                                <div class="ml-3">
                                    <h2 class="text-gray-900 font-bold">John</h2>
                                    <p class="text-gray-600 text-sm">3 days ago</p>
                                </div>
                            </div>

                            <!-- Review Content -->
                            <div class="mt-4">
                                <p class="text-gray-700">
                                    This is a fantastic pr! I've been using it for a while now and it has exceeded my expectations.
                                    Great customer support as well!
                                </p>
                            </div>

                            <!-- Rating Stars -->
                            <div class="flex items-center mt-4">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.09 3.368a1 1 0 00.95.691h3.516c.969 0 1.372 1.24.588 1.81l-2.853 2.074a1 1 0 00-.364 1.118l1.09 3.368c.3.921-.755 1.688-1.54 1.118L10 13.011l-2.853 2.074c-.784.57-1.838-.197-1.54-1.118l1.09-3.368a1 1 0 00-.364-1.118L3.48 8.796c-.784-.57-.38-1.81.588-1.81h3.516a1 1 0 00.95-.691l1.09-3.368z" />
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.09 3.368a1 1 0 00.95.691h3.516c.969 0 1.372 1.24.588 1.81l-2.853 2.074a1 1 0 00-.364 1.118l1.09 3.368c.3.921-.755 1.688-1.54 1.118L10 13.011l-2.853 2.074c-.784.57-1.838-.197-1.54-1.118l1.09-3.368a1 1 0 00-.364-1.118L3.48 8.796c-.784-.57-.38-1.81.588-1.81h3.516a1 1 0 00.95-.691l1.09-3.368z" />
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.09 3.368a1 1 0 00.95.691h3.516c.969 0 1.372 1.24.588 1.81l-2.853 2.074a1 1 0 00-.364 1.118l1.09 3.368c.3.921-.755 1.688-1.54 1.118L10 13.011l-2.853 2.074c-.784.57-1.838-.197-1.54-1.118l1.09-3.368a1 1 0 00-.364-1.118L3.48 8.796c-.784-.57-.38-1.81.588-1.81h3.516a1 1 0 00.95-.691l1.09-3.368z" />
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.09 3.368a1 1 0 00.95.691h3.516c.969 0 1.372 1.24.588 1.81l-2.853 2.074a1 1 0 00-.364 1.118l1.09 3.368c.3.921-.755 1.688-1.54 1.118L10 13.011l-2.853 2.074c-.784.57-1.838-.197-1.54-1.118l1.09-3.368a1 1 0 00-.364-1.118L3.48 8.796c-.784-.57-.38-1.81.588-1.81h3.516a1 1 0 00.95-.691l1.09-3.368z" />
                                </svg>
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.09 3.368a1 1 0 00.95.691h3.516c.969 0 1.372 1.24.588 1.81l-2.853 2.074a1 1 0 00-.364 1.118l1.09 3.368c.3.921-.755 1.688-1.54 1.118L10 13.011l-2.853 2.074c-.784.57-1.838-.197-1.54-1.118l1.09-3.368a1 1 0 00-.364-1.118L3.48 8.796c-.784-.57-.38-1.81.588-1.81h3.516a1 1 0 00.95-.691l1.09-3.368z" />
                                </svg>
                            </div>

                            <!-- Overall Rating -->
                            <div class="mt-2">
                                <span class="text-gray-900 font-bold text-lg">4.0/5</span>
                            </div>
                        </div>
                    </div>

                </div>



            </div> --}}



        </div>



    </body>

@endsection
