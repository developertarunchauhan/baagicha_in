<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * Eloquent Relationship
     */

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'product_subcategories');
    }
}
