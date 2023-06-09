<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excrept',
        'body',
        'image',
        'tags',
        'meta_description',
        'seo_title',
        'status',
        'user_id'
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
     * Blog - User Belongs to Relationsship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Blog - Category Many to Many Relationship
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories');
    }




    /**
     * Using slug instead of id to access the resource
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
