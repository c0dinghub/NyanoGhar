@extends('layouts.frontendLayout')

@section('addcontent')
<div class="container mx-auto py-8">
    <h2 class="flex text-2xl font-bold mb-4 justify-center">Book Property</h2>

    {{-- Booking Form --}}
    <form method="POST" action="{{ route('booking.store') }}" class="max-w-lg mx-auto">
        @csrf

        {{-- User Details --}}
        <div class="mb-4">
            <label for="name" class="block font-medium">Full Name:</label>
            <input type="text" id="name" name="name" class="w-full max-w-md border border-gray-300 p-2 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email:</label>
            <input type="email" id="email" name="email" class="w-full max-w-md border border-gray-300 p-2 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block font-medium">Phone:</label>
            <input type="text" id="phone" name="phone" class="w-full max-w-md border border-gray-300 p-2 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="booking_date" class="block font-medium">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" class="w-full max-w-md border border-gray-300 p-2 rounded-lg" required>
        </div>

        {{-- Payment Options --}}
        <h3 class="text-xl font-semibold mt-6 mb-2">Choose Payment Method:</h3>
        <div class="mb-4 flex gap-4">
            <label class="flex items-center">
                <input type="radio" name="payment_method" value="esewa" class="mr-2" required>
                <span>eSewa</span>
            </label>
            <label class="flex items-center">
                <input type="radio" name="payment_method" value="khalti" class="mr-2" required>
                <span>Khalti</span>
            </label>
            {{-- Add other payment methods here as needed --}}
        </div>

        <input type="hidden" name="amount" value="1000"> {{-- Specify the amount here --}}
        <input type="hidden" name="property_id" value="{{ $property->id }}">

        {{-- Conditional Button based on selected payment method --}}
        <button id="paymentButton" type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded mt-4 hover:bg-blue-600">
            <a href="{{route('booking.pay')}}">Proceed to Pay</a>
        </button>
    </form>
</div>

{{-- Optional JavaScript to update button text based on payment method --}}
<script>
    const paymentButton = document.getElementById('paymentButton');
    const paymentOptions = document.querySelectorAll('input[name="payment_method"]');

    paymentOptions.forEach(option => {
        option.addEventListener('change', () => {
            if (option.value === 'esewa') {
                paymentButton.textContent = 'Proceed to Pay with eSewa';
            } else if (option.value === 'khalti') {
                paymentButton.textContent = 'Proceed to Pay with Khalti';
            }
            // Additional logic for other payment methods if needed
        });
    });
</script>
@endsection
