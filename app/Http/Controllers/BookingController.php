<?php

namespace App\Http\Controllers;

use App\Models\AddProperty;
use App\Models\Booking;
use Dipesh79\LaravelEsewa\LaravelEsewa;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($propertyId)
    {
        $property = AddProperty::findOrFail($propertyId);
        return view('booking.create', compact('property'));
    }

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
        ]);

        // Create the booking
        Booking::create($validated);

        // Redirect back with success message
        return redirect()->route('propertyDetail', ['id' => $request->property_id])
                         ->with('success', 'Booking has been successfully created!');
    }

    public function esewaPayment()
{
    // Store payment details in DB with pending status
    $payment = new LaravelEsewa();
    $amount = 123;
    $order_id = 251264889; // Your Unique Order Id
    $tax_amount = 0; // Tax Amount. If there is no tax amount then keep it 0
    $service_charge = 0; // Service Charge. If there is no service charge then keep it 0
    $delivery_charge = 0; // Delivery Charge. If there is no delivery charge then keep it 0
    $success_url = route('success.url');
    $fail_url = route('fail.url');
    return redirect($payment->esewaCheckout($amount, $tax_amount, $service_charge, $delivery_charge, $order_id, $success_url, $fail_url));
}


}
