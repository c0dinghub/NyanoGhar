<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalBody extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'name'
    ];

    public function addProperty():BelongsTo
    {
        return $this->belongsTo(AddProperty::class);
    }
    public function district():BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }
}
