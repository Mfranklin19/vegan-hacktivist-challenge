<?php

namespace App\Http\Controllers;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function getIndex()
    {
        $questions = Question::orderby('created_at', 'desc')->with('answers')->get();
        $examples = [
            '1' => 'So wait... where do you get your protein?',
            '2' => 'How can you tell someone is a vegan?',
            '3' => 'What is wrong with dairy?',
            '4' => 'Do you not miss cheese?',
            '5' => 'How has it affected your health?'
        ];
        return view('question.index', ['questions' => $questions, 'examples' => $examples]);
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

    public function getQuestion($id)
    {
        $question = Question::where('id', '=', $id)->with('answers')->first();
        return view('question.question', ['question' => $question]);
    }

    public function postAnswerCreate(Request $request, $id)
    {
        $this->validate($request, [
            'answer' => 'required|min:5'
        ]);
        $answer = new Answer([
            'answer' => $request->input('answer'),
            'question_id' => $id
        ]);
        $answer->save();
        return redirect()->route('question.question', ['id' => $id]);
    }
}
