<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResortImage extends Model
{
    use HasFactory;
    
    public function resorts()
    {
        return $this->belongsToMany(Resort::class);
    }
}
