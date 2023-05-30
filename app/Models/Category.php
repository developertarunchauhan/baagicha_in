<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'image'
    ];

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = ucfirst(strtolower($title));
        $this->attributes['slug'] = Str::slug($title, '-');
    }

    /**
     * Eloquent Relationships
     */

    /**
     * Category - Blog Many to Many Relationship
     */

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_categories');
    }

    /**
     * Category - Subcategory Many to Many Relationship
     */
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'category_subcategories');
    }

    /**
     * Category hasMany Products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }

    /**
     * Using slug instead of ID to access the category
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
