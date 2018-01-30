<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $fillable = ['name', 'display_name', 'description', 'status', 'category_id'];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'category_id'); 
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
