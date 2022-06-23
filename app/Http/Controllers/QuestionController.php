<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {

        $approvedQuestions = Question::where("approval",1)->where('creator',Auth::id())->get();
        $pendingQuestions = Question::where("approval",0)->where('creator',Auth::id())->get();
        return view('questions.index',compact('approvedQuestions','pendingQuestions'));
    }


    public function mng()
    {

        $approvedQuestions = Question::where("approval",1)->get();
        $pendingQuestions = Question::where("approval",0)->get();
        return view('questions.mng',compact('approvedQuestions','pendingQuestions'));
    }

    public function loli()
    {
        return 'test';
    }

    public function create()
    {
        return view('questions.create');
    }

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


    public function edit(Question $question)
    {
        return view('questions.edit',compact('question'));
    }

    public function update(Request $request, $id)
    {


        $question = Question::find($id);
/*
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'nickname' => 'required',
        ]);
*/
        echo $request->approval .'<hr>';
        if($request->approval == 'on') {
            $approval = 1;
        } else {
            $approval = 0;
        }

        $question->update([
            'title'             => $request->title,
            'level'             => $request->level,
            'type'              => $request->type,
            'corrects'          => $request->corrects,
            'wrongs'            => $request->wrongs,
            'posanswers'        => $request->posanswers,
            'approval'          => $approval,
            'approvalModerator' => $request->approbalModerator,
            'approvalDate'      => $request->approbalDate,
        ]);


        return redirect()->route('questions.mng')
                         ->withSuccess('Η ερώτηση ενημερώθηκε με επιτυχία');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.mng')
            ->withSuccess('Η ερώτηση διαγράφηκε με επιτυχία');
    }
}
