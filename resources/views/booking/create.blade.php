@extends('layouts.frontendLayout')

@section('addcontent')

<div class="container mx-auto py-10">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Book a Property</h2>

        <!-- Booking Form -->
        <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium">Your Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block font-medium">Your Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block font-medium">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Booking Date -->
            <div>
                <label for="booking_date" class="block font-medium">Booking Date</label>
                <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('booking_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="booking_fee" class="block font-medium">Booking Fee</label>
                <input type="text" id="booking_fee" name="booking_fee" value="Rs {{ $property->type === 'rent' ? 500 : 2000 }}"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100" readonly>
                <p class="text-sm text-gray-500 mt-1">This is the default booking fee for this property.</p>
            </div>

            <!-- Message -->
            <div>
                <label for="message" class="block font-medium">Message (Optional)</label>
                <textarea id="message" name="message" rows="4"
                    class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-md shadow-sm hover:bg-indigo-700">
                    Confirm Booking
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

