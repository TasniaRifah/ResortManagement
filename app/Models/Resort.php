<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;
    protected $fillable=['title','filenames','rent','description','is_active'];
    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }

    public function resourt_images(){
        return $this->hasMany(ResortImage::class, 'resort_id', 'id');
    }
}
