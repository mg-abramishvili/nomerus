<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
