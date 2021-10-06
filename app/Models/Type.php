<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function transports()
    {
        return $this->belongsToMany('App\Models\Transport');
    }

    public function komplekt()
    {
        return $this->belongsToMany('App\Models\Type', 'komplekt_type', 'type_id', 'komplekt_id');
    }
}
