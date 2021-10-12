<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'coordinates'
    ];

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }
}
