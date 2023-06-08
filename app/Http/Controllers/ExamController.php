<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();
        return view('admin.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        $data = $request->validated();
        $exam = Exam::create($data);
        if ($request->add_question) {
            return redirect(route('question.add_question', $exam))->with('_store', 'Exam is saved.Now begin adding questions & answers');
        }
        return redirect(route('exam.index'))->with('_store', 'New exam created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::findOrfail($id);
        return view('admin.exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Assign exam to user
     */

    public function assign(Exam $exam)
    {
        $users = User::where('role_id', 11)->get();
        return view('admin.exam.assign', compact('exam', 'users'));
    }

    public function assignexam(Request $request)
    {
        $this->validate($request, [
            'exam_id' => 'required',
            'users' => 'required|array|min:1',
            'users.*' => 'bail|required|string|distinct',
        ]);
        foreach ($request->users as $user) {
            $u = User::findOrFail($user);
            $u->exams()->syncWithoutDetaching($request->exam_id); // old recds is not detached
            //$u->exams()->sync($request->exam_id); // detach old recods 
        }
        return redirect()->back()->with('_store', 'Exam assigned to selected users');
    }
}
