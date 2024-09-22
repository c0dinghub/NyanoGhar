<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function localBodies()
    {
        return $this->hasMany(LocalBody::class);
    }
}
