<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    // Specify the table name if not following the naming convention
    protected $table = 'fees';

    // Define fillable fields
    protected $fillable = [
        'type', // 'sale' or 'rent'
        'fee',  // Fee amount
    ];
}

