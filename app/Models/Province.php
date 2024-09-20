<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'name'
    ];

    public function district():HasMany
    {
        return $this->hasMany(District::class);
    }

    public function localBody():HasMany
    {
        return $this->hasMany(LocalBody::class);
    }
}
