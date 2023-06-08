<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Result;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Eloquent Relationships
     */

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_user');
    }

    /**
     * Checking if user has completed the exam
     */

    public function completedExam()
    {
        $completedExamIdList = [];
        $user_id = auth()->user()->id;
        $completedExams = Result::where('user_id', $user_id)->get();
        foreach ($completedExams as $completedExam) {
            array_push($completedExamList, $completedExam->exam_id);
        }
        return $completedExamIdList;
    }
}
