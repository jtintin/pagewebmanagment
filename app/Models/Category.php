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
    //auto generate slug from name, to SEO, when save or update
    protected static function boot()
    {
        parent::boot();
        static::saving(function($category){
            $category->slug = Str::slug($category->name);
        });
    }
    //stablish relationship with services, a category has many services
    public function services()  
    {
        return $this->hasMany(Service::class);       
    }
}
