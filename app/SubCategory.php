<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $fillable = ['name', 'display_name', 'description', 'status', 'category_id'];
}
