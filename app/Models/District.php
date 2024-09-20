<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'name',
        'province_id'
    ];

    public function addProperty():BelongsTo
    {
        return $this->belongsTo(AddProperty::class);
    }

    public function localBody():HasMany
    {
        return $this->hasMany(LocalBody::class);
    }
    public function province():BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
