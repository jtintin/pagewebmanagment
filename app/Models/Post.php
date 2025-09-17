<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'category_id',
        'user_id',
        'meta_title',
        'meta_description',
        'published_at'
    ];

    //stablish relationship with category, a post belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);       
    }

    //stablish relationship with user, a post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);       
    }
    //add slug to SEO, auto generate slug from title when save or update
    protected static function boot()
    {
        parent::boot(); 
        static::saving(function($post){
            $post->slug = Str::slug($post->title);
        });
    }
}
