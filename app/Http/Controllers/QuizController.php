<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $assignedExamIdList = [];
        $assignedExams = DB::table('exam_user')->where('user_id', $user_id)->get();
        foreach ($assignedExams as $assignedExam) {
            array_push($assignedExamIdList, $assignedExam->exam_id);
        }

        // Getting the list of exams that are only assigned to tlogged in user

        $examsByUser = Exam::whereIn('id', $assignedExamIdList)->get();

        // checking if atleast 1 exam is assigned to logged in user.

        $isExamAssignedToUser = DB::table('exam_user')->where('user_id', $user_id)->exists();


        // this is confusing
        $completedExamsByUser = Result::where('user_id', $user_id)->whereIn('exam_id', (new Exam)->completedExam())->pluck('exam_id')->toArray();


        return view('admin.home.student', compact('examsByUser', 'isExamAssignedToUser', 'completedExamsByUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function takeQuiz(Exam $exam)
    {
        return view('front.quiz.index', compact('exam'));
    }

    public function submitExam(Request $request)
    {

        $user_id = auth()->user()->id;
        $exam_id = $request->exam_id;
        $result = '';
        //return $request;
        foreach ($request->answers as $question_id => $ans) {

            $result = Result::updateOrCreate(
                ['user_id' => $user_id, 'exam_id' => $exam_id, 'question_id' => $question_id],
                ['answers' => json_encode($ans)]
            );
            // foreach ($ans as $index => $answer_id) {
            //     $result = Result::create([
            //         'user_id' => $user_id,
            //         'exam_id' => $exam_id,
            //         'question_id' => $question_id,
            //         'answer_id' => $answer_id
            //     ]);
            // }
        }
        return $result;
    }

    public function viewResult($exam_id)
    {
        $user_id = auth()->user()->id;
        $results = Result::where('exam_id', $exam_id)->where('user_id', $user_id)->get();
        //     echo $question . "--" . $value . "<br>";
        // }
        //return $results;
        return view('front.quiz.result', compact('results'));
    }
}
