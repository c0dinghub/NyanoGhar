<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'booking_date',
        'property_id',    // Reference to the booked property
        'user_id',        // User who made the booking
        'amount',         // Total amount (price + booking fee)
        'booking_fee',    // Booking fee
    ];

}
