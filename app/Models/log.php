<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;

    // use the product id to get the product name
    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
