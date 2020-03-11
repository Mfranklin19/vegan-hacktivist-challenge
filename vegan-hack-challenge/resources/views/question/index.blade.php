@extends('layouts.master')

@section('content')
@include('partials.errors')
    <form action="{{ route('question.create') }}" method="post">
        <div class=form-group">
            <label for="question"><h3>Ask A Question!</h3></label>
            <textarea placeholder="{{ $examples[array_rand($examples)]  }}" class="form-control" id="question" name="question"></textarea>
        </div>
        <br />
        {{ csrf_field() }}
        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Post Question</button>
        </div>
    </form>
    <br />
    <h3>Previously Asked Questions</h3>
    @foreach($questions as $question)
    <hr>
    <a href="{{ route('question.question', ['id' => $question->id]) }}">
        <p>
            {{ $question->question }}
            <button class="btn-primary btn-sm float-right">{{ count($question->answers).(count($question->answers)===1 ? ' Answer' : ' Answers')  }}</button>
        </p>
    </a>
    @endforeach
@endsection
