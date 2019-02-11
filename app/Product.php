<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);
    }
}