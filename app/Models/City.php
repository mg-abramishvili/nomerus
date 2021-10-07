<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany('App\Models\Type')->withPivot(['price', 'komplekt_price', 'komplekt_same_type_price']);
    }
}
