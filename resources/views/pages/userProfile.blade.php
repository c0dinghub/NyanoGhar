@extends('layouts.frontendLayout')
@section('addcontent')
    <div class="bg-gray-300">
        <div class="container1 mx-auto rounded-lg max-w-7xl">
            <div class="flex max-sm:flex-col w-full">
                <!-- Sidebar -->
                <div class="sm:w-1/4 rounded-lg bg-white mt-6 mb-6 sm:shadow-md max-sm:mb-4 sticky top-5 h-96">
                    <div class="flex flex-col items-center">
                        <div class="h-32 w-32 mt-3 mb-2">
                            <img class="h-full w-full object-cover border-[3px] border-green-500 rounded-full"
                                src="{{ $user->photo }}" alt="Profile Photo">
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">{{ $user->name }}</h4>
                    </div>
                    <div class="max-sm:w-full">
                        <ul class="items-center flex sm:flex-col max-sm:flex text-md max-sm:justify-center">
                            <li class="w-full border-y">
                                <a href="javascript:void(0);" onclick="showContent('my_profile', this)"
                                    class="flex w-full justify-center items-center gap-1 font-semibold px-4 py-2 text-gray-800 {{ request()->is('profile') ? 'text-green-600 font-semibold' : '' }} transition duration-300 ease-in sidebar-link">
                                    <ion-icon name="person"></ion-icon>My Profile
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="javascript:void(0);" onclick="showContent('my_properties', this)"
                                    class="flex w-full justify-center gap-1 items-center hover:text-green-600 font-semibold text-nowrap px-4 py-2 text-gray-800 {{ request()->is('properties') ? 'text-green-600  font-semibold' : '' }} transition duration-300 ease-in sidebar-link">
                                    <ion-icon name="business-outline"></ion-icon> My Properties
                                </a>
                            </li>
                            <li class="w-full border-y">
                                <a href="javascript:void(0); {{route('favourites.index')}}" onclick="showContent('my_favourites', this)"
                                    class="flex w-full justify-center gap-1 items-center hover:text-green-600 font-semibold px-4 py-2 text-gray-800 {{ request()->is('favourites') ? 'text-green-600   font-semibold' : '' }} transition duration-300 ease-in sidebar-link">
                                    <ion-icon name="heart-outline" class="text-lg font-extrabold"></ion-icon> My Favourites
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Social Media Links -->
                    <div class="social-media flex w-full h-16">
                        <ul class="flex justify-evenly w-full items-center">
                            <li>
                                @if ($user->facebook_url)
                                    <a href="{{ $user->facebook_url }}" target="_blank" rel="noopener noreferrer">
                                        <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                            src="{{ asset('assets/frontend/images/facebook.png') }}" alt="Facebook">
                                    </a>
                                @else
                                    <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                        src="{{ asset('assets/frontend/images/facebook.png') }}" alt="Facebook">
                                @endif
                            </li>
                            <li>
                                @if ($user->twitter_url)
                                    <a href="{{ $user->twitter_url }}" target="_blank" rel="noopener noreferrer">
                                        <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                            src="{{ asset('assets/frontend/images/twitter.png') }}" alt="Twitter">
                                    </a>
                                @else
                                    <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                        src="{{ asset('assets/frontend/images/twitter.png') }}" alt="Twitter">
                                @endif
                            </li>
                            <li>
                                @if ($user->whatsapp)
                                    <a href="{{ $user->whatsapp}}" target="_blank" rel="noopener noreferrer">
                                        <img class="h-9 bg-white rounded-xl cursor-pointer transition-transform hover:scale-110"
                                            src="{{ asset('assets/frontend/images/whatsapp.jpeg') }}" alt="Whatsapp">
                                    </a>
                                @else
                                    <img class="h-9 bg-white rounded-xl cursor-pointer transition-transform hover:scale-110"
                                        src="{{ asset('assets/frontend/images/whatsapp.jpeg') }}" alt="Whatsapp">
                                @endif
                            </li>
                            <li>
                                @if ($user->instagram_url)
                                    <a href="{{ $user->instagram_url }}" target="_blank" rel="noopener noreferrer">
                                        <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                            src="{{ asset('assets/frontend/images/instagram.png') }}" alt="Instagram">
                                    </a>
                                @else
                                    <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110"
                                        src="{{ asset('assets/frontend/images/instagram.png') }}" alt="Instagram">
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="w-3/4 bg-white my-6 p-6 rounded-lg shadow-md md:ml-6 max-sm:w-full">
                    <div id="my_profile" class="content-section">
                        <h2 class="text-2xl text-gray-800 font-semibold mb-6">My Profile</h2>
                        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-lg font-medium text-black">Full
                                        Name:</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $user->name) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-lg font-medium text-black">Email:</label>
                                    <input type="email" id="email" name="email"
                                        value="{{ old('email', $user->email) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-lg font-medium text-black">Phone:</label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ old('phone', $user->phone) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="date_of_birth" class="block text-lg font-medium text-black">Date of
                                        Birth:</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                        value="{{ old('date_of_birth', $user->date_of_birth) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('date_of_birth')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="address" class="block text-lg font-medium text-black">Address:</label>
                                    <input type="text" id="address" name="address"
                                        value="{{ old('address', $user->address) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="photo" class="block text-lg font-medium text-black">Profile
                                        Photo:</label>
                                    <input type="file" id="photo" name="photo"
                                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                                    @if ($user->photo)
                                        <div class="mt-2">
                                            <img src="{{ $user->photo }}" alt="Current Profile Photo"
                                                class="rounded-lg shadow-md w-32 h-32 object-cover">
                                            <p class="text-gray-600 mt-1">Current photo</p>
                                        </div>
                                    @endif

                                    @error('photo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div>
                                    <label for="facebook_url" class="block text-lg font-medium text-black">Facebook
                                        Url:</label>
                                    <input type="url" id="facebook_url" name="facebook_url"
                                        value="{{ old('facebook_url', $user->facebook_url) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('facebook_url')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="instagram_url" class="block text-lg font-medium text-black">Instagram
                                        Url:</label>
                                    <input type="url" id="instagram_url" name="instagram_url"
                                        value="{{ old('instagram_url', $user->instagram_url) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('instagram_url')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="whatsapp" class="block text-lg font-medium text-black">Whatsapp
                                        :</label>
                                    <input type="number" id="whatsapp" name="whatsapp"
                                        value="{{ old('whatsapp', $user->whatsapp) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('whatsapp')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="twitter_url" class="block text-lg font-medium text-black">Twitter
                                        Url:</label>
                                    <input type="url" id="twitter_url" name="twitter_url"
                                        value="{{ old('twitter_url', $user->twitter_url) }}"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('twitter_url')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Save
                                Changes</button>
                        </form>
                    </div>

                    <div id="my_properties" class="content-section hidden">
                        <h2 class="text-2xl text-gray800 font-semibold mb-6">My Properties</h2>

                        <div class="card ">

                            @foreach ($properties as $property)
                                <div
                                    class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row ml-0 h-80 mb-4">
                                    <!-- Property Image -->
                                    <div class="md:w-1/2 overflow-hidden">
                                        <img src="{{ $property->property_photo }}" alt="Property Image"
                                            class="w-full h-80 object-cover transition-transform duration-500 hover:scale-110 cursor-pointer">
                                    </div>

                                    <!-- Property Details -->
                                    <div class="md:w-1/2 p-6 flex flex-col ">
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

                                            <div class="flex items-center gap-4">
                                                <!-- Toggle Favorite Form -->
                                                <form action="{{ route($favourites->contains($property->id) ? 'favourites.remove' : 'favourites.add', $property->id) }}" method="POST">
                                                    @csrf
                                                    @if($favourites->contains($property->id))
                                                        <!-- Filled Heart if Favorited -->
                                                        <button type="submit" class="btn btn-success favorite-button" title="Remove from favourites">
                                                            <i class="ri-heart-3-fill text-2xl text-red-600"></i>
                                                        </button>
                                                    @else
                                                        <!-- Outline Heart if Not Favorited -->
                                                        <button type="submit" class="btn btn-primary" title="Add to favourites">
                                                            <i class="ri-heart-3-line text-2xl"></i>
                                                        </button>
                                                    @endif
                                                </form>

                                                <!-- Share Icon -->
                                                <a href="#">
                                                    <ion-icon name="share-outline" class="cursor-pointer text-2xl"></ion-icon>
                                                </a>
                                            </div>
                                        </div>

                                        <h2 class="text-2xl font-semibold mb-4">{{ $property->property_title }}</h2>
                                        @if($property->sale_price)
                                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->sale_price) }}</p>
                                        @elseif ($property->rent_price)
                                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->rent_price) }}/month</p>
                                        @endif
                                        <p class="text-gray-600 font-semibold mb-4 flex items-center "><ion-icon
                                                name="map" class="mr-2  "></ion-icon> {{ $property->address_area }}, {{ $property->district?->district_en }}</p>

                                        <ul class=" text-gray-600 flex gap-6 mb-8 items-center ">
                                            <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                    name="bed"></ion-icon>Bedrooms: {{ $property->bedrooms }}</li>
                                            <li class="flex items-center font-semibold"><ion-icon
                                                    name="water"></ion-icon>Bathrooms: {{ $property->bathrooms }}</li>
                                            <li class="flex items-center gap-1 font-semibold"><ion-icon
                                                    name="home"></ion-icon>Floors: {{ $property->no_of_floors }}</li>
                                        </ul>

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('propertyDetail', ['id' => $property->id]) }}"
                                                class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105 ">
                                                <ion-icon name="eye"></ion-icon>View Details
                                            </a>
                                            <div class="flex gap-2">
                                                <!-- Show Edit Button Only if Authenticated User is the Owner -->
                                                @if (Auth::check() && Auth::id() === $property->user_id)
                                                    <a href="{{ route('property.edit', ['id' => $property->id]) }}"
                                                        class="bg-orange-500 h-8 font-semibold text-white py-1 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                                                        <ion-icon name="create-outline"></ion-icon>Edit
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('property.delete', ['id' => $property->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 h-8 font-semibold text-white py-1 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                                                            <ion-icon name="trash-outline"></ion-icon>Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                    <div id="my_favourites" class="content-section hidden">
                        <h2 class="text-2xl text-gray800 font-semibold mb-6">My Favourite Properties</h2>

                        <div class="card">
                            @foreach ($favourites as $property)
                            {{-- {{$property}} --}}
                                 <div class="md:w-full bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row ml-0 h-80 mb-4">
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

                                            <div class="flex items-center gap-4">
                                                <!-- Toggle Favorite Form -->
                                                <form action="{{ route($favourites->contains($property->id) ? 'favourites.remove' : 'favourites.add', $property->id) }}" method="POST">
                                                    @csrf
                                                    @if($favourites->contains($property->id))
                                                        <!-- Filled Heart if Favorited -->
                                                        <button type="submit" class="btn btn-success favorite-button" title="Remove from favourites">
                                                            <i class="ri-heart-3-fill text-2xl text-red-600"></i>
                                                        </button>
                                                    @else
                                                        <!-- Outline Heart if Not Favorited -->
                                                        <button type="submit" class="btn btn-primary" title="Add to favourites">
                                                            <i class="ri-heart-3-line text-2xl"></i>
                                                        </button>
                                                    @endif
                                                </form>

                                                <!-- Share Icon -->
                                                <a href="#">
                                                    <ion-icon name="share-outline" class="cursor-pointer text-2xl"></ion-icon>
                                                </a>
                                            </div>
                                        </div>

                                        <h2 class="text-2xl font-semibold mb-4">{{ $property->property_title }}</h2>
                                        @if($property->sale_price)
                                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->sale_price) }}</p>
                                        @elseif ($property->rent_price)
                                            <p class="text-xl text-[#f5663b] font-semibold mb-2">Rs {{ formatPrice($property->rent_price) }}/month</p>
                                        @endif
                                        <p class="text-gray-600 font-semibold mb-4 flex items-center">
                                            <ion-icon name="map" class="mr-2"></ion-icon> {{ $property->address_area }}, {{ $property->district?->district_en }}
                                        </p>

                                        <ul class="text-gray-600 flex gap-6 mb-8 items-center">
                                            <li class="flex items-center gap-1 font-semibold"><ion-icon name="bed"></ion-icon>Bedrooms: {{ $property->bedrooms }}</li>
                                            <li class="flex items-center font-semibold"><ion-icon name="water"></ion-icon>Bathrooms: {{ $property->bathrooms }}</li>
                                            <li class="flex items-center gap-1 font-semibold"><ion-icon name="home"></ion-icon>Floors: {{ $property->no_of_floors }}</li>
                                        </ul>

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('propertyDetail', ['id' => $property->id]) }}"
                                               class="bg-blue-600 h-9 font-semibold text-white py-2 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                                                <ion-icon name="eye"></ion-icon>View Details
                                            </a>
                                            <div class="flex gap-2">
                                                @if (Auth::check() && Auth::id() === $property->user_id)
                                                    <a href="{{ route('property.edit', ['id' => $property->id]) }}"
                                                       class="bg-orange-500 h-8 font-semibold text-white py-1 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                                                        <ion-icon name="create-outline"></ion-icon>Edit
                                                    </a>
                                                    <form action="{{ route('property.delete', ['id' => $property->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 h-8 font-semibold text-white py-1 px-2 rounded-lg gap-1 flex items-center transition-transform hover:scale-105">
                                                            <ion-icon name="trash-outline"></ion-icon>Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showContent(section, element) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach((sec) => {
                sec.classList.add('hidden');
            });

            // Show the selected section
            const activeSection = document.getElementById(section);
            if (activeSection) {
                activeSection.classList.remove('hidden');
            }

            // Remove active class from all sidebar links
            const links = document.querySelectorAll('.sidebar-link');
            links.forEach((link) => {
                link.classList.remove('text-green-600', 'font-semibold');
                link.classList.add('text-gray-800');
            });

            // Add active class to the clicked link
            element.classList.add('text-green-600', 'font-semibold');
            element.classList.remove('text-gray-800');
        }

        document.addEventListener('DOMContentLoaded', () => {
            showContent('my_profile', document.querySelector(
            '[onclick*="my_profile"]')); // Default to showing My Profile section
        });

        // $(document).ready(function() {
        //     $('.my_favourites').on('click', function() {
        //         const url = $(this).data('url');
        //         window.location.href = url; // Redirect to the favorites page
        //     });
        // });
    </script>
@endsection
