<?php

namespace App\Models;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class AddProperty extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [

        'user_id',
        'property_title',
        'status',
        'rent_price',
        'sale_price',
        'property_type',
        'house_category',
        'apartment_name',
        'apartment_category',
        'build_year',
        'year_type',
        'property_area',
        'bedrooms',
        'bathrooms',
        'hall_rooms',
        'total_rooms',
        'house_facing',
        'no_of_floors',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'address_area',
        'amenity_id',
        'car_parking_spaces',
        'bike_parking_spaces',
        'property_photo',
        'property_video',
        'description',

    ];

    public function localBody(): HasMany
    {
        return $this->hasMany(LocalBody::class);
    }

    // public function district():HasMany
    // {
    //     return $this->hasMany(District::class);
    // }

    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Define the relationship to User
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }


    //public function getPropertyPhotoAttribute($value)
    // {
    //     // Check if the value is not empty and exists
    //     if (!empty($value) && Storage::exists($value)) {
    //         return Storage::url($value);
    //     }

    //     // Return a default image URL if the property photo does not exist
    //     return asset('assets/frontend/images/author.jpg');
    // }
    public function getPropertyPhotoAttribute($value): string
    {
        return $this->attributes['property_photo'] ? asset('storage/' . $this->attributes['property_photo']) : asset('assets/frontend/images/author.jpg');
    }

    public function setPropertyPhotoAttribute($value): void
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['property_photo'] = $value->store('property', 'public');
        } else {
            // Handle case when $value is a string or another type
            $this->attributes['property_photo'] = $value;
        }
    }
}
