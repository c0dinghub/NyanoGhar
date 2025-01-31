<?php

namespace App\Http\Controllers;

use App\Models\AddProperty;
use App\Models\Booking;
use App\Models\Fee;
use Dipesh79\LaravelEsewa\LaravelEsewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    // Show the booking form
    public function create($propertyId)
    {
        $property = AddProperty::findOrFail($propertyId);

        // Fetch the appropriate booking fee based on property type
        $bookingFee = Fee::where('type', $property->type)->value('amount');

        return view('booking.create', compact('property', 'bookingFee'));
    }

    // Store the booking
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'property_id' => 'required|exists:add_properties,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'booking_date' => 'required|date',
        'message' => 'nullable|string',
        'fee' => 'required|numeric', // Validate the fee being passed
    ]);

    // Fetch the property and calculate the booking fee
    $property = AddProperty::findOrFail($validated['property_id']);
    $bookingFee = $validated['fee']; // Use the fee passed from the form

    // Create the booking
    Booking::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'booking_date' => $validated['booking_date'],
        'property_id' => $property->id,
        'user_id' => Auth::user()->id,
        'amount' => $property->price + $bookingFee, // Total price including the fee
        'booking_fee' => $bookingFee,
        'message' => $request->message,
    ]);

    // Redirect back with a success message
    return redirect()->route('propertyDetail', ['id' => $validated['property_id']])
                     ->with('success', 'Booking has been successfully created!');
}


    public function confirmBooking($propertyId)
{
    // Find the property by ID
    $property = AddProperty::findOrFail($propertyId);

    // Get the default booking fee based on the property type (sale/rent)
    $fee = DB::table('fees')->where('type', $property->type)->value('fee');

    // Pass the property and fee to the view
    return view('booking.confirm', compact('property', 'fee'));
}


    // Handle eSewa Payment
    public function esewaPayment(Request $request)
    {
        // Validate the incoming payment request
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
        ]);

        // Fetch the booking details
        $booking = Booking::findOrFail($validated['booking_id']);
        $amount = $booking->booking_fee; // Use booking fee as the payment amount

        // Initialize payment details
        $payment = new LaravelEsewa();
        $order_id = $booking->id; // Use booking ID as the unique order ID
        $tax_amount = 0;
        $service_charge = 0;
        $delivery_charge = 0;
        $success_url = route('esewa.success', ['booking_id' => $booking->id]);
        $fail_url = route('esewa.fail', ['booking_id' => $booking->id]);

        // Redirect to eSewa checkout
        return redirect($payment->esewaCheckout($amount, $tax_amount, $service_charge, $delivery_charge, $order_id, $success_url, $fail_url));
    }

    // eSewa Success Callback
    public function esewaSuccess(Request $request)
    {
        // Handle successful payment
        $bookingId = $request->query('booking_id');
        $booking = Booking::findOrFail($bookingId);

        // Update booking status to "confirmed"
        $booking->update(['status' => 'confirmed']);

        return redirect()->route('propertyDetail', ['id' => $booking->property_id])
                         ->with('success', 'Payment successful! Booking confirmed.');
    }

    // eSewa Fail Callback
    public function esewaFail(Request $request)
    {
        // Handle failed payment
        $bookingId = $request->query('booking_id');
        $booking = Booking::findOrFail($bookingId);

        // Update booking status to "failed"
        $booking->update(['status' => 'failed']);

        return redirect()->route('propertyDetail', ['id' => $booking->property_id])
                         ->with('error', 'Payment failed! Please try again.');
    }
}
