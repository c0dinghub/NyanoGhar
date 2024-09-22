@extends('layouts.frontendLayout')

@section('addcontent')
    <main>
        <article>
            <!--
                    - #HERO
                    -->
            <section class="relative bg-cover bg-center"
                style="background-image: url('{{ asset('assets/frontend/images/pexels-binyaminmellish-186077.jpg') }}');">

                <div class=" flex flex-col items-center justify-center min-h-screen">
                    <div class="flex justify-center items-center mt-16">
                        <h2 class=" text-4xl font-bold text-white text-center">Find Your Dream Property</h2>

                    </div>

                    <div class="bg-white shadow-lg rounded-full max-w-5xl opacity-[.9] mt-6">
                        <div class="grid grid-cols-[repeat(4,1fr),80px] ">
                            <!-- Location Input -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Location</label> --}}
                                <input type="text" placeholder="Enter location..."
                                    class="w-full border border-gray-300 rounded-l-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Location">
                            </div>

                            <!-- Purpose Dropdown -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Purpose</label> --}}
                                <select
                                    class="flex w-full border border-gray-300  shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Purpose">
                                    <option value="">Select Purpose</option>
                                    <option value="buy">To Buy</option>
                                    <option value="rent">To Rent</option>
                                </select>
                            </div>

                            <!-- Property Type Dropdown -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Property Type</label> --}}
                                <select
                                    class="flex w-full border border-gray-300  shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 "
                                    aria-label="Property Type">
                                    <option value="">Select Property</option>
                                    <option value="bungalow">Bungalow</option>
                                    <option value="apartment">Villa</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="house">House</option>
                                </select>
                            </div>
                            <!-- Budget Dropdown -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Budget</label> --}}
                                <select
                                    class="flex w-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Budget">
                                    <option value="">Select Budget</option>
                                    <option value="under50k">Under Rs 50,000</option>
                                    <option value="50k-100k">Rs 50,000 - 1 Lakh</option>
                                    <option value="100k-200k">Rs 1 Lakh - 5</option>
                                    <option value="200k-500k">Rs 5 Lakh - 20</option>
                                    <option value="200k-500k">Rs 20 Lakh - 50</option>
                                    <option value="200k-500k">Rs 50 Lakh - 1 Cr</option>
                                    <option value="200k-500k">Rs 1 Cr - 2</option>
                                    <option value="above500k">Above Rs 3 Cr</option>
                                </select>
                            </div>
                            <!-- Search Button -->
                            <div class="flex  items-center">
                                <button
                                    class="flex w-full justify-center items-center h-10 bg-blue-500 text-white font-semibold rounded-full shadow-lg hover:bg-blue-600 "
                                    aria-label="Search">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            <!--
                    - #ABOUT
                    -->

            <section id="about_us" class=" bg-blue-50 py-8">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <!-- About Us Text -->
                        <div class="lg:w-1/2 lg:pr-8">
                            <h2 class="text-3xl font-bold mb-6 text-gray-800">About Us</h2>
                            <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                                At Nyano Ghar, we're passionate about connecting people with their perfect properties. This
                                website is committed to offering you a seamless real estate experience, whether you're
                                Buying, Selling, or Renting.
                            </p>

                            <a href="#"
                                class="bg-orange-500 text-white py-3 px-5 shadow-lg transition duration-300 ease-in  hover:border-b-4 hover:border-white">
                                Discover More
                            </a>
                        </div>

                        <!-- About Us Image -->
                        <div class="lg:w-1/2 mt-8 lg:mt-0 lg:ml-8">
                            <img src="{{ asset('assets/frontend/images/about-banner-2.jpg') }}" alt="About Us"
                                class="w-full h-auto rounded-lg shadow-xl transform hover:scale-105 transition-transform duration-500 cursor-pointer" />
                        </div>
                    </div>
                </div>
            </section>




            <!--
                    - #SERVICE
                    -->

            <section class="py-8 bg-gray-50" id="service">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Our Main Focus</h2>

                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <li>
                            <a href="{{ route('searchPage') }}"
                                class="relative bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105 hover:border-orange-500 hover:border-b-2 hover:border-opacity-100 h-[400px] flex flex-col justify-between border-b-2 border-transparent border-opacity-0 duration-300 ease-in-out">
                                <div class="mb-4 flex-grow">
                                    <img src="{{ asset('assets/frontend/images/service-1.png') }}" alt="Service icon"
                                        class="mx-auto h-36 w-36 object-contain" />
                                    <h3 class="text-xl font-semibold mb-2 text-orange-500 mt-4">
                                        Buy a home
                                    </h3>
                                    <p class="text-gray-700">
                                        Explore homes for sale available on the website, we can match you with a house you
                                        will want to call home.
                                    </p>
                                </div>
                                <span class="flex items-center justify-center text-orange-500 mt-4">
                                    <span class="mr-2 font-semibold">Find A Home</span>
                                    <ion-icon name="arrow-forward-outline" class="text-xl"></ion-icon>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('searchPage') }}"
                                class="relative bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105 hover:border-orange-500 hover:border-b-2 hover:border-opacity-100 h-[400px] flex flex-col justify-between border-b-2 border-transparent border-opacity-0 duration-300 ease-in-out">
                                <div class="mb-4 flex-grow">
                                    <img src="{{ asset('assets/frontend/images/service-2.png') }}" alt="Service icon"
                                        class="mx-auto h-36 w-36 object-contain" />
                                    <h3 class="text-xl font-semibold mb-2 text-orange-500 mt-4">
                                        Rent a home
                                    </h3>
                                    <p class="text-gray-700">
                                        Explore homes for rent available on the website, we can match you with a rental you
                                        will want to call home.
                                    </p>
                                </div>
                                <span class="flex items-center justify-center text-orange-500 mt-4">
                                    <span class="mr-2 font-semibold">Find A Rental</span>
                                    <ion-icon name="arrow-forward-outline" class="text-xl"></ion-icon>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('addProperty') }}"
                                class="relative bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105 hover:border-orange-500 hover:border-b-2 hover:border-opacity-100 h-[400px] flex flex-col justify-between border-b-2 border-transparent border-opacity-0  duration-300 ease-in-out">
                                <div class="mb-4 flex-grow">
                                    <img src="{{ asset('assets/frontend/images/service-3.png') }}" alt="Service icon"
                                        class="mx-auto h-36 w-36 object-contain" />
                                    <h3 class="text-xl font-semibold mb-2 text-orange-500 mt-4">
                                        Sell a home
                                    </h3>
                                    <p class="text-gray-700">
                                        Explore homes to sell, we can help you list your property and find the right buyer.
                                    </p>
                                </div>
                                <span class="flex items-center justify-center text-orange-500  mt-4">
                                    <span class="mr-2 font-semibold">List A Property</span>
                                    <ion-icon name="arrow-forward-outline" class="text-xl"></ion-icon>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>



            <!--
                    - #FEATURES
                    -->

            <section class="featured-listings bg-gray-100 py-8">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Featured Listings</h2>
                        <p class="text-lg text-gray-600">Explore some of our top properties that are currently available.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Property 1 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/house2.jpg') }}" alt="Property 1"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-800 mb-2">House for Sale</h3>
                                <p class="text-gray-600 mb-4">4 Beds · 3 Baths · 1,200 sq ft</p>
                                <p class="text-gray-800 font-bold text-xl mb-2">Rs 4 Cr</p>

                                <div class="flex justify-end">
                                    <a href="{{ route('propertyDetail') }}"
                                        class="flex bg-blue-600 h-9 font-semibold text-white py-2  w-32 px-2 rounded-lg gap-1  items-center hover:bg-blue-700 transition-colors">
                                        <ion-icon name="eye"></ion-icon>View Details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Property 2 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/house1.jpg') }}" alt="Property 2"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6 flex flex-col">
                                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Bungalow House for Sale</h3>
                                <p class="text-gray-600 mb-4">7 Beds · 2 Baths · 2,500 sq ft</p>
                                <p class="text-gray-800 font-bold text-xl mb-2">Rs 12 Cr</p>

                                <div class="flex justify-end">
                                    <a href="{{ route('propertyDetail') }}"
                                        class="flex bg-blue-600 h-9 font-semibold text-white py-2  w-32 px-2 rounded-lg gap-1  items-center hover:bg-blue-700 transition-colors">
                                        <ion-icon name="eye"></ion-icon>View Details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Property 3 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/house3.jpg') }}" alt="Property 3"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-800 mb-2">House for Rent</h3>
                                <p class="text-gray-600 mb-4">5 Beds · 2 Baths · 1,800 sq ft</p>
                                <p class="text-gray-800 font-bold text-xl mb-2">Rs 1 Lakh/month</p>

                                <div class="flex justify-end">
                                    <a href="{{ route('propertyDetail') }}"
                                        class="flex bg-blue-600 h-9 font-semibold text-white py-2  w-32 px-2 rounded-lg gap-1  items-center hover:bg-blue-700 transition-colors">
                                        <ion-icon name="eye"></ion-icon>View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!--
                    - #BLOG
                    -->
            <section class="bg-gray-50 py-8" id="blog">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">News & Blogs</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Blog 1 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/blog-1.png') }}"
                                alt="The Most Inspiring Interior Design Of 2021"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6">
                                <div class="mb-4 flex items-center space-x-4 text-gray-600 text-sm">
                                    <span><ion-icon name="person-outline"></ion-icon> By: Admin</span>
                                    <span><ion-icon name="pricetags-outline"></ion-icon> Interior</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                    <a href="#">The Most Inspiring Interior Design Of 2021</a>
                                </h3>
                                <div class="flex justify-between items-center text-gray-500 text-sm">
                                    <time datetime="2022-04-27">Apr 27, 2022</time>
                                    <a href="#" class="text-orange-500 hover:underline">Read More...</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog 2 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/blog-2.jpg') }}"
                                alt="Recent Commercial Real Estate Transactions"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6">
                                <div class="mb-4 flex items-center space-x-4 text-gray-600 text-sm">
                                    <span><ion-icon name="person-outline"></ion-icon> By: Admin</span>
                                    <span><ion-icon name="pricetags-outline"></ion-icon> Estate</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                    <a href="#">Recent Commercial Real Estate Transactions</a>
                                </h3>
                                <div class="flex justify-between items-center text-gray-500 text-sm">
                                    <time datetime="2022-04-27">Apr 27, 2022</time>
                                    <a href="#" class="text-orange-500 hover:underline">Read More...</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog 3 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('assets/frontend/images/blog-3.jpg') }}"
                                alt="Renovating a Living Room? Experts Share Their Secrets"
                                class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer" />
                            <div class="p-6">
                                <div class="mb-4 flex items-center space-x-4 text-gray-600 text-sm">
                                    <span><ion-icon name="person-outline"></ion-icon> By: Admin</span>
                                    <span><ion-icon name="pricetags-outline"></ion-icon> Room</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                    <a href="#">Renovating a Living Room? Experts Share Their Secrets</a>
                                </h3>
                                <div class="flex justify-between items-center text-gray-500 text-sm">
                                    <time datetime="2022-04-27">Apr 27, 2022</time>
                                    <a href="#" class="text-orange-500 hover:underline">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <!--
                    - #CTA
                    -->

            <section class=" py-6 bg-gray-100">
                <div class="container1 mx-auto px-4 h-32">
                    <div class="bg-orange-500 shadow-lg flex items-center p-10 justify-between text-center h-full">
                        <div class="ml-10 ">
                            <h2 class="text-3xl font-semibold text-white mb-2">Looking for a dream home?</h2>
                            <p class="text-white font-semibold text-lg">We can help you realize your dream of a new home.
                            </p>
                        </div>

                        <a href="{{ route('searchPage') }}"
                            class="bg-white text-orange-500 py-3 px-4 flex items-center justify-center hover:bg-gray-800 hover:text-white transition-transform duration-200 hover:scale-105">
                            <span class="mr-2  font-semibold">Explore Properties</span>
                            <ion-icon name="arrow-forward-outline" class="text-xl font-semibold"></ion-icon>
                        </a>
                    </div>
                </div>
            </section>

        </article>
    </main>
@endsection
