<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name', 'display_name', 'description', 'status'];

    public function children()
    {
        return $this->hasMany('App\SubCategory');
    }
}
