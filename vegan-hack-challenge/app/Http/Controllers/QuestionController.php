<?php

namespace App\Http\Controllers;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function getIndex()
    {
        $questions = Question::orderby('created_at', 'desc')->get();
        return view('question.index', ['questions' => $questions]);
    }

    public function postQuestionCreate(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|min:5|ends_with:?'
        ]);
        $question = new Question([
            'question' => $request->input('question')
        ]);
        $question->save();
        return redirect()->route('question.index');
    }

}
