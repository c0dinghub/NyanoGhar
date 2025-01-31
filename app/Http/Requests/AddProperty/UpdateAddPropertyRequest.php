<?php

namespace App\Http\Requests\AddProperty;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddPropertyRequest extends FormRequest
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
            'property_title' => ['nullable', 'string'],
            'status' => ['nullable', 'in:for_rent,for_sale'],
            'rent_price' => ['nullable', 'integer'],
            'sale_price' => ['nullable', 'integer'],
            'property_type'=>['nullable','in:house,apartment'],
            'house_category' => ['required_if:property_type,house', 'string', 'in:2bhk,duplex,bungalow,villa,4bhk,triplex,others'],
            'apartment_name' => ['nullable', 'string'],
            'apartment_category' => ['required_if:property_type,apartment', 'string', 'in:studio,2bhk,3bhk,duplex,4bhk,penthouse'],
            'build_year' => ['nullable', 'integer'],
            'year_type' => ['nullable', 'in:bs,ad'],
            'property_area' => ['nullable', 'integer'],
            'bedrooms' => ['nullable', 'integer'],
            'bathrooms' => ['nullable', 'integer'],
            'hall_rooms' => ['nullable', 'integer'],
            'total_rooms' => ['nullable', 'integer'],
            'house_facing' => ['nullable', 'in:north,north_east,north_west,south,south_east,south_west,east,west'],
            'no_of_floors' => ['nullable'],
            'province_id' => ['nullable', 'exists:provinces,id'], // Checks that the province exists
            'district_id' => ['nullable', 'exists:districts,id'], // Checks that the district exists
            'local_body_id' => ['nullable', 'exists:local_bodies,id'], // Checks that the local bodies exists
            'address_area' => ['nullable', 'string'],
            'amenity_id' => ['nullable'],
            'car_parking_spaces' => ['nullable', 'integer'],
            'bike_parking_spaces' => ['nullable', 'integer'],
            'property_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'property_video' => ['nullable', 'mimes:mp4'],
            'description' => ['nullable', 'string'],
            'agent_id' => 'nullable|exists:users,id'
        ];

    }
}
