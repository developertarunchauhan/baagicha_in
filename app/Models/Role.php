<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass Assignment 
     */

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    /**
     * Creating mutating title & creating slug from title
     */

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = ucfirst(strtolower($title));
        $this->attributes['slug'] = Str::slug($title, '-');
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = ucfirst(strtolower($description));
    }

    /**
     * Using `slug` instead `id` to retrieve data
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
