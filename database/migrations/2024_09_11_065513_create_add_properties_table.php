<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_title');
            $table->enum('status',['for_rent','for_sale']);
            $table->string('rent_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->enum('property_type',['house','apartment','villa','bungalow']);
            $table->integer('property_area');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('hall_rooms');
            $table->string('total_rooms');
            $table->enum('house_facing',['north','north_east','north_west','south','south_east','south_west','east','west']);
            $table->enum('no_of_floors',['1','1.5','2','2.5','3','3.5','4','4.5']);
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete();
            $table->string('address_area');
            $table->foreignId('amenity_id')->nullable('amenities','id')->constrained()->nullOnDelete();
            $table->integer('car_parking_spaces')->nullable();
            $table->integer('bike_parking_spaces')->nullable();
            $table->string('property_photo');
            $table->string('property_video')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_properties');
    }
};
