<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'user_id',
        'property_id',
        'owner_id',

    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function owner(){

        return $this->belongsTo(User::class);

    }

    public function property()
    {
        return $this->belongsTo(AddProperty::class, 'property_id');
    }


}


