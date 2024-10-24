<?php

namespace App\Http\Requests\AddProperty;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'property_title' => ['required', 'string'],
            'status' => ['required', 'in:for_rent,for_sale'],
            'rent_price' => ['nullable', 'integer'],
            'sale_price' => ['nullable', 'integer'],
            'property_type'=>['required','in:house,apartment'],
            'house_category' => ['required_if:property_type,house', 'string', 'in:2bhk,duplex,bungalow,villa,4bhk,triplex,others'],
            'apartment_name' => ['nullable', 'string'],
            'apartment_category' => ['required_if:property_type,apartment', 'string', 'in:studio,2bhk,3bhk,duplex,4bhk,penthouse'],
            'build_year' => ['required', 'integer'],
            'year_type' => ['required', 'in:bs,ad'],
            'property_area' => ['required', 'integer'],
            'bedrooms' => ['required', 'integer'],
            'bathrooms' => ['required', 'integer'],
            'hall_rooms' => ['nullable', 'integer'],
            'total_rooms' => ['nullable', 'integer'],
            'house_facing' => ['required', 'in:north,north_east,north_west,south,south_east,south_west,east,west'],
            'no_of_floors' => ['required'],
            'province_id' => ['nullable', 'exists:provinces,id'], // Checks that the province exists
            'district_id' => ['nullable', 'exists:districts,id'], // Checks that the district exists
            'local_body_id' => ['nullable', 'exists:local_bodies,id'],
            'ward_no'=> ['required','string'],
            'address_area' => ['required', 'string'],
            'amenity_id' => ['nullable'],
            'car_parking_spaces' => ['required', 'integer'],
            'bike_parking_spaces' => ['required', 'integer'],
            'property_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'property_video' => ['nullable', 'mimes:mp4'],
            'description' => ['nullable', 'string']
        ];
    }
}
