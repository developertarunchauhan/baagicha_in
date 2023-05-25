<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable  = [
        'title',
        'slug',
        'description',
        'image',
    ];


    /**
     * Mutator
     */

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = ucfirst(strtolower($title));
        $this->attributes['slug'] = Str::slug($title, '-');
    }


    /**
     * Eloquent Relationships
     */

    /**
     * Subcategory - category Many to Many Relationship
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_subcategories');
    }

    /**
     * Subcategory hasMany Products
     */

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Using slug instead of id to access resources
     */

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
