@extends('layouts.frontendLayout')
@section('addcontent')

    <div class="bg-gray-300">
        <div class="container1 mx-auto  rounded-lg max-w-7xl">
            <div class="flex max-sm:flex-col w-full">
                <!-- Sidebar -->
                <div class=" sm:w-1/4 rounded-lg bg-white mt-6 sticky sm:shadow-md max-sm:mb-4  h-96">
                    <div class="flex flex-col items-center">
                        <div class="h-32 w-32 my-3">
                            <img class="h-full w-full object-cover border-[3px] border-green-500 rounded-full" src="{{ $user->photo }}" alt="Profile Photo">
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">{{ $user->name }}</h4>
                    </div>

                    <div class="max-sm:w-full">
                        <ul class="items-center flex sm:flex-col max-sm:flex text-md max-sm:justify-center">
                            <li class="w-full border-y">
                                <a href="{{ route('userProfile') }}"
                                   class="flex w-full justify-center font-semibold px-4 py-2 text-gray-800 {{ request()->is('profile') ? 'text-green-600  underline font-bold' : '' }} transition duration-300 ease-in">
                                    My Profile
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="{{ route('userProperties') }}"
                                   class="flex w-full justify-center font-semibold text-nowrap px-4 py-2 text-gray-800 {{ request()->is('properties') ? 'text-green-600  underline font-bold' : ''  }} transition duration-300 ease-in">
                                    My Properties
                                </a>
                            </li>
                            <li class="w-full border-y">
                                <a href="{{ route('userFavourites') }}"
                                   class="flex w-full justify-center font-semibold px-4 py-2 text-gray-800 {{ request()->is('favourites') ? 'text-green-600  underline font-bold' : ''  }} transition duration-300 ease-in">
                                    My Favourites
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="social-media flex w-full h-16">
                        <ul class="flex justify-evenly w-full items-center">
                            <li>
                                @if($user->facebook_url)
                                    <a href="{{ $user->facebook_url }}" target="_blank" rel="noopener noreferrer">
                                        <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/facebook.png') }}" alt="Facebook">
                                    </a>
                                @else
                                    <img class="h-8 bg-white rounded-lg cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/facebook.png') }}" alt="Facebook">
                                @endif
                            </li>
                            <li>
                                @if($user->twitter_url)
                                    <a href="{{ $user->twitter_url }}" target="_blank" rel="noopener noreferrer">
                                        <img id="twitter_url" class="h-8 cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/twitter.png') }}">
                                    </a>
                                @else
                                    <img id="twitter_url" class="h-8 cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/twitter.png') }}">
                                @endif
                            </li>
                            <li>
                                @if($user->linkedin_url)
                                    <a href="{{ $user->linkedin_url }}" target="_blank" rel="noopener noreferrer">
                                        <img id="linkedin_url" class="h-8 cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/linkedin.png') }}">
                                    </a>
                                @else
                                    <img id="linkedin_url" class="h-8 cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/linkedin.png') }}">
                                @endif
                            </li>
                            <li>
                                @if($user->instagram_url)
                                    <a href="{{ $user->instagram_url }}" target="_blank" rel="noopener noreferrer">
                                        <img id="instagram_url" class="h-8 bg-white cursor-pointer transition-transform hover:scale-110 rounded-lg" src="{{ asset('assets/frontend/images/instagram.png') }}">
                                    </a>
                                @else
                                    <img id="instagram_url" class="h-8 bg-white cursor-pointer transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/instagram.png') }}">
                                @endif
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- Main Content -->

                <div class="w-3/4 bg-white my-6 p-6 rounded-lg shadow-md md:ml-6 max-sm:w-full">
                    <h2 class="text-2xl font-semibold mb-6">My Profile</h2>
                    <!-- Profile Form -->
                    <form action={{ route('profile.update', $user) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-lg font-medium text-black">Full Name:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-lg font-medium text-black">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-lg font-medium text-black">Phone:</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
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
                                <label for="photo" class="block text-lg font-medium text-black">Profile Photo:</label>
                                <input type="file" id="photo" name="photo"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                                @if($user->photo)
                                    <div class="mt-2">
                                        <img src="{{ $user->photo }}" alt="Current Profile Photo" class="rounded-lg shadow-md w-32 h-32 object-cover">
                                        <p class="text-gray-600 mt-1">Current photo</p>
                                    </div>
                                @endif

                                @error('photo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                            <div>
                                <label for="facebook_url" class="block text-lg font-medium text-black">Facebook Url:</label>
                                <input type="url" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $user->facebook_url) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('facebook_url')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="instagram_url" class="block text-lg font-medium text-black">Instagram Url:</label>
                                <input type="url" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $user->instagram_url) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('instagram_url')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="linkedin_url" class="block text-lg font-medium text-black">LinkedIn Url:</label>
                                <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $user->linkedin_url) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('linkedin_url')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="twitter_url" class="block text-lg font-medium text-black">Twitter Url:</label>
                                <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $user->twitter_url) }}"
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
            </div>
        </div>
    </div>
@endsection
