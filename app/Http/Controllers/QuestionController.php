<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvedQuestions = Question::where("approval",1)->get();
        $pendingQuestions = Question::where("approval",0)->get();
        return view('questions.index',compact('approvedQuestions','pendingQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->title = $request->title;
        $question->creator = Auth::id();
        $question->level = $request->level;
        $question->type = $request->type;
        $question->corrects = $request->corrects;
        $question->wrongs = $request->wrongs;
        $question->posanswers = $request->posanswers;
        $question->save();

        return redirect()->route('questions.index')
            ->with("success", "Η ερώτηση αποθηκεύτηκε με επιτυχία και αναμένει έγκριση από moderator!");





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

        exit($request->approval);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')
                         ->with('success','Η ερώτηση ενημερώθηκε με επιτυχία');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
                         ->with('success','Η ερώτηση διαγράφηκε επιτυχώς');
    }
}
