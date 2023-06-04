<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'variety_id',
        'status'
    ];

    /**
     * Defining eloquent relatioships
     */

    public function children()
    {
        return $this->hasMany(self::class, 'variety_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'variety_id');
    }

    /**
     * GENERATING n LEVEL LIST
     */
}
