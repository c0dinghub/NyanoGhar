@extends('layouts.frontendLayout')
@section('addcontent')
    <section class="py-8 bg-gray-50" id="service">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Our Main Services</h2>

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
                                Add Properties to sell, we can help you list your property and find the right buyer.
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
@endsection
