<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.question.create');
    }

    /**
     * Show the form for creating a new resource whe redirected after creating exma.
     */
    public function add_question(Exam $exam)
    {
        return view('admin.question.add_question', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {

        $data = $request->validated();
        //return $data['correct_answers'];
        //return $data['answers'];

        // foreach ($data['answers'] as $key => $value) {
        //     echo "KEY : " . $key . " ---- Value " . $value . "<br>";
        //     foreach ($data['correct_answers'] as $k => $v) {
        //         echo "KEY : " . $k . " ----- " . $v . "<br>";
        //         if ($key == $v) {
        //             echo "CORRECT ANSWER is " . $data['answers'][$key] . "<br>";
        //         }
        //     }
        // }
        $is_correct = false;

        $question = Question::create($data);

        foreach ($data['answers'] as $key => $value) {
            foreach ($data['correct_answers'] as $k => $v) {
                if ($key == $v) {
                    $is_correct = true;
                }
            }
            $answer = new Answer();
            $answer->question_id = $question->id;
            $answer->answer = $value;
            $answer->is_correct = $is_correct;
            $answer->save();
            $is_correct = false;
        }

        return redirect()->back()->with('_store', 'New Question stores');
        // //return $question;
        // //return $request->all();
        // //return $request->answer['answers'];
        // // foreach ($request->answer['correct_answer'] as $abc) {
        // //     echo "Correct Answer " . $request->answer['answers'][$abc] . "<br>";
        // // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
