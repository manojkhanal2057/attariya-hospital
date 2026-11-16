<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'body',
        'icon',
        'image',
        'related_images',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'related_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}