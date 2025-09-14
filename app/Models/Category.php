<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
    ];
    protected static function boot()
    {
        parent::boot();
        static::saving(function($category){
            $category->slug = Str::slug($category->name);
        });
    }
}
