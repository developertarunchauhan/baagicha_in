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
     * Eloquent Relationship 
     */

    public function users()
    {
        return $this->hasMany(User::class);
    }
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
     * GETTER : Background colors based on role
     */

    public function getRoleColorAttribute()
    {
        $color = [
            1 => 'bg-primary',
            2 => 'bg-secondary',
            3 => 'bg-success',
            4 => 'bg-danger',
            5 => 'bg-warning',
            6 => 'bg-info',
            7 => 'bg-secondary',
            8 => 'bg-dark',
            9 => 'bg-warning',
            10 => 'bg-info',
            11 => 'bg-success'
        ];
        return $color[$this->id];
    }
    /**
     * Using `slug` instead `id` to retrieve data
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
