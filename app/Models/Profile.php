<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //desactived created_at and updated_at
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slogan',
        'description',
        'logo',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'mission',
        'vision',
        'video_url',
        'map_embed'
    ];
}
