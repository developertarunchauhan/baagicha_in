<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'answer',
        'question_id',
        'is_correct'
    ];

    /**
     * Eloquent relationships
     */

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
