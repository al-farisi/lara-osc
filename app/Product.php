<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'description', 'image', 'video_url', 'price'];

    public function sub_categories()
    {
        return $this->belongsToMany(SubCategory::class);
    }
}
