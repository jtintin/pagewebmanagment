<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image_url',
        'category_id',
        'meta_title',
        'meta_description'
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($service) {
            $service->slug = Str::slug($service->title);
        });
    }
    //stablish relationship with category, a service belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);       
    }
     
}
