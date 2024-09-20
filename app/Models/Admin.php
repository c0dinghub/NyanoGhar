<?php

namespace App\Models;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'phone',
        'photo',
        'date_of_birth',
        'address'
    ];

    public function getPhotoAttribute($value): string
    {
        return $this->attributes['photo'] ? asset('storage/' . $this->attributes['photo']) : asset('assets/frontend/images/author.jpg');
    }

    public function setPhotoAttribute($value): void
    {
        $this->attributes['photo'] = $value;
    }

}
