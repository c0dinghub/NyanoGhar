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
                        <form action="{{ route('propertyPage') }}" method="GET" class="grid grid-cols-[repeat(4,1fr),80px]">
                            <!-- Location Input -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Location</label> --}}
                                <input type="text" placeholder="Enter location..." name="location"
                                    class="w-full border border-gray-300 rounded-l-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Location">
                            </div>

                            <!-- Purpose Dropdown -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Purpose</label> --}}
                                <select
                                    class="flex w-full border border-gray-300  shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Purpose" id="status" name="status">
                                    <option value="">Select Purpose</option>
                                    <option value="for_sale">To Buy</option>
                                    <option value="for_rent">To Rent</option>
                                </select>
                            </div>

                            <!-- Property Type Dropdown -->
                            <div class="relative">
                                {{-- <label class="block text-sm font-medium text-gray-700 mb-1">Property Type</label> --}}
                                <select
                                    class="flex w-full border border-gray-300  shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 "
                                    aria-label="Property Type">
                                    <option value="">Select Property</option>
                                    {{-- <option value="bungalow">Bungalow</option>
                                    <option value="apartment">Villa</option> --}}
                                    <option value="apartment">Apartment</option>
                                    <option value="house">House</option>
                                </select>
                            </div>
                            <!-- Budget Dropdown -->
                            <div class="relative">
                                <select id="budget" name="budget"
                                    class="flex w-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out"
                                    aria-label="Budget">
                                    <!-- Default budget options can be shown here -->
                                    <option value="">Select Budget</option>
                                </select>
                            </div>

                            <!-- Search Button -->
                            <div class="flex  items-center">
                                <button
                                    class="flex w-full justify-center items-center h-10 bg-blue-600 text-white font-semibold rounded-full shadow-lg hover:bg-blue-700 "
                                    aria-label="Search">
                                    Search
                                </button>
                            </div>
                        </form>
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
                            <a href="{{ route('propertyPage') }}"
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
                            <a href="{{ route('propertyPage') }}"
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Property 1 -->
                        @foreach ($properties as $property)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden  ">
                                <div class="md:w-full overflow-hidden">
                                    <img src="{{ $property->property_photo }}" alt="Property Image"
                                        class="w-full h-64  object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                                </div>
                                <div class="md:w-full p-6 flex flex-col ">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex gap-4  ">
                                            <span
                                                class="bg-gray-200 flex items-center px-3 pb-[2px] w-fit rounded-full  capitalize">{{ $property->property_type }}</span>

                                                @if ($property->status === 'for_sale')
                                                <span class="bg-green-500 flex items-center text-white px-3 pb-[2px] rounded-full">Sale</span>
                                            @else
                                                <span class="bg-orange-500 flex items-center text-white px-3 pb-[2px] rounded-full">Rent</span>
                                            @endif

                                        </div>
                                        <div class="flex items-center gap-4">
                                            <form action="{{ in_array($property->id, $favourites) ? route('favourites.remove', $property->id) : route('favourites.add', $property->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @if(in_array($property->id, $favourites))
                                                    <!-- Filled Heart if Favorited -->
                                                    <button type="submit" class=" btn btn-success favorite-button" title="Remove from favourites">
                                                        <i class=" ri-heart-3-fill text-2xl text-red-600"></i>
                                                    </button>
                                                @else
                                                    <!-- Outline Heart if Not Favorited -->
                                                    <button type="submit" class="btn btn-primary" title="Add to favourites">
                                                        <i class="ri-heart-3-line text-2xl"></i>
                                                    </button>
                                                @endif
                                            </form>

                                             <!-- Share Icon -->
                                             <a href="javascript:void(0);" onclick="openShareModal({{ $property->id }})">
                                                <ion-icon name="share-outline" class="cursor-pointer text-2xl"></ion-icon>
                                            </a>

                                            <!-- Modal HTML -->
                                            <div id="shareModal-{{ $property->id }}" class="fixed inset-0 flex items-center justify-center hidden z-50 bg-gray-800 bg-opacity-50">
                                                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                                                    <h3 class="text-lg font-semibold mb-4">Share this Property</h3>

                                                    <div class="flex justify-around space-x-4 ">
                                                        <div class="flex flex-col items-center transition-transform hover:scale-110">
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
                                                                <i class="ri-facebook-circle-fill text-3xl text-blue-700 "></i>
                                                            </a>
                                                            <span class="text-sm mt-2">Facebook</span>
                                                        </div>

                                                        <div class="flex flex-col items-center transition-transform hover:scale-110">
                                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank">
                                                                <i class="ri-twitter-x-line text-3xl text-black"></i>
                                                            </a>
                                                            <span class="text-sm mt-2">Twitter</span>
                                                        </div>

                                                        <div class="flex flex-col items-center transition-transform hover:scale-110">
                                                            <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank">
                                                                <i class="ri-whatsapp-fill text-3xl text-green-700"></i>
                                                            </a>
                                                            <span class="text-sm mt-2">WhatsApp</span>
                                                        </div>

                                                        <div class="flex flex-col items-center transition-transform hover:scale-110">
                                                            <a href="mailto:?subject=Check out this property&body={{ request()->fullUrl() }}" target="_blank">
                                                                <i class="ri-mail-fill text-3xl text-red-600"></i>
                                                            </a>
                                                            <span class="text-sm mt-2">Email</span>
                                                        </div>

                                                        <div class="flex flex-col items-center transition-transform hover:scale-110">
                                                            <a href="javascript:void(0);" onclick="copyLink('{{ route('propertyDetail', $property->id) }}')">
                                                                <i class="ri-links-fill text-3xl text-gray-700"></i>
                                                            </a>
                                                            <span class="text-sm mt-2">Copy Link</span>
                                                        </div>
                                                    </div>


                                                    <button onclick="closeShareModal({{ $property->id }})" class="mt-4 bg-red-600 text-white px-3 py-[6px] rounded transition-transform hover:scale-105">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-semibold mb-4">{{ $property->property_title }}</h2>
                                    @if($property->sale_price)
                                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->sale_price) }}</p>
                                    @elseif ($property->rent_price)
                                        <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->rent_price) }}/month</p>
                                    @endif
                                    <p class="text-gray-600 mb-4 flex items-center font-semibold "><ion-icon name="map"
                                            class="mr-2"></ion-icon> {{ $property->address_area }}, {{ $property->district->district_en ?? '' }}</p>

                                    <ul class=" text-gray-600 flex gap-4 mb-8 items-center ">
                                        <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                name="bed"></ion-icon>Bedrooms: {{ $property->bedrooms }}</li>
                                        <li class="flex items-center font-semibold"><ion-icon
                                                name="water"></ion-icon>Bathrooms: {{ $property->bathrooms }}</li>
                                        <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                name="home"></ion-icon>Floors: {{ $property->no_of_floors }}</li>
                                    </ul>

                                    <div class="flex justify-between items-center">
                                        <a href="tel:+1234567890"
                                            class="bg-green-500 font-semibold py-[6px] text-white pl-2 pr-3 rounded-lg flex items-center gap-1 transition-transform hover:scale-105 ">
                                            <ion-icon name="call"></ion-icon> Call
                                        </a>
                                        <a href="{{ route('propertyDetail', ['id' => $property->id]) }}"
                                            class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105 ">
                                            <ion-icon name="eye"></ion-icon>View Details
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <script>
                    function openShareModal(propertyId) {
                        document.getElementById(`shareModal-${propertyId}`).classList.remove('hidden');
                    }

                    function closeShareModal(propertyId) {
                        document.getElementById(`shareModal-${propertyId}`).classList.add('hidden');
                    }

                    function copyLink(link) {
                        navigator.clipboard.writeText(link).then(() => {
                            alert('Link copied to clipboard!');
                        }).catch(err => {
                            console.error('Could not copy text: ', err);
                        });
                    }
                </script>
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

                        <a href="{{ route('propertyPage') }}"
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
