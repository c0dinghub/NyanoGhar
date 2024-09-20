@extends('layouts.frontendLayout')
@section('addcontent')

    <body class="bg-gray-100">
        <div class="container1 mx-auto my-5 bg-gray-100 rounded-lg shadow-md max-w-6xl">
            <div class="flex max-sm:flex-col w-full">
                <!-- Sidebar -->
                <div class=" sm:w-1/4 sm:bg-white p- rounded-lg sm:shadow-md max-sm:mb-4">
                    <div class="flex flex-col items-center mb-4 bg-green-600 rounded-t-lg">
                        <div class= "h-32 w-32 my-3 ">
                            <img class="h-full w-full object-cover rounded-full" src="{{$user->photo}}"
                                alt="user image">
                            </div>
                            <h4 class="font-semibold text-white mb-1">{{$user->name}}</h4>
                        </div>

                        <div class="  bg-gray-50 p-  shadow-md max-sm:w-full">

                        <ul class=" items-center flex sm:flex-col  max-sm:flex text-sm max-sm:justify-center">
                            <li>
                                <a href=""
                                    class="block font-semibold px-4 py-2 text-blue-600 hover:text-[#f5663b] max-sm:border-r border-blue-500 ">My
                                    Profile</a>
                            </li>
                            <li>
                                <a href=""
                                    class="block font-semibold px-4 py-2 text-blue-600 hover:text-[#f5663b] max-sm:border-r border-blue-500">My
                                    Properties</a>
                            </li>
                            <li>
                                <a href="" class="block font-semibold px-4 py-2 text-blue-600 hover:text-[#f5663b] ">My
                                    Favourites</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->

                <div class="w-3/4 bg-white p-6 rounded-lg shadow-md md:ml-6 max-sm:w-full">
                    <h2 class="text-2xl font-semibold mb-6">My Profile</h2>
                    <!-- Profile Form -->
                    <form action={{route('profile.update',$user)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-lg font-medium text-black">Name:</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name',$user->name) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-lg font-medium text-black">Email:</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email',$user->email) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-lg font-medium text-black">Phone:</label>
                                <input type="text" id="phone" name="phone"
                                    value="{{ old('phone',$user->phone) }}"
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
                                    value="{{ old('date_of_birth',$user->date_of_birth) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('date_of_birth')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-lg font-medium text-black">Address:</label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address',$user->address) }}"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="photo" class="block text-lg font-medium text-black">Profile Photo:</label>
                                <input type="file" id="photo" name="photo"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                {{-- @if (auth()->user()->photo)
                                    <img src="{{ asset('storage/' .$user->photo) }}" alt="Profile Photo"
                                        class="mt-4 rounded-lg shadow-md w-32 h-32 object-cover">
                                @endif --}}
                                @error('photo')
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
    </body>
@endsection
