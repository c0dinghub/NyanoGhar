<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('property_id')->constrained('add_properties')->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2); // Total booking amount
        $table->decimal('booking_fee', 10, 2)->default(0); // Booking fee
        $table->enum('status', ['confirmed', 'cancelled'])->default('confirmed');
        $table->timestamp('booked_at')->nullable();
        $table->timestamp('cancelled_at')->nullable();
        $table->timestamps();
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
