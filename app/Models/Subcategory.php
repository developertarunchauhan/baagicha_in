<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable  = [
        'title',
        'slug',
        'description',
        'image'
    ];
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
