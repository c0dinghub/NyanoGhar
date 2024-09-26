<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'date_of_birth',
        'address',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'twitter_url',
    ];

    public function userProfile()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $properties = $user->properties; // Get properties associated with the user

    return view('pages.userProfile', compact('user', 'properties'));
}


    public function getPhotoAttribute($value): string
    {
        return $this->attributes['photo'] ? asset('storage/' . $this->attributes['photo']) : asset('assets/frontend/images/Untitled.png');
    }

    public function setPhotoAttribute($value): void
    {
        $this->attributes['photo'] = $value->store('user','public');
    }

    public function properties()
    {
        return $this->hasMany(AddProperty::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
